<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function index()
	{
		$current_user=$this->session->userdata('logged_in');
		if($current_user)
		{
		 		redirect('admin', 'refresh');
		}
		else
		{
			$this->load->helper(array('form'));
			$data['view_page'] = 'login_view';
			$this->load->view('template', $data);
		}
		}
		function logout()
		{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
}

?>