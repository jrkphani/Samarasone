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
		$data['type'] = $this->input->post('type');
		$data['property'] = $this->input->post('property');
		$data['category'] = $this->input->post('category');
		$data['price_min'] = $this->input->post('price_min');
		$data['price_max'] = $this->input->post('price_max');
		$data['bedroom'] = $this->input->post('bedroom');
		$data['bathroom'] = $this->input->post('bathroom');
		$data['carport'] = $this->input->post('carport');
		$data['garage'] = $this->input->post('garage');
		$data['area_min'] = $this->input->post('area_min');
		$data['area_max'] = $this->input->post('area_max');



		//$data['property'] = '';
		
		$this->load->library('elements');
		
		$this->load->model('searchnew_model');
		
		$data['view_page']='searchnew';
		//$results['page']=$page;
		//$results['type']=$data['type'];
		//$data['page']='Residential';
		//$data['type']='buy';
		if($page === 'Residential')
		{
			if($data['type'] === 'buy')
			{
				$data['select']=array('headline','price','suburb','description');

				if($data['price_min']>0)
					$where['price >'] = $data['price_min'];
				if($data['price_max']>0)
					$where['price <'] = $data['price_max'];
				if($data['area_min']>0)
					$where['area >'] = $data['area_min'];
				if($data['area_max']>0)
					$where['area <'] = $data['area_max'];

				if($data['property'] === 'Residential')
				{
					$data['table'] = 'residential';
					if($data['bedroom'])
						$where['bedrooms'] = $data['bedroom'];
					if($data['bathroom'])
						$where['bathrooms'] = $data['bathroom'];
					if($data['carport'])
						$where['carports'] = $data['carport'];
					if($data['garage'])
						$where['garages'] = $data['garage'];
					if($data['category'])
						$data['category'] = $data['category'];
					if(isset($where))
						$data['where'] = $where;
				}
				elseif($data['property'] === 'Land')
				{
					$data['table'] = 'land';
					if(isset($where))
						$data['where'] = $where;
				}
				elseif($data['property'] === 'Rural')
				{
					$data['table'] = 'rural';
					if($data['bedroom'])
						$where['bedrooms'] = $data['bedroom'];
					if($data['bathroom'])
						$where['bathrooms'] = $data['bathroom'];
					if($data['carport'])
						$where['carports'] = $data['carport'];
					if($data['garage'])
						$where['garages'] = $data['garage'];
					if($data['category'])
						$data['ruralCategory'] = $data['category'];
					if(isset($where))
						$data['where'] = $where;
					unset($data['category']);
				}
				$data['limit']=$pagi_page;
				$result = $this->searchnew_model->getresults($data);
				$data['result'] = $result['obj'];
				$this->pagination($result['total']);
			}
			else if($data['type'] === 'rent')
			{
				$data['select']=array('headline','rent as price','suburb','description');

				if($data['bedroom'])
					$where['bedrooms'] = $data['bedroom'];
				if($data['bathroom'])
					$where['bathrooms'] = $data['bathroom'];
				if($data['carport'])
					$where['carports'] = $data['carport'];
				if($data['garage'])
					$where['garages'] = $data['garage'];
				if($data['price_min']>0)
					$where['rental >'] = $data['price_min'];
				if($data['price_max']>0)
					$where['rental <'] = $data['price_max'];
				if($data['area_min']>0)
					$where['area >'] = $data['area_min'];
				if($data['area_max']>0)
					$where['area <'] = $data['area_max'];
				if(isset($where))
						$data['where'] = $where;

				if($data['property'] === 'Rental')
				{
					$data['table'] = 'rental';
					if($data['category'])
						$data['category'] = $data['category'];
				}
				else if($data['property'] === 'Holiday')
				{
					$data['table'] = 'holidayRental';
					if($data['category'])
						$data['holidayCategory'] = $data['category'];
					unset($data['category']);
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