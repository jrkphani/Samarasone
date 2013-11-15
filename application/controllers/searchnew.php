<?php
class Searchnew extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$pagi_page = $this->input->post('page');
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
				$data['select']=array('headline','price','suburb','description');

				if($price_min>0)
					$where['price >'] = $price_min;
				if($price_max>0)
					$where['price <'] = $price_max;
				if($area_min>0)
					$where['area >'] = $area_min;
				if($area_max>0)
					$where['area <'] = $area_max;

				if($property === 'Residential')
				{
					$data['table'] = 'residential';
					if($bedroom)
						$where['bedrooms'] = $bedroom;
					if($bathroom)
						$where['bathrooms'] = $bathroom;
					if($carport)
						$where['carports'] = $carport;
					if($garage)
						$where['garages'] = $garage;
					if($category)
						$data['category'] = $category;
					if(isset($where))
						$data['where'] = $where;
				}
				elseif($property === 'Land')
				{
					$data['table'] = 'land';
					if(isset($where))
						$data['where'] = $where;
				}
				elseif($property === 'Rural')
				{
					$data['table'] = 'rural';
					if($bedroom)
						$where['bedrooms'] = $bedroom;
					if($bathroom)
						$where['bathrooms'] = $bathroom;
					if($carport)
						$where['carports'] = $carport;
					if($garage)
						$where['garages'] = $garage;
					if($category)
						$data['ruralCategory'] = $category;
					if(isset($where))
						$data['where'] = $where;
				}
				$data['limit']=$pagi_page;
				$result = $this->searchnew_model->getresults($data);
				$data['result'] = $result['obj'];
				$this->pagination($result['total']);
			}
			else if($type === 'rent')
			{
				$data['select']=array('headline','rent as price','suburb','description');

				if($bedroom)
					$where['bedrooms'] = $bedroom;
				if($bathroom)
					$where['bathrooms'] = $bathroom;
				if($carport)
					$where['carports'] = $carport;
				if($garage)
					$where['garages'] = $garage;
				if($price_min>0)
					$where['rental >'] = $price_min;
				if($price_max>0)
					$where['rental <'] = $price_max;
				if($area_min>0)
					$where['area >'] = $area_min;
				if($area_max>0)
					$where['area <'] = $area_max;
				if(isset($where))
						$data['where'] = $where;

				if($property === 'Rental')
				{
					$data['table'] = 'rental';
					if($category)
						$data['category'] = $category;
				}
				else if($property === 'Holiday')
				{
					$data['table'] = 'holidayRental';
					if($category)
						$data['holidayCategory'] = $category;
				}
				$data['limit']=$page;
				$result = $this->searchnew_model->getresults($data);
				$data['result'] = $result['obj'];
				$this->pagination($data['total']);
			}
		}
		//$data['buy'] = $this->elements->buy['Residential'];
		//echo "<pre>";
		//print_r($data); die;
		$this->load->view('template', $data);
	}

	function pagination($total)
	{
		$this->load->library('pagination');
		$config['per_page'] = 3;
		$config['base_url'] = base_url('searchnew/index');
		$config['total_rows'] = $total;
			
		//Design
		/*$config['first_link'] = 'First';
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
		$config['last_tag_close'] = '</li>';*/

		$this->pagination->initialize($config);
	}
}
?>