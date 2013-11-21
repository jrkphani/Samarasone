<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[254]|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.&nbsp; User redirected to login page
    $data['errors']=validation_errors();
    $data['success']='no';
    $result['resultset']=$data;
    $this->load->view('json',$result);
     //$this->load->view('login_view');
   }
   else
   {
    $arr=$this->session->userdata('logged_in');
		$data['success']='yes';
		$result['resultset']=$data;
		$this->load->view('json',$result);
   }

 }

 function check_database($password)
 {
    $this->load->library('passhash');
   //Field validation succeeded.&nbsp; Validate against database
   $username = $this->input->post('username');

   //query the database
   $where=array('email' => $username, 'active' => 1);
   $db_password = $this->user->get_password($where);
    if ($this->passhash->check_input($db_password, $password)) {
      $result = $this->user->login($username);
      if($result){
       $sess_array1 = array();
       foreach($result as $row){
          $sess_array = array(
           'id' => $row->id,
          // 'id_encrypt' => $row->id_encrypt,
           'email' => $row->email
         );
       }
  	 $this->session->set_userdata('logged_in', $sess_array);
       return TRUE;
     }
   }
     else
     {
       $this->form_validation->set_message('check_database', 'Invalid username or password.');
       return false;
     }
 }
}
?>