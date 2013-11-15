<?php
class Commercial extends CI_Controller
{
	function index()
	{
		$data['view_page'] = 'commercial';
		$this->load->view('template', $data);
	}

	function ourvalueproposition()
	{
		$data['view_page'] = 'commercial_proposition.php';
		$this->load->view('template', $data);
	}

	function ourteam()
	{
		$data['view_page'] = 'commercial_ourteam.php';
		$this->load->view('template', $data);
	}
	function contact()
	{
		$data['view_page'] = 'commercial_contact.php';
		$this->load->view('template', $data);
	}
}
?>