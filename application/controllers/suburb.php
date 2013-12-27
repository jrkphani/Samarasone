<?php
class Suburb extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function get_subrub($region,$str)
	{
		$result = array();
		$file = FCPATH."application/views/suburb/".$region.".txt";
		if(file_exists($file))
		{
			$contents = file_get_contents($file);
			$pattern = preg_quote($str, '/');
			$pattern = "/^.*$pattern.*\$/mi";
			
			if(preg_match_all($pattern, $contents, $matches))
			{
				$result[] = $matches[0];
			}
		}
		
		$data['resultset'] = $result[0];
		$this->load->view('json', $data);
	}
}
