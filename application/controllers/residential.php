<?php
class Residential extends CI_Controller
{
	function index()
	{
		$data['view_page'] = 'residential';
		$this->load->view('template', $data);
	}

	function ourvalueproposition()
	{
		$data['view_page'] = 'residential_proposition.php';
		$this->load->view('template', $data);
	}

	function ourteam()
	{
		$data['view_page'] = 'residential_ourteam.php';
		$this->load->view('template', $data);
	}
}
?>