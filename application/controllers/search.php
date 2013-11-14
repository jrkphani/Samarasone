<?php
class Search extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		redirect(base_url('search/residential'));
	}

	function residential()
	{
		$this->load->model('search_model');
		$data['result']=$this->search_model->getSuburbs();

		$data['page']='residential';
		$data['sale_type']=NULL;
		$data['suburb']=NULL;
		$data['type']=NULL;
		$data['price_from']=NULL;
		$data['price_to']=NULL;
		$data['bedroom']=NULL;
		$data['garage']=NULL;
		$data['result2']=NULL;

		if(isset($_POST['page']))
		{
			$data['sale_type']=$this->input->post('sale_type');
			$data['suburb']=$this->input->post('suburb');
			$data['type']=$this->input->post('type');
			$data['price_from']=$this->input->post('price_from');
			$data['price_to']=$this->input->post('price_to');
			$data['bedroom']=$this->input->post('bedroom');
			$data['garage']=$this->input->post('garage');
			$limit=$this->input->post('page');

			$result2=$this->search_model->search($limit,$data['sale_type'],$data['suburb'],$data['type'],$data['price_from'],$data['price_to'],$data['bedroom'],$data['garage']);
			$data['result2']=$result2['result'];

			
			$this->pagination($data['page'],$result2['total']);

		}

		$data['view_page']='search';
		$this->load->view('template', $data);
	}


	function commercial()
	{		
	  $this->load->model('basic_model');
	$fields=array('suburb');
	$data['result']=$this->basic_model->select($fields,'residential');

	$data['page']='commercial';
	$data['sale_type']=NULL;
	$data['suburb']=NULL;
	$data['type']=NULL;
	$data['price_from']=NULL;
	$data['price_to']=NULL;
	$data['bedroom']=NULL;
	$data['garage']=NULL;
	$data['view_page'] = 'search';
	$this->load->view('template', $data);
	}

	function business()
	{
		$data['view_page'] = 'businesssearch';
		$this->load->view('template', $data);
	}

	/*function result()
	{ 
		$this->load->model('basic_model');
		$this->load->model('search_model');
		$fields=array('suburb');
		$data['result']=$this->basic_model->select($fields,'residential');

		$data['sale_type']=$this->input->post('sale_type');
		$data['suburb']=$this->input->post('suburb');
		$data['type']=$this->input->post('type');
		$data['price_from']=$this->input->post('price_from');
		$data['price_to']=$this->input->post('price_to');
		$data['bedroom']=$this->input->post('bedroom');
		$data['garage']=$this->input->post('garage');

		$data['result2']=$this->search_model->search($data['sale_type'],$data['suburb'],$data['type'],$data['price_from'],$data['price_to'],$data['bedroom'],$data['garage']);

		$data['view_page']='search';
		$this->load->view('template', $data);
	}*/

	function pagination($type,$total)
	{
		$this->load->library('pagination');
		$config['per_page'] = 3;
		$config['base_url'] = base_url('search/'.$type);
		$config['total_rows'] = $total;
			
		//Design
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="next_img next">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li class="previous_img previous">';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li class="center">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next_img next">';
		$config['next_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="next_img next">';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
	}
}
?>