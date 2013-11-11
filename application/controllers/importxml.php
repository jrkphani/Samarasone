<?php
class ImportXML extends CI_Controller
{
	function index()
	{
		include FCPATH."application/third_party/ImportXML/rea_xml.class.php";
		$this->load->model('basic_model');

		$rea = new REA_XML($debug=true); //uses default fields
		$xml_file_dir=FCPATH.'application/third_party/ImportXML/xmls';
		$processed_dir=FCPATH.'application/third_party/ImportXML/outs';
		$failed_dir=FCPATH.'application/third_party/ImportXML/errs';

		$properties = $rea->parse_directory($xml_file_dir, $processed_dir, $failed_dir, $excluded_files=array());
		//print_r($properties);die;
		//echo '<pre>', var_dump($properties), '</pre>';die;

		foreach ($properties["residential"] as $res)
		{
			//print_r($res);die;
			//$this->simplexml_to_array($res['address']);

			$v=array();
			//$authority=$this->myFuntion($res['authority']);print_r($authority);die;
			$address=$this->myFuntion($res['address']);
			$v['agentID']=(string)$res['agentID'];
			$v['uniqueID']=(string)$res['uniqueID'];
			//$v['authority']='sdgsd';
			$v['category']=(string)$res['category'];
			$v['priceView']=(string)$res['priceView'];
			$v['description']=(string)$res['description'];print_r($address);
			$v['address']=serialize($address);

			echo $this->basic_model->insert($v,'residential');
		}
	}

	function myFuntion($obj)
	{//print_r($obj);

		foreach ($obj as $key => $obj2) {//print_r($obj2);echo $obj2->count().'<br /><br /><br />';
			//if($key=='suburb')
			/*if(sizeof($obj2)>1)
			{echo 'eeeee';die;
				$obj_arr['dis']=(string)$obj2['display'];
			}*/
			$obj_arr[$key]=(string)$obj2;

			$role = $obj2->attributes();
			foreach ($role as $key => $value)
			{
				$obj_arr[$key]=(string)$value;
			}
		}
		
		return $obj_arr;
	}


	function simplexml_to_array($xmlobj) {
    $a = array();
    foreach ($xmlobj as $node) {
        if (is_array($node))
            $a[$node->getName()] = simplexml_to_array($node);
        else
            $a[$node->getName()] = (string) $node;
    }
    return $a;
} 
}
?>