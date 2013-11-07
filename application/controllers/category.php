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
}
?>