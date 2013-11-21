<?php
class Contacts extends CI_Controller
{
	function __construct()
	 {
	   parent::__construct();
	   $this->load->helper(array('form', 'url', 'captcha'));
	   $this->load->library(array('form_validation', 'session'));
	   $this->load->database();
	 }
	function index()
	{
		$data['view_page'] = 'contacts';
		$this->load->view('template', $data);
		
	}
	function query()
	{
		
				$this->form_validation->set_rules('name', 'Name', 'trim|max_length[30]|min_length[3]');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|max_length[100]');
				$this->form_validation->set_rules('phone', 'Phone', 'trim|max_length[17]|callback_phone_check');
				$this->form_validation->set_rules('message', 'Message', 'trim|max_length[1000]');
				//$this->form_validation->set_rules('captcha', "Captcha", 'required|callback_captcha_check');
				if($this->form_validation->run() ==FALSE)
				{
					$err['name'] = form_error('name');
					$err['email'] = form_error('email');
					$err['phone'] = form_error('phone');
					$err['message'] = form_error('message');
					//$err['captcha'] = form_error('captcha');
					$data['err']=$err;
				}
				else
				{
					$data['success']=0;
					$name=$this->input->post('name');
					$email=$this->input->post('email');
					$phone=$this->input->post('phone');
					$message=$this->input->post('message');

					$values=array(
						'name' => $name,
						'email' => $email,
						'phone' => $phone,
						'message' => $message,
					);
					//$result=$this->feedback_model->add_feedback($values);	// Insert feedback to database
					$result=1;
					if($result)
					{
						$data['success']=1;
						$data['msg']='Thank you, we will get back to you shortly.';

						//Mail Configuration
						$this->load->library('email');
						$config['charset'] = 'iso-8859-1';
						$config['wordwrap'] = TRUE;
						$config['mailtype']='html';
						$this->email->initialize($config);
						$this->email->from('support@digitalchakra.in', 'Digitalchakra');
						$this->email->subject('New Feedback from Hsbutyl');
						$content2= 'Dear Admin<br />
						<br />New feedback submitted on Hsbutyl.<br />
						<br />Feedback Details:<br />
						Name: '.$name.'<br />
						Email / Phone: '.$email.'<br />
						Message: '.$message.'<br /><br />Regards<br />Digitalchakra Team';
						$this->email->to('manimani1014@gmail.com');
						//$this->email->to('aditya@digitalchakra.in');
						$this->email->message($content2);
						$this->email->send();

					}
					else
					{
						$data['msg']='Internal error. Please try again later.';
					}
				}
				$output['resultset']=$data;
				$this->load->view('json', $output);
	}
}
?>