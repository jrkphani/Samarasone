<?php
date_default_timezone_set("Asia/Calcutta");
require_once("REA-XML-Parser-master/rea_xml.class.php");
require_once("db.php");

class business extends ActiveRecord\Model{ static $table_name = 'business';}
class commercial extends ActiveRecord\Model{ static $table_name = 'commercial';}
class commercialLand extends ActiveRecord\Model{ static $table_name = 'commercialLand';}
class rental extends ActiveRecord\Model{ static $table_name = 'rental';}
class residential extends ActiveRecord\Model{ static $table_name = 'residential';}
class land extends ActiveRecord\Model{ static $table_name = 'land';}
class rural extends ActiveRecord\Model{ static $table_name = 'rural';}
class holidayRental extends ActiveRecord\Model{ static $table_name = 'holidayRental';}

/* Table name and urls list should in same order */
$table_list = array('business','commercial','commercialLand','rental','residential','land','rural','holidayRental');
/*$urls = array(
'http://reaxml.realestate.com.au/docs/business_sample.xml',
'http://reaxml.realestate.com.au/docs/commercial_sample.xml',
'http://reaxml.realestate.com.au/docs/commercialLand_sample.xml',
'http://reaxml.realestate.com.au/docs/rental_sample.xml',
'http://reaxml.realestate.com.au/docs/residential_sample.xml',
'http://reaxml.realestate.com.au/docs/land_sample.xml',
'http://reaxml.realestate.com.au/docs/rural_sample.xml',
'http://reaxml.realestate.com.au/docs/holiday_rental_sample.xml'
);*/
$urls = array(
'http://localhost/xml_samples/business_sample.xml',
'http://localhost/xml_samples/commercial_sample.xml',
'http://localhost/xml_samples/commercialLand_sample.xml',
'http://localhost/xml_samples/rental_sample.xml',
'http://localhost/sampleREAXML.xml',
'http://localhost/xml_samples/land_sample.xml',
'http://localhost/xml_samples/rural_sample.xml',
'http://localhost/xml_samples/holidayRental_sample.xml'
);


$fields = array (
		'priceView',
		'price',
		'description',
		'objects',
		'status',
		'agentID',
		'uniqueID',
		'category',
		'isHomeLandPackage',
		'headline',
		'municipality',
		'currentLeaseEndDate',
		'commercialRent',
		'outgoings',
		'return',
		'furtherOptions',
		'carSpaces',
		'images',
		
		'attrValue' => array(
		'commercialAuthority',
		'commercialListingType',
		'authority',
		'underOffer',
		'exclusivity',
		),
		'attrName' => array(
		'commercialCategory',
		'category',
		),
		'attrhref' => array(
		'externalLink',
		),
		'businessCategory' => array(
		'name',
		),
		'features' => array(
			'bedrooms',
			'bathrooms',
			'garages',
			'carports',
			'airConditioning',
			'pool',
			'alarmSystem',
			'otherFeatures',
		),
		'address' => array(
			'streetNumber',
			'street',
			'suburb',
			'state',
			'country',
			'postcode',
		),
		'streetDirectory' => array(
		'page',
		'reference',
		),
		'soldDetails' => array(
		'price',
		'date',
		),
		'inspectionTimes',
		'landDetails' => array(
		'area',
		'frontage',
		'depth',
		),
		'buildingDetails' => array(
		'area',
		'energyRating',
		),
		'estate' => array(
		'name',
		'stage',
		),
		'vendorDetails' => array(
		'name',
		'telephone',
		),
		'listingAgent'	=> array(
			'name',
			'telephone',
			'email',
		),
	);
	$featuresList = array(
			'bedrooms',
			'bathrooms',
			'garages',
			'carports',
		);
$rea = new REA_XML($debug=true,$fields);
$tablecount = 0;
echo "\n ================== S T A R T ==================\n";
foreach($urls as $url)
{
	echo "\n Reading url  => $url \n";
	
	$xmlstring = file_get_contents($url);
	//echo "$url <pre>";
	$propertys = $rea->parse_xml($xmlstring);
	
		//	print_r($propertys);
		//	continue;
	foreach($propertys[$table_list[$tablecount]] as $property)
	{
		//common for all tables
		if(isset($property['address']['street']))
		$property['state'] = $property['address']['street'];
		
		if(isset($property['address']['suburb']))
		$property['suburb'] = $property['address']['suburb'];
		
		if(isset($property['address']['country']))
		$property['country'] = $property['address']['country'];
		
		if(isset($property['buildingDetails']['area']))
		{
			if($table_list[$tablecount] == "commercial")
			{
				//print_r($property); die;
				$property['area_min'] = $property['buildingDetails']['area'];
				$property['area_max'] = $property['buildingDetails']['area'];
			}
			else if($table_list[$tablecount] != "business")
			{
				$property['area'] = $property['buildingDetails']['area'];
			}
		}
		else if(isset($property['landDetails']['area']))
		{
			$property['area'] = $property['landDetails']['area'];
		}
		if(isset($property['features']))
		{
			if($table_list[$tablecount] == "holidayRental" || 
			$table_list[$tablecount] == "rental" || 
			$table_list[$tablecount] == "residential" || 
			$table_list[$tablecount] == "rural")
			{
				foreach($featuresList as $value)
				{
					if(isset($property['features'][$value]))
						$property[$value] = $property['features'][$value];
				}
			}
		}
		foreach($property as $key => $array_chk)
		{
			if(is_array($array_chk))
			{
				$property[$key] = serialize($array_chk);
			}
		}
		//echo "<pre>";
		/*if($table_list[$tablecount] == "business")
		{	
		}*/
		//print_r($property);
		//die;
		if($property['status'] == 'current')
		{
			$find=array('uniqueID'=>$property['uniqueID']);
					if($found = $table_list[$tablecount]::find($find))
					{
						echo "\n Updating table => $table_list[$tablecount] \n";
						$found->update_attributes($property);
					}
					else
					{
						echo "\n Inserting table => $table_list[$tablecount] \n";
						$table_list[$tablecount]::create($property);
					}
			
		}
		elseif($property['status'] == 'withdrawn')
		{
			/* update */
		}
		elseif($property['status'] == 'sold')
		{
			/* delete */
		}
	}
	$tablecount++;
}

echo "\n ================== E N D ==================\n";
?>