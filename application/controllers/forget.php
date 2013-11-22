
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forget extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
	 $email = $this->input->post('username');
	 $this->load->helper('email');
	 if (valid_email($email))
	 {
		 $this->load->model('user');
		 $check_data=array('email'=>$email);
			if($result = $this->user->check_user($check_data))
			{
				$update_data= array(
							'forget'=>sha1(mt_rand(10000,99999).time().$email)
						  );
				$where=array('email'=>$email);
				if($this->user->update_user($where,$update_data))
				{
					$this->load->library('email');
					#$config['protocol'] = 'sendmail';
					#$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype']='html';
					$this->email->initialize($config);
					$this->email->from('no-reply@ezcv.in', 'EZCV Password');
					$this->email->to($email);
					#$this->email->cc('another@another-example.com');
					#$this->email->bcc('them@their-example.com');
					$this->email->subject('Reset your EZCV password');
					$message= 'Hi '.$email.'<br><br> Change your password is simple, please click on the link below. <br>
					<a href="'.base_url('forget/reset/'.$update_data['forget']).'">'.base_url('forget/reset/'.$update_data['forget']).'  </a>
					<br><br>Thank you';
					

					$this->email->message($message);
					$this->email->send();
					$data['success']='yes';
					$result['resultset']=$data;
      				$this->load->view('json',$result);
				}
				else
				{
				$data['success']='no';
				$data['errors']='Internal error, please try again!';
				$result['resultset']=$data;
      			$this->load->view('json',$result);
				}
				//$this->load->view('login_view');
				//redirect('home', 'refresh');
			}
			else
			{
				$data['errors']="There is no account exist with this email address.";
				$data['success']='no';
				$result['resultset']=$data;
      			$this->load->view('json',$result);
			}
	 }
	 else
	 {
		$data['errors']="invalid email";
		$data['success']='no';
		$result['resultset']=$data;
    	$this->load->view('json',$result);
	 }
 }
 function activation()
 {
	 $this->load->library('passhash'); 	
	 $password = $this->input->post('password');
	 $cpassword = $this->input->post('cpassword');
	 $active = $this->input->post('acode');
	 if($active)
	 {
	 if($password == $cpassword)
	 {
		 if(strlen($password)>=6)
		{
		 $update_data=array('password'=>$this->passhash->hash($password),'active'=>1,'forget'=>"");
		 $where=array('forget'=>$active);
		 $this->load->model('user');
		 if($this->user->update_user($where,$update_data))
		 {
		 	$data['view_page'] = 'reset_success';
			$this->load->view('template', $data);
		 }
		 else
		 {
			$check_data=array('forget'=>$active,'id_encrypt'=>$id, 'error'=>'internal error');
			$check_data['view_page'] = 'reset';
			$this->load->view('template', $check_data);
		 }
		}
		else
		 {
			$check_data=array('forget'=>$active,'id_encrypt'=>$id, 'error'=>'Passwords should have minimum 6 characters');
			$check_data['view_page'] = 'reset';
			$this->load->view('template', $check_data);
		 }
	 }
	 else
	 {
		$check_data=array('forget'=>$active,'id_encrypt'=>$id, 'error'=>'Passwords mismatch');
		$check_data['view_page'] = 'reset';
		$this->load->view('template', $check_data);
	 }
	}
	else
	{
		//redirect('login', 'refresh');
	}
 }
 function reset()
 {
	 $code = ($this->uri->segment(3)) ? urldecode($this->uri->segment(3)) : NULL;
	 if(($code) &&  strlen($code)>2)
	 {
		 $this->load->model('user');
		 $check_data=array('forget'=>$code);
		 if($result = $this->user->check_user($check_data))
		 {
			$check_data['error']=NULL;
			$check_data['view_page'] = 'reset';
			$this->load->view('template', $check_data);
		 }
		 else
		 {
			 redirect('login', 'refresh');
		 }
	 }
	 else
	 {
		 redirect('login', 'refresh');
	 }
 }
}

?>

