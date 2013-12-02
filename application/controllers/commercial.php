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
		$images = $this->image_model->getImage('commercial',2);
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
		}
		
		$images = $this->image_model->getImage('commercialLand',2);
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