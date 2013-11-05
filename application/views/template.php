<?php
$this->load->view('header');
if(isset($data)){
	$this->load->view($view_page, $data);	
}
else{
	$this->load->view($view_page);
}
$this->load->view('footer');
?>
