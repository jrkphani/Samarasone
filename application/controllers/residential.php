<?php
class Residential extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
	}
	function index()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/residential.html");
		$data['view_page'] = 'residential';
		$this->load->view('template', $data);
	}

	function ourvalueproposition()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/residential_proposition.html");
		$data['view_page'] = 'residential_proposition.php';
		$this->load->view('template', $data);
	}

	function ourteam()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/residential_ourteam.html");
		$data['view_page'] = 'residential_ourteam.php';
		$this->load->view('template', $data);
	}
	function contact()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/residential_contact.html");
		$data['view_page'] = 'residential_contact.php';
		$this->load->view('template', $data);
	}

	function get_content($file)
	{
		return read_file($file);
	}
}
?>