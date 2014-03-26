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
//$table_list = array('business');
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
'xml/AB001_2014-03-26-01-40-01.xml'
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
echo "\n ================== S T A R T ==================\n";
foreach($urls as $url)
{
	echo "\n Reading url  => $url \n";
	
	$xmlstring = file_get_contents($url);
	//echo "$url <pre>";
	$propertys = $rea->parse_xml($xmlstring);
	
			/*print_r($propertys);
			die;*/
		//	continue;
	foreach($table_list as $list)
	{
		if(isset($propertys[$list]))
		{
			foreach($propertys[$list] as $property)
			{
				//common for all tables
				if(isset($property['address']['state']))
				$property['state'] = $property['address']['state'];
				
				if(isset($property['address']['suburb']))
				$property['suburb'] = $property['address']['suburb'];
				
				if(isset($property['address']['country']))
				$property['country'] = $property['address']['country'];
				
				if(isset($property['buildingDetails']['area']))
				{
					if($list == "commercial")
					{
						//print_r($property); die;
						$property['area_min'] = $property['buildingDetails']['area'];
						$property['area_max'] = $property['buildingDetails']['area'];
					}
					else if($list != "business")
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
					if($list == "holidayRental" || 
					$list == "rental" || 
					$list == "residential" || 
					$list == "rural")
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
				if($property['status'] == 'current')
				{
					$find=array('uniqueID'=>$property['uniqueID']);
							if($found = $list::find($find))
							{
								echo "\n Updating table => $list \n";
								$found->update_attributes($property);
							}
							else
							{
								echo "\n Inserting table => $list \n";
								$list::create($property);
							}
					
				}
				elseif($property['status'] == 'withdrawn')
				{
					/* update */
					$find=array('uniqueID'=>$property['uniqueID']);
					if($found = $list::find($find))
					{
						echo "\n Updating table => $list \n";
						$found->update_attributes($property);
					}
				}
				elseif($property['status'] == 'sold')
				{
					/* update */
					$find=array('uniqueID'=>$property['uniqueID']);
					if($found = $list::find($find))
					{
						echo "\n Updating table => $list \n";
						$found->update_attributes($property);
					}
				}

			}
		}

	}
}

echo "\n ================== E N D ==================\n";
?>
