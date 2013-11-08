<?php
class Category extends CI_Controller
{
	function residency()
	{
		$data['view_page'] = 'residency';
		$this->load->view('template', $data);
	}
	
	function commercial()
	{
		$data['view_page'] = 'commercial';
		$this->load->view('template', $data);
	}
	function business()
	{
		$data['view_page'] = 'business';
		$this->load->view('template', $data);
	}
	function reseidentialsearch()
	{
		$data['view_page'] = 'reseidentialsearch';
		$this->load->view('template', $data);
	}
	function businesssearch()
	{
		$data['view_page'] = 'businesssearch';
		$this->load->view('template', $data);
	}
	function property()
	{
		$data['view_page'] = 'property';
		$this->load->view('template', $data);
	}
}
?>