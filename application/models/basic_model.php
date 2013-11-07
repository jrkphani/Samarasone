<?php
class Basic_model extends CI_Model
{
	function select($fields,$table,$where=NULL)
	{
		$this->db->select($fields);
		if($where)
			$this->db->where($where);
		$this->db->from($table);
		return $this -> db -> get()->result();
	}
}
?>