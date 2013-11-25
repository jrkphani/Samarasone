<?php
class Business extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
	}
	function index()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/business.html");
		$data['view_page'] = 'business';
		$this->load->view('template', $data);
	}

	function ourvalueproposition()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/business_proposition.html");
		$data['view_page'] = 'business_proposition.php';
		$this->load->view('template', $data);
	}

	function ourteam()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/business_ourteam.html");
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