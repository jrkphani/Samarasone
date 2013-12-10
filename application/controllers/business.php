<?php
class Business extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
		$this->load->model('image_model');
	}
	function index()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/business.html");
		$data['contact_str']=$this->get_content(FCPATH."application/views/dynamics/business_contact.html");
		$data['view_page'] = 'business';
		$data['image']=array();
		$data['headline']=array();
		$images = $this->image_model->getImage('business',4);
		
		if($images)
		{
			foreach($images as $row)
			{
				$image_array = unserialize($row->images);
			if(count($image_array))
				{
					$data['headline'][]=$row->headline;
					$data['viewLink'][]=base_url('view/index/residential/sale/Business/'.$row->uniqueID);
					$data['image'][] = $image_array[0];
				}
			}
			
		}
		$this->load->view('template', $data);
	}

	function ourvalueproposition()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/business_proposition.html");
		$data['contact_str']=$this->get_content(FCPATH."application/views/dynamics/business_contact.html");
		$data['view_page'] = 'business_proposition.php';
		$this->load->view('template', $data);
	}

	function ourteam()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/business_ourteam.html");
		$data['contact_str']=$this->get_content(FCPATH."application/views/dynamics/business_contact.html");
		$data['view_page'] = 'business_ourteam.php';
		$this->load->view('template', $data);
	}
	function contact()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/business_contact.html");
		$data['view_page'] = 'business_contact.php';
		$this->load->view('template', $data);
	}
	function sell_your_business()
	{
		$data['view_page'] = 'sell_your_business';
		$data['contact_str']=$this->get_content(FCPATH."application/views/dynamics/business_contact.html");
		$this->load->view('template', $data);
	}

	function get_content($file)
	{
		return read_file($file);
	}
}
?>