<?php
class my404 extends CI_Controller
{
	public function __construct()
	{
	        parent::__construct();
	}

	public function index()
	{
		$this->output->set_status_header('404');
		$data['view_page']='my404';
		$this->load->view('template',$data);//loading in my template
	}
}
?>