<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
function __construct()
{
	parent::__construct();
	$this->current_user=$this->session->userdata('logged_in');
	if(!$this->current_user)
		redirect('login', 'refresh');
}

function index()
{
	$this->userList();
}

function add()
{
	$this->load->helper('form');
	$this->load->library('form_validation');	
	$this->load->model('basic_model');
	$data['msg']=NULL;
	$data['success']=NULL;
	$data['view_page'] = 'admin_add';
	
	if(isset($_POST['submit']))
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[100]');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('template', $data);
		}
		else
		{
			$this->load->library('passhash');
			$email=$this->input->post('email');
			$password=$this->input->post('password');

			$values=array(
				'email' => $email,
				'password' => $this->passhash->hash($password),
				'active' => '1'
			);
			$result=$this->basic_model->insert($values,'users');
			if($result)
			{
				$data['msg']='New admin added successfully.';
				$data['success']='yes';
			}
			else
			{
				$data['msg']='Internal error. Please try again later.';
				$data['success']='no';
			}
		}
	}
	$this->load->view('template', $data);

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
		$file=FCPATH."application/views/dynamics/residential.html";
	else if ($id=='3')
		$file=FCPATH."application/views/dynamics/commercial.html";
	else if ($id=='4')
		$file=FCPATH."application/views/dynamics/business.html";
	else if ($id=='5')
		$file=FCPATH."application/views/dynamics/residential_proposition.html";
	else if ($id=='6')
		$file=FCPATH."application/views/dynamics/commercial_proposition.html";
	else if ($id=='7')
		$file=FCPATH."application/views/dynamics/business_proposition.html";
	else if ($id=='8')
		$file=FCPATH."application/views/dynamics/residential_ourteam.html";
	else if ($id=='9')
		$file=FCPATH."application/views/dynamics/commercial_ourteam.html";
	else if ($id=='10')
		$file=FCPATH."application/views/dynamics/business_ourteam.html";
	else if ($id=='11')
		$file=FCPATH."application/views/dynamics/residential_contact.html";
	else if ($id=='12')
		$file=FCPATH."application/views/dynamics/commercial_contact.html";
	else if ($id=='13')
		$file=FCPATH."application/views/dynamics/business_contact.html";
	else
		redirect('my404');

	$file_obj=fopen($file, 'r');
	$file_content = fread($file_obj, filesize($file));
	fclose($file_obj);
	$data['content']=$file_content;
	$data['file'] = $file;
	$data['msg']=$msg;

	$file_name = basename($file, ".html");
	$data['title']=ucwords(str_replace('_', ' ', $file_name));
	$data['view_page'] = 'dynamics';

	if(isset($_POST['submit']))
	{
		$this->form_validation->set_rules('content', 'Content', 'trim|required|min_length[10]');
		if(!$this->form_validation->run() === FALSE)
		{
			$file_obj=fopen($file, 'w+');
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