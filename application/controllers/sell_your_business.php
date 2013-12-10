<?php
class Sell_your_business extends CI_Controller
{
	function index()
	{
		$data['view_page'] = 'sell_your_business';
		$this->load->view('template', $data);
	}
}