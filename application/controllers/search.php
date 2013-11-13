<?php
class Search extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->model('search_model');
		$data['result']=$this->search_model->getSuburbs();

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

			$this->load->library('pagination');
			$config['base_url'] = base_url('search/index');
			$config['total_rows'] = $result2['total'];
			$config['per_page'] = 2;
			$this->pagination->initialize($config);

		}

		$data['view_page']='search';
		$this->load->view('template', $data);
	}

	function result()
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
	}
}
?>