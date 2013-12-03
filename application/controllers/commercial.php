<?php
class Commercial extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
		$this->load->model('image_model');
	}
	function index()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/commercial.html");
		$data['contact_str']=$this->get_content(FCPATH."application/views/dynamics/commercial_contact.html");
		$data['view_page'] = 'commercial';
		$data['image']=array();
		$data['headline']=array();
		$images = $this->image_model->getImage('commercial',4);
		if($images)
		{
			foreach($images as $row)
			{
				$image_array = unserialize($row->images);
			if(count($image_array))
				{
					$data['headline'][]=$row->headline;
					$data['viewLink'][]=base_url('view/index/residential/sale/Commercial/'.$row->uniqueID);
					$data['image'][] = $image_array[0];
				}
			}
			
		}
		
		$images = $this->image_model->getImage('commercialLand',4);
		if($images)
		{
			foreach($images as $row)
			{
				$image_array = unserialize($row->images);
			if(count($image_array))
				{
					$data['headline'][]=$row->headline;
					$data['viewLink'][]=base_url('view/index/residential/sale/CommercialLand/'.$row->uniqueID);
					$data['image'][] = $image_array[0];
				}
			}
			
		}

		$this->load->view('template', $data);
	}

	function ourvalueproposition()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/commercial_proposition.html");
		$data['contact_str']=$this->get_content(FCPATH."application/views/dynamics/commercial_contact.html");
		$data['view_page'] = 'commercial_proposition.php';
		$this->load->view('template', $data);
	}

	function ourteam()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/commercial_ourteam.html");
		$data['contact_str']=$this->get_content(FCPATH."application/views/dynamics/commercial_contact.html");
		$data['view_page'] = 'commercial_ourteam.php';
		$this->load->view('template', $data);
	}

	function contact()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/commercial_contact.html");
		$data['view_page'] = 'commercial_contact.php';
		$this->load->view('template', $data);
	}

	function get_content($file)
	{
		return read_file($file);
	}
}
?>