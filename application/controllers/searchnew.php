<?php
class Searchnew extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$page = $this->input->post('page');
		$type = $this->input->post('type');
		$category = $this->input->post('category');
		$property = $this->input->post('property');
		$property = '';
		
		$this->load->library('elements');
		
		$this->load->model('searchnew_model');
		
		$data['view_page']='searchnew';
		//$results['page']=$page;
		//$results['type']=$type;
		$data['page']='Residential';
		$data['type']='buy';
		if($page === 'Residential')
		{
			if($type === 'buy')
			{
				$data['buy'] = $this->elements->buy['Residential'];
				if($property === 'residential')
				{
					$data['table'] = 'residential';
					$data['category'] = $category;
					$data['results'] = $this->searchnew_model->getresults($data);
				}
				elseif($property === 'land')
				{
				}
				else
				{
					
				}
			}
			else
			{
			}
		}
		$data['buy'] = $this->elements->buy['Residential'];
		//echo "<pre>";
		//print_r($data); die;
		$this->load->view('template', $data);
	}
}
?>