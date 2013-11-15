<?php
class Searchnew extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		//$page = $this->input->post('page');
		$page ='Residential';
		$type = $this->input->post('type');
		$property = $this->input->post('property');
		$category = $this->input->post('category');
		$price_min = $this->input->post('price_min');
		$price_max = $this->input->post('price_max');
		$bedroom = $this->input->post('bedroom');
		$bathroom = $this->input->post('bathroom');
		$carport = $this->input->post('carport');
		$garage = $this->input->post('garage');
		$area_min = $this->input->post('area_min');
		$area_max = $this->input->post('area_max');


		//$property = '';
		
		$this->load->library('elements');
		
		$this->load->model('searchnew_model');
		
		$data['view_page']='searchnew';
		//$results['page']=$page;
		//$results['type']=$type;
		//$data['page']='Residential';
		//$data['type']='buy';
		if($page === 'Residential')
		{
			if($type === 'buy')
			{
				//$data['buy'] = $this->elements->buy['Residential'];
				if($property === 'Residential')
				{
					$data['table'] = 'residential';
					if($bedroom!='Any')
						$where['bedrooms'] = $bedroom;
					if($bathroom!='Any')
						$where['bathrooms'] = $bathroom;
					if($carport!='Any')
						$where['carports'] = $carport;
					if($garage!='Any')
						$where['garages'] = $garage;
					if($price_min>0)
						$where['price >'] = $price_min;
					if($price_max>0)
						$where['price <'] = $price_max;
					if($area_min>0)
						$where['area >'] = $area_min;
					if($area_max>0)
						$where['area <'] = $area_max;
					//if($category)
					//	$data['category'] = $category;
					$data['where'] = $where;
					$data['result'] = $this->searchnew_model->getresults($data);
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
		//$data['buy'] = $this->elements->buy['Residential'];
		//echo "<pre>";
		//print_r($data); die;
		$this->load->view('template', $data);
	}
}
?>