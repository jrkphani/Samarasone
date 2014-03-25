<?php
class Lead_model extends CI_Model
{
	function add($data)
	{
		$this->db->insert('lead', $data); 
	}
}
?>