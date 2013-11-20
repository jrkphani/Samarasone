<?php
class View extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$data['view_page']='view';
		$this->load->view('template', $data);
	}
}
?>