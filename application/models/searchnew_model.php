<?php
class Searchnew_model extends CI_Model
{
	function getresults($data)
	{
        $this->db->where($data['where']);
		$this->db->from($data['table']);
		//$this->db->get();
		//$query = $this->db->last_query();
		/*$this->db->select("uniqueID");
        //$this->db->distinct();
        $this->db->from("commercial");
        //$this->db->where_in("id",$model_ids);
        $this->db->get(); 
        $query1 = $this->db->last_query();
         
        $this->db->select("uniqueID");
       // $this->db->distinct();
        $this->db->from("business");
        //$this->db->where_in("id",$model_ids);
        $this->db->get(); 
        $query2 =  $this->db->last_query();
        
        $this->db->select("uniqueID");
        //$this->db->distinct();
        $this->db->from("commercialLand");
        //$this->db->where_in("id",$model_ids);
        $this->db->get(); 
        $query3 =  $this->db->last_query();
        
        $query = $this->db->query($query1." UNION ".$query2." UNION ".$query3);
        */
         
        //$data = $query->result();
        $result=$this -> db -> get()->result();
        $this->db->last_query();
        return $result;
	}
}
?>