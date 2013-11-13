<?php
class View extends CI_Controller
{
	function index()
	{
		$data['view_page']='view';
		$this->load->view('template', $data);
	}
}
?>