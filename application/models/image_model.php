<?php
class Image_model extends CI_Model
{
	function getImage($table,$limit)
	{
		$this->db->select('images , headline');
		$this->db->order_by("modTime", "desc");
		$this->db->limit($limit);
		$this->db->from($table);
		return $this->db->get()->result();
	}
}
?>