<?php
class Business extends CI_Controller
{
	function index()
	{
		$data['view_page'] = 'business';
		$this->load->view('template', $data);
	}

	function ourvalueproposition()
	{
		$data['view_page'] = 'business_proposition.php';
		$this->load->view('template', $data);
	}

	function ourteam()
	{
		$data['view_page'] = 'business_ourteam.php';
		$this->load->view('template', $data);
	}
	function contact()
	{
		$data['view_page'] = 'business_contact.php';
		$this->load->view('template', $data);
	}
}
?>