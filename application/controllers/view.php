<?php
class View extends CI_Controller
{
	function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$page[] = $this->uri->segment(3);
		$page[] = $this->uri->segment(4);
		$page[] = $this->uri->segment(5);
		$page[] = $this->uri->segment(6);
		if(count(array_filter($page)) <= 3)
		{
			redirect('my404');
		}
		else
		{
			$data['appointSuccess'] = '';
			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{
				//send mail
				$this->form_validation->set_rules('name', 'Name', 'trim|alpha|required|min_length[2]|max_length[20]|xss_clean');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('number', 'Phone', 'callback_number_validation');
				$this->form_validation->set_rules('message', 'Message', 'trim|max_length[200]');

				if ($this->form_validation->run() == FALSE)
				{
					$data['appointSuccess'] = 'no';
				}
				else
				{
					$contact_name = $this->input->post('name');
					$contact_email = $this->input->post('email');
					$contact_number = $this->input->post('number');
					$contact_message = nl2br($this->input->post('message'));
					$record['name'] = $contact_name;
					$record['email'] = $contact_email;
					$record['number'] = $contact_number;
					$record['message'] = $contact_message;
					$record['pid'] = $page[3];
					$record['alias'] = $page[0].'/'.$page[1].'/'.$page[2];

					$this->load->model('lead_model');
					$this->lead_model->add($record);


					$data['appointSuccess'] = 'yes';
					$this->load->library('email');
					 #$config['protocol'] = 'sendmail';
					 #$config['mailpath'] = '/usr/sbin/sendmail';
					 $config['charset'] = 'iso-8859-1';
					 $config['wordwrap'] = TRUE;
					 $config['mailtype']='html';
					 $this->email->initialize($config);
					 $this->email->from('no-reply@samarasone.com.au', 'Samaras One');
					 $this->email->to('nicholas@samarasone.com.au');
					 //$this->email->to('manikandan@digitalchakra.in');
					 $this->email->cc('manikandan@digitalchakra.in');
					// #$this->email->bcc('them@their-example.com');
					 $this->email->subject('Samaras One Appointment Request');
					$message= 'Hi <br><br> 
								This e-mail is regarding this 
								<a href="'.base_url('view/index/'.$page[0].'/'.$page[1].'/'.$page[2].'/'.$page[3]).'">
								proprty</a><br/><br/>
								Name : '.$contact_name.'<br/>
								Email : '.$contact_email.'<br/>
								Number : '.$contact_number.'<br/>
								Message : <br/>'.$contact_message.'<br/>
					 			<b>Regards,</b>';
					 $this->email->message($message);
					 $this->email->send();
				}
				 
			}
			$tables['residential']['sale']['Residential'] = 'residential';
			$tables['residential']['sale']['Land'] = 'land';
			$tables['residential']['sale']['Rural'] = 'rural';
			$tables['residential']['lease']['Rental'] = 'rental';
			$tables['residential']['lease']['Holiday'] = 'holidayRental';
			$tables['commercial']['sale']['Commercial'] = $tables['commercial']['lease']['Commercial'] = 'commercial';
			$tables['commercial']['sale']['CommercialLand'] = $tables['commercial']['lease']['CommercialLand'] = 'commercialLand';
			$tables['business']['sale']['Business'] = $tables['business']['lease']['Business'] = 'business';
			$this->load->model('view_model');
			$data['result']= $this->view_model->getRow($tables[$page[0]][$page[1]][$page[2]],$page[3]);
			$data['page']=$page[0];
			//echo "<pre>"; print_r($data); die;
			if($data['result'])
			{
				$data['view_page']='view';
				$this->load->view('template', $data);
			}
			else
			{
				redirect('my404');
			}
		}
	}
	function number_validation($str)
	{
		if(strlen($str) > 0)
		{
			$expr = "/^([1]-)?[0-9]{3}-[0-9]{3}-[0-9]{4}$/i";
			if(!preg_match($expr, $str))
			{
				$this->form_validation->set_message('number_validation', 'The phone should be valid ( 111-222-3332 )');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		return TRUE;
	}
}
?>