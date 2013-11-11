<?php
class Contacts extends CI_Controller
{
	function index()
	{
		$data['view_page'] = 'contacts';
		$this->load->view('template', $data);
	}
}
?>