<?php
class View extends CI_Controller
{
	function index()
	{
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
}
?>