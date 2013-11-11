<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
function __construct()
{
	parent::__construct();
	$this->current_user=$this->session->userdata('logged_in');
	if($this->current_user['role']!='admin')
		redirect('login', 'refresh');
}

function index()
{
	$this->userList();
}

function userList()	//Load at first time
{
	$this->load->model('admin_model');
	$data['userlist']=$this->admin_model->userList($this->current_user['id']);
	$data['role']=NULL;
	$data['status']=NULL;
	$data['pagi']=$this->pagination();
	$data['view_page'] = 'userList';
	$this->load->view('template', $data);
}

function userListAjax()	//Load when pagination or other form submits
{
	$from=$this->uri->segment(3);
	$this->load->model('admin_model');
	$role=$this->input->post('role');
	$status=$this->input->post('status');
	$data['role']=$role;
	$data['status']=$status;
	$data['userlist']=$this->admin_model->userList($this->current_user['id'],$role,$status,$from);
	$data['pagi']=$this->pagination($role,$status);
	$this->load->view('userList', $data);
}

function pagination($role=NULL,$status=NULL)
{
	$this->load->library('jquery_pagination');
	$config['div'] = '#ajax-content';
	$config['additional_param']  = 'serialize_form()';
	$config['base_url'] = base_url().'admin/userListAjax/';
	$config['total_rows'] =  $this->admin_model->totalUserRecords($this->current_user['id'],$role,$status);
	$config['per_page'] = 2;
	$this->jquery_pagination->initialize($config);
	return $this->jquery_pagination->create_links();
}

/*function pendingUsers($msg=NULL)
{
	$this->load->model('admin_model');
	$data['userlist']=$this->admin_model->pendingUsers();
	$data['view_page'] = 'pendingUsers';
	$data['msg']=$msg;
	$this->load->view('template', $data);
}*/

function activateUser($id,$type,$to_email)
{
 	$this->load->model('admin_model');
 	if($type=='activate')
 		$result=$this->admin_model->activateUser($id);
 	else if($type=='block')
 		$result=$this->admin_model->blockUser($id);
 	if($result)
 	{
 		$data['resultset']['success']=1;

 		$this->load->library('email');
 		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype']='html';
		$to_email=urldecode($to_email);
		$this->email->initialize($config);
		$this->email->from('resume@digitalchakra.in', 'Digital Chakra');
		$this->email->to($to_email);
 		if($type=='activate')
 		{
 			$this->email->subject('Your Resume App account successfully activated.');
			$message= 'Dear user,<br />Your account on Resume App has been activated. Now you can login here: <a href="'.base_url().'">Digitalchakra Resume App</a>.<br />Regards,<br />Resume App Team.';
 		}
 		else if($type=='block')
 		{
 			$this->email->subject('Your Resume App account was inactivated by admin.');
 			$message= 'Dear user,<br />Your account on Resume App has been inactivated by admin.';
 			$msg=$this->input->post('msg');
 			if($msg)
				$message.='<br /><br />'.$msg;
			$message.='<br />Regards,<br />Resume App Team.';
 		}
 		$this->email->message($message);
		if(!$this->email->send())
			$data['resultset']['mail']='no';
 	}
 	else
 	{
 		$data['resultset']['success']=-1;
 	}
   	$this->load->view('json',$data);
}

function editUser($id=NULL)
{
	$this->load->helper('form');
	$this->load->library('form_validation');	
	$this->load->model('admin_model');

	if(!$id)
		redirect('my404');

	$result=$this->admin_model->userDetails($id);
	$data=$result[0];
	$data['view_page'] = 'userEdit';
	$data['user_id']=$id;

	//Update
	if(isset($_POST['submit_form1']))
	{
		$this->form_validation->set_rules('email', 'Primary Email', 'trim|required|valid_email|max_length[254]');
		$this->form_validation->set_rules('role', 'Role', 'required');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('template', $data);
		}
		else
		{
			$this->admin_model->userUpdate($this->input->post('user_id'),$this->input->post('email'),$this->input->post('role'));
			redirect(base_url('admin/userList'));
		}
	}
	else
	{
		//View
		$this->load->view('template', $data);
	}

}

function dynamics($id,$msg=NULL)
{
	$this->load->helper('form');
	$this->load->library('form_validation');

	if($id=='1')
		$file=FCPATH."application/views/dynamics/home.html";
	else if ($id=='2')
		$file=FCPATH."application/views/dynamics/about_us.html";
	else if ($id=='3')
		$file=FCPATH."application/views/dynamics/features.html";
	else
		redirect('my404');

	$file_obj=fopen($file, 'r');
	$file_content = fread($file_obj, filesize($file));
	fclose($file_obj);
	$data['content']=$file_content;
	$data['file'] = $file;
	$data['msg']=$msg;
	$data['view_page'] = 'dynamics';

	if(isset($_POST['submit']))
	{
		$this->form_validation->set_rules('content', 'Content', 'trim|required|max_length[1000]|min_length[10]');
		if(!$this->form_validation->run() === FALSE)
		{
			$file_obj=fopen($file, 'w');
			$file_content = $_POST['content'];
			$result=fwrite($file_obj, $file_content);
			fclose($file_obj);
			if($result)
				redirect('admin/dynamics/'.$id.'/suc');
			else
				redirect('admin/dynamics/'.$id.'/err');
		}
	}
	$this->load->view('template', $data);
}

}//class end
?>