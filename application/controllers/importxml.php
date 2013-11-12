<?php
class ImportXML extends CI_Controller
{
	function index()
	{
		include FCPATH."application/third_party/ImportXML/rea_xml.class.php";
		$rea = new REA_XML($debug=true); //uses default fields
		$xml_file_dir=FCPATH.'application/third_party/ImportXML/xmls';
		$processed_dir=FCPATH.'application/third_party/ImportXML/outs';
		$failed_dir=FCPATH.'application/third_party/ImportXML/errs';
		$this->load->model('basic_model');

		$properties = $rea->parse_directory($xml_file_dir, $processed_dir, $failed_dir, $excluded_files=array());
		//print_r($properties);die;
		//echo '<pre>', var_dump($properties), '</pre>';die;

		foreach ($properties["rental"] as $res)
		{
			$listingAgent=$this->getList($res['listingAgent']);
			$address=$this->getList($res['address']);
			$features=$this->getList($res['features']);
			$inspectionTimes=$this->getList($res['inspectionTimes']);
			$ecoFriendly=$this->getList($res['ecoFriendly']);
			$views=$this->getList($res['views']);
			$allowances=$this->getList($res['allowances']);

			$v['agentID']=(string)$res['agentID'];
			$v['uniqueID']=(string)$res['uniqueID'];
			$v['listingAgent']=serialize($listingAgent);
			$v['dateAvailable']=(string)$res['dateAvailable'];
			$v['rent']=$this->getValueAndAttribute($res['rent']);
			$v['priceView']=(string)$res['priceView'];
			$v['bond']=(string)$res['bond'];
			$v['address']=serialize($address);
			$v['municipality']=(string)$res['municipality'];
			$v['streetDirectory']=(string)$res['streetDirectory'];
			$v['category']=$this->getAttribute($res['category'],'name');
			$v['headline']=(string)$res['headline'];
			$v['description']=(string)$res['description'];
			$v['features']=serialize($features);
			//$v['holiday']=$this->getAttribute($res['holiday'],'value');
			$v['landDetails']=(string)$res['landDetails'];
			$v['newConstruction']=(string)$res['newConstruction'];
			$v['buildingDetails']=(string)$res['buildingDetails'];
			$inspectionTimes=$this->getList($res['inspectionTimes']);
			$v['externalLink']=$this->getAttribute($res['externalLink'],'href');
			$v['videoLink']=$this->getAttribute($res['videoLink'],'href');
			$v['extraFields']=(string)$res['extraFields'];
			$v['images']=serialize($this->getAttribute($res['img']));
			//$v['objects']=serialize($this->getAttribute($res['objects']));
			$v['ecoFriendly']=serialize($ecoFriendly);
			$v['views']=serialize($views);
			$v['allowances']=serialize($allowances);

			$this->basic_model->insert($v,'rental');

		}

		/*foreach ($properties["residential"] as $res)
		{
			//print_r($res);die;
			//$this->simplexml_to_array($res['address']);

			$v=array();

			$listingAgent=$this->getList($res['listingAgent']);
			$address=$this->getList($res['address']);
			$features=$this->getList($res['features']);
			$inspectionTimes=$this->getList($res['inspectionTimes']);
			$vendorDetails=$this->getList($res['vendorDetails']);
			$ecoFriendly=$this->getList($res['ecoFriendly']);
			$idealFor=$this->getList($res['idealFor']);
			$views=$this->getList($res['views']);


			$v['agentID']=(string)$res['agentID'];
			$v['uniqueID']=(string)$res['uniqueID'];
			$v['authority']=$this->getAttribute($res['authority'],'value');
			$v['underOffer']=$this->getAttribute($res['underOffer'],'value');
			$v['isHomeLandPackage']=$this->getAttribute($res['isHomeLandPackage'],'value');
			$v['listingAgent']=serialize($listingAgent);
			$v['price']=(string)$res['price'];
			$v['priceView']=(string)$res['priceView'];
			$v['address']=serialize($address);
			$v['municipality']=(string)$res['municipality'];
			$v['streetDirectory']=(string)$res['streetDirectory'];
			$v['category']=$this->getAttribute($res['category'],'name');
			$v['headline']=(string)$res['headline'];
			$v['description']=(string)$res['description'];
			$v['features']=serialize($features);
			$v['soldDetails']=(string)$res['soldDetails'];
			$v['landDetails']=(string)$res['landDetails'];
			$v['buildingDetails']=(string)$res['buildingDetails'];
			$v['inspectionTimes']=serialize($inspectionTimes);
			$v['auction']=$this->getAttribute($res['auction'],'date');
			$v['vendorDetails']=serialize($vendorDetails);
			$v['externalLink']=$this->getAttribute($res['externalLink'],'href');
			$v['videoLink']=$this->getAttribute($res['videoLink'],'href');
			$v['extraFields']=(string)$res['extraFields'];
			$v['images']=serialize($this->getAttribute($res['img']));
			$v['newConstruction']=(string)$res['newConstruction'];
			$v['ecoFriendly']=serialize($ecoFriendly);
			$v['idealFor']=serialize($idealFor);
			$v['views']=serialize($views);
			//$v['objects']=serialize($this->getAttribute($res['objects']));print_r($v['objects']);die;
			$v['status_sellable']=(string)$res['status'];
			$v['modTime']=(string)$res['modTime'];
			

			$this->basic_model->insert($v,'residential');
		}*/
	}




	function getAttribute($obj,$filed=FALSE)
	{//print_r($obj);die;
		$arr=array();
		$role = $obj->attributes();
		foreach ($role as $key => $value)
		{
			$arr[$key]=(string)$value;
		}
		if($filed)
			return $arr[$filed];
		else
			return $arr;
	}

	function getList($obj)
	{//print_r($obj);die;
		if(!is_array($obj))
		{
			$obj=(array)$obj;
		}
		foreach ($obj as $key => $value)
		{
			/*foreach($value->attributes() as $key2 => $value2)
			{
	    		$arr[$key2]=(string)$value2;
			}*/
			$arr[$key]=(string)$value;
		}
		return $arr;
	}

	function getValueAndAttribute($obj)
	{//print_r($obj);
		$arr=array();
		$arr[0]=(string)$obj[0];
		foreach($obj->attributes() as $key => $value)
		{
    		$arr[$key]=(string)$value;
		}
		return serialize($arr);
	}

	/*function simplexml_to_array($xmlobj) {
    $a = array();
    foreach ($xmlobj as $node) {
        if (is_array($node))
            $a[$node->getName()] = simplexml_to_array($node);
        else
            $a[$node->getName()] = (string) $node;
    }
    return $a;
	} */
}
?>