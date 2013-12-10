<?php
class Newsletter extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('basic_model');
	}
	function index()
	{
		
	}
	function addemail()
	{
		$data['email'] = $this->input->post('email');
		$data['name'] = $this->input->post('name');
		$result = $this->basic_model->insert($data,'newsletter');
	}
}
?>