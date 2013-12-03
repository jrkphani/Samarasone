<?php
class Residential extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
		$this->load->model('image_model');
	}
	function index()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/residential.html");
		$data['contact_str']=$this->get_content(FCPATH."application/views/dynamics/residential_contact.html");
		$data['view_page'] = 'residential';
		$data['image']=array();
		$data['headline']=array();
		$images = $this->image_model->getImage('residential',4);
		if($images)
		{
			foreach($images as $row)
			{
				$image_array = unserialize($row->images);
			if(count($image_array))
				{
					$data['headline'][]=$row->headline;
					$data['viewLink'][]=base_url('view/index/residential/sale/Residential/'.$row->uniqueID);
					$data['image'][] = $image_array[0];
				}
			}
			
		}
		
		$images = $this->image_model->getImage('land',4);
		if($images)
		{
			foreach($images as $row)
			{
				$image_array = unserialize($row->images);
			if(count($image_array))
				{
					$data['headline'][]=$row->headline;
					$data['viewLink'][]=base_url('view/index/residential/sale/Land/'.$row->uniqueID);
					$data['image'][] = $image_array[0];
				}
			}
			
		}
		$images = $this->image_model->getImage('rural',4);
		if($images)
		{
			foreach($images as $row)
			{
				$image_array = unserialize($row->images);
			if(count($image_array))
				{
					$data['headline'][]=$row->headline;
					$data['viewLink'][]=base_url('view/index/residential/sale/Rural/'.$row->uniqueID);
					$data['image'][] = $image_array[0];
				}
			}
			
		}
		$images = $this->image_model->getImage('rental',4);
		if($images)
		{
			foreach($images as $row)
			{
				$image_array = unserialize($row->images);
			if(count($image_array))
				{
					$data['headline'][]=$row->headline;
					$data['viewLink'][]=base_url('view/index/residential/lease/Rental/'.$row->uniqueID);
					$data['image'][] = $image_array[0];
				}
			}
			
		}
		$images = $this->image_model->getImage('holidayRental',4);
		if($images)
		{
			foreach($images as $row)
			{
				$image_array = unserialize($row->images);
			if(count($image_array))
				{
					$data['headline'][]=$row->headline;
					$data['viewLink'][]=base_url('view/index/residential/lease/Holiday/'.$row->uniqueID);
					$data['image'][] = $image_array[0];
				}
			}
			
		}
		//echo "<pre>";
		//print_r($data); die;
		$this->load->view('template', $data);
	}

	function ourvalueproposition()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/residential_proposition.html");
		$data['contact_str']=$this->get_content(FCPATH."application/views/dynamics/residential_contact.html");
		$data['view_page'] = 'residential_proposition.php';
		$this->load->view('template', $data);
	}

	function ourteam()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/residential_ourteam.html");
		$data['contact_str']=$this->get_content(FCPATH."application/views/dynamics/residential_contact.html");
		$data['view_page'] = 'residential_ourteam.php';
		$this->load->view('template', $data);
	}
	function contact()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/residential_contact.html");
		$data['view_page'] = 'residential_contact.php';
		$this->load->view('template', $data);
	}

	function get_content($file)
	{
		return read_file($file);
	}
}
?>