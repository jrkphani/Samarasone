<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
function __construct()
{
	parent::__construct();
	$this->current_user=$this->session->userdata('logged_in');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->helper('file');
	$this->pages = array(1=>'home',2=>'residential',3=>'commercial',4=>'business',5=>'residential_proposition',6=>'commercial_proposition',7=>'business_proposition',8=>'residential_ourteam',9=>'commercial_ourteam',10=>'business_ourteam',11=>'residential_contact',12=>'commercial_contact',13=>'business_contact');
}

function index()
{
	if(!$this->current_user)
		redirect(base_url('admin/login'), 'refresh');
	$data['view_page'] = 'admin/pages';
	$data['email'] = $this->current_user['email'];
	$data['pages'] = $this->pages;
	//print_r($data);
	$this->load->view('template', $data);
}
function edit()
{
	if(!$this->current_user)
		redirect(base_url('admin/login'), 'refresh');
	$page=$this->uri->segment(3);
	if(in_array($page,$this->pages))
	{
		 $data['msg'] ="";
		 $data['page'] =$page;
		 $data['redirect'] = NULL;
		$file=FCPATH."application/views/dynamics/".$page.".html";
		if($content = $this->input->post('content'))
		{
			$data['msg'] = 'Content Updated Successfully!';
			$data['redirect'] = TRUE;
			if ( ! write_file($file, $content))
			{
				 $data['msg'] = 'Internal error, please contact Administator';
			}
		}
		$data['content'] = read_file($file);
		$data['view_page'] = 'admin/edit_page';
		$this->load->view('template', $data);
	}
	else
	{
		redirect('my404');
	}
}
function edit_contact()
{
	if(!$this->current_user)
		redirect('admin/login', 'refresh');
	$page=$this->uri->segment(3);
	if(in_array($page,$this->pages))
	{
		 $data['msg'] ="";
		 $data['page'] =$page;
		 $data['redirect'] = NULL;
		$file=FCPATH."application/views/dynamics/".$page.".html";
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$fax = $this->input->post('fax');
		$mobile = $this->input->post('mobile');
		$email = $this->input->post('email');
		
		$content = $address."##".$phone."##".$fax."##".$mobile."##".$email;
		if(($address) || ($phone) || ($fax) || ($mobile) || ($email))
		{
			$data['msg'] = 'Content Updated Successfully!';
			$data['redirect'] = TRUE;
			if ( ! write_file($file, $content))
			{
				 $data['msg'] = 'Internal error, please contact Administator';
			}
		}
		$content = explode('##',read_file($file));
		//print_r($content); die;
		$data['content'] = explode('##',read_file($file));
		$data['view_page'] = 'admin/edit_contact_page';
		$this->load->view('template', $data);
	}
	else
	{
		redirect('my404');
	}
}
function login()
{
	if($this->current_user)
		{
		 		redirect('admin', 'refresh');
		}
		else
		{
			$data['view_page'] = 'login_view';
			$this->load->view('template', $data);
		}
}
function logout()
{
	$this->session->unset_userdata('logged_in');
	$this->session->sess_destroy();
	redirect(base_url('admin/login'), 'refresh');
}
}
?>
