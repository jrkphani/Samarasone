<?php
class Category extends CI_Controller
{
	function residential()
	{
		$data['view_page'] = 'residential';
		$this->load->view('template', $data);
	}
	
	function commercial()
	{
		$data['view_page']='commercial';
		$this->load->view('template', $data);
	}
	function business()
	{
		$data['view_page'] = 'business';
		$this->load->view('template', $data);
	}
}
?>