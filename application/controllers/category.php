<?php
class Category extends CI_Controller
{
	function residency()
	{
		$data['view_page'] = 'residency';
		$this->load->view('template', $data);
	}
	
	function commercial()
	{


		$data['view_page']='commercial';
		$this->load->view('template', $data);
	}
	function business()
	{
		$data['view_page'] = 'business';
		$this->load->view('template', $data);
	}
	function reseidentialsearch()
	{		
	  $this->load->model('basic_model');
		$fields=array('suburb');
		$data['result']=$this->basic_model->select($fields,'residential');

		$data['sale_type']=NULL;
		$data['suburb']=NULL;
		$data['type']=NULL;
		$data['price_from']=NULL;
		$data['price_to']=NULL;
		$data['bedroom']=NULL;
		$data['garage']=NULL;
		$data['view_page'] = 'reseidentialsearch';
		$this->load->view('template', $data);
	}
	function businesssearch()
	{
		$data['view_page'] = 'businesssearch';
		$this->load->view('template', $data);
	}
	function property()
	{
		$data['view_page'] = 'property';
		$this->load->view('template', $data);
	}
}
?>