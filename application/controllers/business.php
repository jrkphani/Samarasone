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
			$image_array = unserialize($images[0]->images);
			$data['headline'][]=$images[0]->headline;
			if(!count($image_array))
				{
					//$data['image'][] = base_url('assets/images/s_img1.jpg');
				}
			else
				{
					$data['image'][] = $image_array[0];
				}
				
			$image_array = unserialize($images[1]->images);
			$data['headline'][]=$images[1]->headline;
			if(!count($image_array))
				{
					//$data['image'][] = base_url('assets/images/s_img1.jpg');
				}
			else
				{
					$data['image'][] = $image_array[0];
				}
				
			$image_array = unserialize($images[2]->images);
			$data['headline'][]=$images[2]->headline;
			if(!count($image_array))
				{
					//$data['image'][] = base_url('assets/images/s_img1.jpg');
				}
			else
				{
					$data['image'][] = $image_array[0];
				}
				
			$image_array = unserialize($images[3]->images);
			$data['headline'][]=$images[3]->headline;
			if(!count($image_array))
				{
					//$data['image'][] = base_url('assets/images/s_img1.jpg');
				}
			else
				{
					$data['image'][] = $image_array[0];
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

	function get_content($file)
	{
		return read_file($file);
	}
}
?>