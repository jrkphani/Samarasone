<?php
class Search_model extends CI_Model
{
	function getSuburbs()
	{
		$query1="select DISTINCT suburb from residential where suburb!='' ";
		$query2="select DISTINCT suburb from rental where suburb!='' ";
		$query3="select DISTINCT suburb from holidayRental where suburb!='' ";
		$query4="select DISTINCT suburb from rural where suburb!='' ";
		$query5="select DISTINCT suburb from land where suburb!='' ";
		$query6="select DISTINCT suburb from commercial where suburb!='' ";
		$query7="select DISTINCT suburb from commercialLand where suburb!='' ";
		$query8="select DISTINCT suburb from business where suburb!='' ";
		$query=$query1.' UNION '.$query2.' UNION '.$query3.' UNION '.$query4.' UNION '.$query5.' UNION '.$query6.' UNION '.$query7.' UNION '.$query8;
		$result=mysql_query($query);

		return $result;
	}

	function search($limit,$sale_type,$suburb,$type,$price_from,$price_to,$bedroom,$garage)
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

		$this->db->select('SQL_CALC_FOUND_ROWS null as rows,headline,suburb,price,description',FALSE);
		$this->db->where($where);
		$this->db->from('residential');
		$this->db->limit(2,$limit);

		//$result2=mysql_query("select FOUND_ROWS()");
		//$row2=mysql_fetch_array($result2);
		//return $this -> db -> get()->result();

		$arr['result']=$this -> db -> get()->result();
		//$this->db->last_query();
		$arr['total']=$this->db->query('SELECT FOUND_ROWS() count;')->row()->count;

		return $arr;

	}
}
?>