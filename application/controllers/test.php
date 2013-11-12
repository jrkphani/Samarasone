<?php
class test extends CI_Controller
{
	function index()
	{
		//$obj=simplexml_load_file(FCPATH.'application/third_party/ImportXML/xmls/test.xml');
		//print_r($obj);
		//$f=fopen(FCPATH.'application/third_party/ImportXML/xmls/test.xml', 'r');
		//$xml_string=fread($f,filesize(FCPATH.'application/third_party/ImportXML/xmls/test.xml'));
		//fclose($f);
		//print_r($xml_string);
		$data='<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE propertyList SYSTEM "http://reaxml.realestate.com.au/propertyList.dtd">
<propertyList date="2009-01-01-12:30:00" username="xmluser" password="xmlpassword">
  <!-- Current listing -->
  <residential modTime="2009-01-01-12:30:00" status="current">
    <agentID>XYZ1</agentID>
    <uniqueID>ABCD1234</uniqueID>
    <authority value="exclusive"/>
    <category name="House"/>
    <priceView>Between $400,000 and $600,000</priceView>
    <description>Dont pass up an opportunity like this! First to inspect</description>
    <address display="yes">
      <subNumber>2</subNumber>
      <streetNumber>39</streetNumber>
      <street>Main Road</street>
      <suburb display="yes">RICHMOND</suburb>
      <state>vic</state>
      <postcode>3121</postcode>
      <country>AUS</country>
    </address>
  </residential>
</propertyList>"';
$arr=$this->xml2array($data);echo $arr['tag'];
print_r($arr);
	}




	function xml2array($xml)
	{
		$opened = array();
		$opened[1] = 0;
		$xml_parser = xml_parser_create();
		xml_parse_into_struct($xml_parser, $xml, $xmlarray);
		$array = array_shift($xmlarray);
		unset($array["level"]);
		unset($array["type"]);
		$arrsize = sizeof($xmlarray);
		for($j=0;$j<$arrsize;$j++){
		    $val = $xmlarray[$j];
		    switch($val["type"]){
		        case "open":
		            $opened[$val["level"]]=0;
		        case "complete":
		            $index = "";
		            for($i = 1; $i < ($val["level"]); $i++)
		                $index .= "[" . $opened[$i] . "]";
		            $path = explode('][', substr($index, 1, -1));
		            $value = &$array;
		            foreach($path as $segment)
		                $value = &$value[$segment];
		            $value = $val;
		            unset($value["level"]);
		            unset($value["type"]);
		            if($val["type"] == "complete")
		                $opened[$val["level"]-1]++;
		        break;
		        case "close":
		            $opened[$val["level"]-1]++;
		            unset($opened[$val["level"]]);
		        break;
		    }
		}
		return $array;
	}
}
?>