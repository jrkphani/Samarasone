<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function index()
	{
		$file=FCPATH."application/views/dynamics/home.html";
		$file_obj=fopen($file, 'r');
		$file_content = fread($file_obj, filesize($file));
		fclose($file_obj);
		$data['content']=$file_content;
		$data['view_page'] = 'home';
		$this->load->view('template', $data);
	}

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   //session_destroy();
   $this->session->sess_destroy();
   redirect('login', 'refresh');
 }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */