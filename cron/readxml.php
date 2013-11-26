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
$urls = array(
'http://reaxml.realestate.com.au/docs/business_sample.xml',
'http://reaxml.realestate.com.au/docs/commercial_sample.xml',
'http://reaxml.realestate.com.au/docs/commercialLand_sample.xml',
'http://reaxml.realestate.com.au/docs/rental_sample.xml',
'http://reaxml.realestate.com.au/docs/residential_sample.xml',
'http://reaxml.realestate.com.au/docs/land_sample.xml',
'http://reaxml.realestate.com.au/docs/rural_sample.xml',
'http://reaxml.realestate.com.au/docs/holiday_rental_sample.xml'
);
//$urls=array('http://localhost/client.xml');
//$urls=array('http://reaxml.realestate.com.au/docs/residential_sample.xml');


$rea = new REA_XML($debug=true);
$tablecount = 0;
echo "\n ================== S T A R T ==================\n";
foreach($urls as $url)
{
	$xmlstring = file_get_contents($url);
	echo "$url <pre>";
	$propertys = $rea->parse_xml($xmlstring);
	
			print_r($propertys);
			continue;
	foreach($propertys[$table_list[$tablecount]] as $property)
	{
		if($property['status'] == 'current')
		{
			
			/*$find=array('agentID'=>$property['agentID'],'uniqueID'=>$property['uniqueID']);
					if($found = $table_list[$tablecount]::find($find))
					{
						echo "\n updating table => $table_list[$tablecount] \n";
						$found->update_attributes($property);
					}
					else
					{
						echo "\n inserting table => $table_list[$tablecount] \n";
						$table_list[$tablecount]::create($property);
					}
			*/
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