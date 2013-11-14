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

		foreach ($properties["business"] as $res)
		{
			$v=array();

			$listingAgent=$this->getList($res['listingAgent']);
			$address=$this->getList($res['address']);
			$businessCategory=$this->getList($res['businessCategory']);
			$vendorDetails=$this->getList($res['vendorDetails']);
			$images=$this->getList($res['images']);
			$objects=$this->getList($res['objects']);
			$miniweb=$this->getList($res['miniweb']);

			$v['agentID']=(string)$res['agentID'];
			$v['uniqueID']=(string)$res['uniqueID'];
			$v['marketing']=(string)$res['marketing'];
			$v['exclusivity']=$this->getAttribute($res['exclusivity'],'value');
			$v['commercialListingType']=$this->getAttribute($res['commercialListingType'],'value');
			$v['underOffer']=$this->getAttribute($res['underOffer'],'value');
			$v['listingAgent']=serialize($listingAgent);
			$v['franchise']=$this->getAttribute($res['franchise'],'value');
			$v['price']=(string)$res['price'];
			$v['priceView']=(string)$res['priceView'];
			$v['businessLease']=$this->getValueAndAttribute($res['businessLease']);
			$v['takings']=(string)$res['takings'];
			$v['return']=$this->getValueAndAttribute($res['return']);
			$v['currentLeaseEndDate']=(string)$res['currentLeaseEndDate'];
			$v['furtherOptions']=(string)$res['furtherOptions'];
			$v['address']=serialize($address);
			if($address['state'])
				$v['state']=$address['state'];
			else
				$v['state']=$address['region'];
			$v['suburb']=$address['suburb'];
			$v['municipality']=(string)$res['municipality'];
			$v['streetDirectory']=(string)$res['streetDirectory'];
			$v['businessCategory']=serialize($businessCategory);
			$v['headline']=(string)$res['headline'];
			$v['description']=(string)$res['description'];
			$v['terms']=(string)$res['terms'];
			$v['soldDetails']=(string)$res['soldDetails'];
			$v['buildingDetails']=(string)$res['buildingDetails'];
			$v['vendorDetails']=serialize($vendorDetails);
			$v['externalLink']=$this->getAttribute($res['externalLink'],'href');
			$v['extraFields']=(string)$res['extraFields'];
			$v['images']=serialize($images);
			$v['objects']=serialize($objects);
			$v['miniweb']=serialize($miniweb);
			$v['purchaseOrder']=(string)$res['purchaseOrder'];
			$v['status_sellable']=(string)$res['status'];
			$v['modTime']=date('Y-m-d-h:i:s', time());

			$this->basic_model->insert($v,'business');
		}

		foreach ($properties["commercialLand"] as $res)
		{
			$v=array();

			$listingAgent=$this->getList($res['listingAgent']);
			$commercialRent=$this->getList($res['commercialRent']);
			$address=$this->getList($res['address']);
			$highlight=$this->getList($res['highlight']);
			$landDetails=$this->getList($res['landDetails']);
			$vendorDetails=$this->getList($res['vendorDetails']);
			$images=$this->getList($res['images']);
			$objects=$this->getList($res['objects']);
			$miniweb=$this->getList($res['miniweb']);

			$v['agentID']=(string)$res['agentID'];
			$v['uniqueID']=(string)$res['uniqueID'];
			$v['marketing']=(string)$res['marketing'];
			$v['authority']=$this->getAttribute($res['authority'],'value');
			$v['commercialListingType']=$this->getAttribute($res['commercialListingType'],'value');
			$v['underOffer']=$this->getAttribute($res['underOffer'],'value');
			$v['listingAgent']=serialize($listingAgent);
			$v['price']=(string)$res['price'];
			$v['priceView']=(string)$res['priceView'];
			$v['commercialRent']=serialize($commercialRent);
			$v['outgoings']=$this->getValueAndAttribute($res['outgoings']);
			$v['return']=$this->getValueAndAttribute($res['return']);
			$v['currentLeaseEndDate']=(string)$res['currentLeaseEndDate'];
			$v['address']=serialize($address);
			if($address['state'])
				$v['state']=$address['state'];
			else
				$v['state']=$address['region'];
			$v['suburb']=$address['suburb'];
			$v['municipality']=(string)$res['municipality'];
			$v['estate']=(string)$res['estate'];
			$v['streetDirectory']=(string)$res['streetDirectory'];
			$v['headline']=(string)$res['headline'];
			$v['description']=(string)$res['description'];
			$v['highlight']=serialize($highlight);
			$v['soldDetails']=(string)$res['soldDetails'];
			$v['landDetails']=serialize($landDetails);
			$v['auction']=$this->getAttribute($res['auction'],'date');
			$v['vendorDetails']=serialize($vendorDetails);
			$v['externalLink']=$this->getAttribute($res['externalLink'],'href');
			$v['videoLink']=$this->getAttribute($res['videoLink'],'href');
			$v['extraFields']=(string)$res['extraFields'];
			$v['images']=serialize($images);
			$v['objects']=serialize($objects);
			$v['miniweb']=serialize($miniweb);
			$v['purchaseOrder']=(string)$res['purchaseOrder'];
			$v['status_sellable']=(string)$res['status'];
			$v['modTime']=date('Y-m-d-h:i:s', time());

			$this->basic_model->insert($v,'commercialLand');
		}

		foreach ($properties["commercial"] as $res)
		{
			$v=array();

			$listingAgent=$this->getList($res['listingAgent']);
			$commercialRent=$this->getList($res['commercialRent']);
			$address=$this->getList($res['address']);
			$highlight=$this->getList($res['highlight']);
			$landDetails=$this->getList($res['landDetails']);
			$vendorDetails=$this->getList($res['vendorDetails']);
			$images=$this->getList($res['images']);
			$objects=$this->getList($res['objects']);
			$miniweb=$this->getList($res['miniweb']);

			$v['agentID']=(string)$res['agentID'];
			$v['uniqueID']=(string)$res['uniqueID'];
			$v['marketing']=(string)$res['marketing'];
			$v['commercialAuthority']=$this->getAttribute($res['commercialAuthority'],'value');
			$v['exclusivity']=$this->getAttribute($res['exclusivity'],'value');
			$v['commercialListingType']=$this->getAttribute($res['commercialListingType'],'value');
			$v['underOffer']=$this->getAttribute($res['underOffer'],'value');
			$v['listingAgent']=serialize($listingAgent);
			$v['price']=(string)$res['price'];
			$v['priceView']=(string)$res['priceView'];
			$v['commercialRent']=serialize($commercialRent);
			$v['outgoings']=$this->getValueAndAttribute($res['outgoings']);
			$v['return']=$this->getValueAndAttribute($res['return']);
			$v['currentLeaseEndDate']=(string)$res['currentLeaseEndDate'];
			$v['tenancy']=(string)$res['tenancy'];
			$v['furtherOptions']=(string)$res['furtherOptions'];
			$v['isMultiple']=$this->getAttribute($res['isMultiple'],'value');
			$v['address']=serialize($address);
			if($address['state'])
				$v['state']=$address['state'];
			else
				$v['state']=$address['region'];
			$v['suburb']=$address['suburb'];
			$v['municipality']=(string)$res['municipality'];
			$v['streetDirectory']=(string)$res['streetDirectory'];
			$v['commercialCategory']=$this->getAttribute($res['commercialCategory'],'name');
			$v['headline']=(string)$res['headline'];
			$v['description']=(string)$res['description'];
			$v['highlight']=serialize($highlight);
			$v['soldDetails']=(string)$res['soldDetails'];
			$v['landDetails']=serialize($landDetails);
			$v['buildingDetails']=(string)$res['buildingDetails'];
			$v['propertyExtent']=(string)$res['propertyExtent'];
			$v['carSpaces']=(string)$res['carSpaces'];
			$v['parkingComments']=(string)$res['parkingComments'];
			$v['auction']=$this->getAttribute($res['auction'],'date');
			$v['vendorDetails']=serialize($vendorDetails);
			$v['zone']=(string)$res['zone'];
			$v['externalLink']=$this->getAttribute($res['externalLink'],'href');
			$v['videoLink']=$this->getAttribute($res['videoLink'],'href');
			$v['extraFields']=(string)$res['extraFields'];
			$v['images']=serialize($images);
			$v['objects']=serialize($objects);
			$v['miniweb']=serialize($miniweb);
			$v['purchaseOrder']=(string)$res['purchaseOrder'];
			$v['status_sellable']=(string)$res['status'];
			$v['modTime']=date('Y-m-d-h:i:s', time());

			$this->basic_model->insert($v,'commercial');
		}

		foreach ($properties["land"] as $res)
		{
			$v=array();

			$listingAgent=$this->getList($res['listingAgent']);
			$address=$this->getList($res['address']);
			$features=$this->getList($res['features']);
			$landDetails=$this->getList($res['landDetails']);
			$vendorDetails=$this->getList($res['vendorDetails']);
			$images=$this->getList($res['images']);
			$views=$this->getList($res['views']);
			$objects=$this->getList($res['objects']);


			$v['agentID']=(string)$res['agentID'];
			$v['uniqueID']=(string)$res['uniqueID'];
			$v['authority']=$this->getAttribute($res['authority'],'value');
			$v['underOffer']=$this->getAttribute($res['underOffer'],'value');
			$v['listingAgent']=serialize($listingAgent);
			$v['price']=(string)$res['price'];
			$v['priceView']=(string)$res['priceView'];
			$v['address']=serialize($address);
			if($address['state'])
				$v['state']=$address['state'];
			else
				$v['state']=$address['region'];
			$v['suburb']=$address['suburb'];
			$v['municipality']=(string)$res['municipality'];
			$v['estate']=(string)$res['estate'];
			$v['streetDirectory']=(string)$res['streetDirectory'];
			$v['landCategory']=$this->getAttribute($res['landCategory'],'name');
			$v['headline']=(string)$res['headline'];
			$v['description']=(string)$res['description'];
			$v['features']=serialize($features);
			$v['soldDetails']=(string)$res['soldDetails'];
			$v['landDetails']=serialize($landDetails);
			$v['auction']=$this->getAttribute($res['auction'],'date');
			$v['vendorDetails']=serialize($vendorDetails);
			$v['externalLink']=$this->getAttribute($res['externalLink'],'href');
			$v['videoLink']=$this->getAttribute($res['videoLink'],'href');
			$v['extraFields']=(string)$res['extraFields'];
			$v['images']=serialize($images);
			$v['views']=serialize($views);
			$v['objects']=serialize($objects);
			$v['status_sellable']=(string)$res['status'];
			$v['modTime']=date('Y-m-d-h:i:s', time());
			

			$this->basic_model->insert($v,'land');
		}

		foreach ($properties["rural"] as $res)
		{
			$v=array();

			$listingAgent=$this->getList($res['listingAgent']);
			$address=$this->getList($res['address']);
			$features=$this->getList($res['features']);
			$landDetails=$this->getList($res['landDetails']);
			$ruralFeatures=$this->getList($res['ruralFeatures']);
			$inspectionTimes=$this->getList($res['inspectionTimes']);
			$vendorDetails=$this->getList($res['vendorDetails']);
			$images=$this->getList($res['images']);
			$ecoFriendly=$this->getList($res['ecoFriendly']);
			$idealFor=$this->getList($res['idealFor']);
			$views=$this->getList($res['views']);
			$objects=$this->getList($res['objects']);


			$v['agentID']=(string)$res['agentID'];
			$v['uniqueID']=(string)$res['uniqueID'];
			$v['authority']=$this->getAttribute($res['authority'],'value');
			$v['underOffer']=$this->getAttribute($res['underOffer'],'value');
			$v['listingAgent']=serialize($listingAgent);
			$v['price']=(string)$res['price'];
			$v['priceView']=(string)$res['priceView'];
			$v['address']=serialize($address);
			if($address['state'])
				$v['state']=$address['state'];
			else
				$v['state']=$address['region'];
			$v['suburb']=$address['suburb'];
			$v['municipality']=(string)$res['municipality'];
			$v['streetDirectory']=(string)$res['streetDirectory'];
			$v['ruralCategory']=$this->getAttribute($res['ruralCategory'],'name');
			$v['headline']=(string)$res['headline'];
			$v['description']=(string)$res['description'];
			$v['features']=serialize($features);
			$v['ruralFeatures']=serialize($ruralFeatures);
			$v['soldDetails']=(string)$res['soldDetails'];
			$v['landDetails']=serialize($landDetails);
			$v['buildingDetails']=(string)$res['buildingDetails'];
			$v['inspectionTimes']=serialize($inspectionTimes);
			$v['auction']=$this->getAttribute($res['auction'],'date');
			$v['vendorDetails']=serialize($vendorDetails);
			$v['externalLink']=$this->getAttribute($res['externalLink'],'href');
			$v['videoLink']=$this->getAttribute($res['videoLink'],'href');
			$v['extraFields']=(string)$res['extraFields'];
			$v['images']=serialize($images);
			$v['ecoFriendly']=serialize($ecoFriendly);
			$v['idealFor']=serialize($idealFor);
			$v['views']=serialize($views);
			$v['objects']=serialize($objects);
			$v['status_sellable']=(string)$res['status'];
			$v['modTime']=date('Y-m-d-h:i:s', time());
			

			$this->basic_model->insert($v,'rural');
		}

		foreach ($properties["holidayRental"] as $res)
		{
			$v=array();

			$listingAgent=$this->getList($res['listingAgent']);
			$address=$this->getList($res['address']);
			$features=$this->getList($res['features']);
			$landDetails=$this->getList($res['landDetails']);
			$inspectionTimes=$this->getList($res['inspectionTimes']);
			$images=$this->getList($res['images']);
			$ecoFriendly=$this->getList($res['ecoFriendly']);
			$views=$this->getList($res['views']);
			$allowances=$this->getList($res['allowances']);
			$objects=$this->getList($res['objects']);

			$v['agentID']=(string)$res['agentID'];
			$v['uniqueID']=(string)$res['uniqueID'];
			$v['listingAgent']=serialize($listingAgent);
			$v['dateAvailable']=(string)$res['dateAvailable'];
			$v['rent']=$this->getValueAndAttribute($res['rent']);
			$v['priceView']=(string)$res['priceView'];
			$v['bond']=(string)$res['bond'];
			$v['address']=serialize($address);
			if($address['state'])
				$v['state']=$address['state'];
			else
				$v['state']=$address['region'];
			$v['suburb']=$address['suburb'];
			$v['municipality']=(string)$res['municipality'];
			$v['streetDirectory']=(string)$res['streetDirectory'];
			$v['holidayCategory']=$this->getAttribute($res['holidayCategory'],'name');
			$v['headline']=(string)$res['headline'];
			$v['description']=(string)$res['description'];
			$v['features']=serialize($features);
			$v['landDetails']=serialize($landDetails);
			$v['buildingDetails']=(string)$res['buildingDetails'];
			$v['inspectionTimes']=serialize($inspectionTimes);
			$v['externalLink']=$this->getAttribute($res['externalLink'],'href');
			$v['availabilityLink']=$this->getAttribute($res['availabilityLink'],'href');
			$v['extraFields']=(string)$res['extraFields'];
			$v['images']=serialize($images);
			$v['objects']=serialize($objects);
			$v['status_sellable']=(string)$res['status'];
			$v['modTime']=date('Y-m-d-h:i:s', time());

			//print_r($v);die;

			$this->basic_model->insert($v,'holidayRental');

		}

		foreach ($properties["rental"] as $res)
		{
			$v=array();

			$listingAgent=$this->getList($res['listingAgent']);
			$address=$this->getList($res['address']);
			$features=$this->getList($res['features']);
			$landDetails=$this->getList($res['landDetails']);
			$inspectionTimes=$this->getList($res['inspectionTimes']);
			$images=$this->getList($res['images']);
			$ecoFriendly=$this->getList($res['ecoFriendly']);
			$views=$this->getList($res['views']);
			$allowances=$this->getList($res['allowances']);
			$objects=$this->getList($res['objects']);

			$v['agentID']=(string)$res['agentID'];
			$v['uniqueID']=(string)$res['uniqueID'];
			$v['listingAgent']=serialize($listingAgent);
			$v['dateAvailable']=(string)$res['dateAvailable'];
			$v['rent']=$this->getValueAndAttribute($res['rent']);
			$v['priceView']=(string)$res['priceView'];
			$v['bond']=(string)$res['bond'];
			$v['address']=serialize($address);
			if($address['state'])
				$v['state']=$address['state'];
			else
				$v['state']=$address['region'];
			$v['suburb']=$address['suburb'];
			$v['municipality']=(string)$res['municipality'];
			$v['streetDirectory']=(string)$res['streetDirectory'];
			$v['category']=$this->getAttribute($res['category'],'name');
			$v['headline']=(string)$res['headline'];
			$v['description']=(string)$res['description'];
			$v['features']=serialize($features);
			//$v['holiday']=$this->getAttribute($res['holiday'],'value');
			$v['landDetails']=serialize($landDetails);
			$v['newConstruction']=(string)$res['newConstruction'];
			$v['buildingDetails']=(string)$res['buildingDetails'];
			$inspectionTimes=$this->getList($res['inspectionTimes']);
			$v['externalLink']=$this->getAttribute($res['externalLink'],'href');
			$v['videoLink']=$this->getAttribute($res['videoLink'],'href');
			$v['extraFields']=(string)$res['extraFields'];
			$v['images']=serialize($images);
			$v['objects']=serialize($objects);
			$v['ecoFriendly']=serialize($ecoFriendly);
			$v['views']=serialize($views);
			$v['allowances']=serialize($allowances);
			$v['status_sellable']=(string)$res['status'];
			$v['modTime']=date('Y-m-d-h:i:s', time());

			$this->basic_model->insert($v,'rental');

		}

		foreach ($properties["residential"] as $res)
		{
			$v=array();

			$listingAgent=$this->getList($res['listingAgent']);
			$address=$this->getList($res['address']);
			$features=$this->getList($res['features']);
			$landDetails=$this->getList($res['landDetails']);
			$inspectionTimes=$this->getList($res['inspectionTimes']);
			$vendorDetails=$this->getList($res['vendorDetails']);
			$images=$this->getList($res['images']);
			$ecoFriendly=$this->getList($res['ecoFriendly']);
			$idealFor=$this->getList($res['idealFor']);
			$views=$this->getList($res['views']);
			$objects=$this->getList($res['objects']);


			$v['agentID']=(string)$res['agentID'];
			$v['uniqueID']=(string)$res['uniqueID'];
			$v['authority']=$this->getAttribute($res['authority'],'value');
			$v['underOffer']=$this->getAttribute($res['underOffer'],'value');
			$v['isHomeLandPackage']=$this->getAttribute($res['isHomeLandPackage'],'value');
			$v['listingAgent']=serialize($listingAgent);
			$v['price']=(string)$res['price'];
			$v['priceView']=(string)$res['priceView'];
			$v['address']=serialize($address);
			if($address['state'])
				$v['state']=$address['state'];
			else
				$v['state']=$address['region'];
			$v['suburb']=$address['suburb'];
			$v['municipality']=(string)$res['municipality'];
			$v['streetDirectory']=(string)$res['streetDirectory'];
			$v['category']=$this->getAttribute($res['category'],'name');
			$v['headline']=(string)$res['headline'];
			$v['description']=(string)$res['description'];
			$v['features']=serialize($features);
			$v['bedrooms']=$features['bedrooms'];
			$v['bathrooms']=$features['bathrooms'];
			$v['garages']=$features['garages'];
			$v['carports']=$features['carports'];
			$v['soldDetails']=(string)$res['soldDetails'];
			$v['landDetails']=serialize($landDetails);
			$v['area']=$landDetails['area'];
			$v['buildingDetails']=(string)$res['buildingDetails'];
			$v['inspectionTimes']=serialize($inspectionTimes);
			$v['auction']=$this->getAttribute($res['auction'],'date');
			$v['vendorDetails']=serialize($vendorDetails);
			$v['externalLink']=$this->getAttribute($res['externalLink'],'href');
			$v['videoLink']=$this->getAttribute($res['videoLink'],'href');
			$v['extraFields']=(string)$res['extraFields'];
			$v['images']=serialize($images);
			$v['newConstruction']=(string)$res['newConstruction'];
			$v['ecoFriendly']=serialize($ecoFriendly);
			$v['idealFor']=serialize($idealFor);
			$v['views']=serialize($views);
			$v['objects']=serialize($objects);
			$v['status_sellable']=(string)$res['status'];
			$v['modTime']=date('Y-m-d-h:i:s', time());
			

			$this->basic_model->insert($v,'residential');
		}
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
			return serialize($arr);
	}

	function getList($obj)
	{//print_r($obj);die;
		if(!is_array($obj))
		{
			$obj=(array)$obj;
		}
		foreach ($obj as $key => $value)
		{
			if(is_object($value))
			{
				foreach($value->attributes() as $key2 => $value2)
				{
		    		$arr[$key2]=(string)$value2;
				}
			}
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