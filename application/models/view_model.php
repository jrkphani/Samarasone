<?php
class View_model extends CI_Model
{
	function getRow($table,$uniqueID)
	{
		$this->db->where('uniqueID',$uniqueID);
		$this->db->from($table);
		return $this->db->get()->result();
	}
}
?>