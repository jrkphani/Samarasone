<?php
class Search_model extends CI_Model
{
	function search($sale_type,$suburb,$type,$price_from,$price_to,$bedroom,$garage)
	{
		$where = array();
		/*if($sale_type)
			$where['sale_type']=$sale_type;*/
		if($suburb[0])
		{
			$this->db->where_in('suburb', $suburb);
		}
		if($type[0])
		{
			$this->db->where_in('category', $type);
		}
		if($price_from)
			$where['price >']=$price_from;
		if($price_to)
			$where['price <']=$price_to;
		if($bedroom!=NULL)
			$where['bedrooms']=$bedroom;
		if($garage!=NULL)
			$where['garages']=$garage;

		$this->db->select('headline,suburb,price,description');
		$this->db->where($where);
		$this->db->from('residential');

		return $this -> db -> get()->result();
	}
}
?>