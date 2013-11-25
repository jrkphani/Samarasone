<?php
class Commercial extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
	}
	function index()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/commercial.html");
		$data['view_page'] = 'commercial';
		$this->load->view('template', $data);
	}

	function ourvalueproposition()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/commercial_proposition.html");
		$data['view_page'] = 'commercial_proposition.php';
		$this->load->view('template', $data);
	}

	function ourteam()
	{
		$data['content']=$this->get_content(FCPATH."application/views/dynamics/commercial_ourteam.html");
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