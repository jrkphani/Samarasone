<?php
class Searchnew_model extends CI_Model
{
    function getTotal($data)
    {
        $this->db->select($data['select']);

        if(isset($data['where']))
            $this->db->where($data['where']);
        if(isset($data['category']) && $data['category'])
            $this->db->where_in('category',$data['category']);
        if(isset($data['sale_type']))
            $this->db->where_in('commercialListingType',$data['sale_type']);
        if(isset($data['businessCategory']))
        {
			$count =0;
			foreach($data['businessCategory'] as $businessCategory)
			{
				if(!$count)
				$this->db->like('businessCategory',$businessCategory);
				else
				$this->db->or_like('businessCategory',$businessCategory);
				$count++;
			}
		}
        if(isset($data['businessSubCategory']))
        {
			$count =0;
			foreach($data['businessSubCategory'] as $businessSubCategory)
			{
				if(!$count)
				$this->db->like('businessSubCategory',$businessSubCategory);
				else
				$this->db->or_like('businessSubCategory',$businessSubCategory);
				$count++;
			}
		}

        $this->db->from($data['table']);
        $query = $this->db->get();
        $total = $query->num_rows();
        return $total;
    }

	function getresults($data)
	{
        $this->db->select($data['select']);

        if(isset($data['where']))
            $this->db->where($data['where']);
        if(isset($data['category']) && $data['category'])
            $this->db->where_in('category',$data['category']);
        if(isset($data['sale_type']))
            $this->db->where_in('commercialListingType',$data['sale_type']);
        if(isset($data['businessCategory']))
        {
			$count =0;
			foreach($data['businessCategory'] as $businessCategory)
			{
				if(!$count)
				$this->db->like('businessCategory',$businessCategory);
				else
				$this->db->or_like('businessCategory',$businessCategory);
				$count++;
			}
		}
        if(isset($data['businessSubCategory']))
        {
			$count =0;
			foreach($data['businessSubCategory'] as $businessSubCategory)
			{
				if(!$count)
				$this->db->like('businessSubCategory',$businessSubCategory);
				else
				$this->db->or_like('businessSubCategory',$businessSubCategory);
				$count++;
			}
		}

        $this->db->from($data['table']);
        $this->db->limit(3,$data['limit']);
        //echo $this->db->last_query();
        return $this -> db -> get()->result();

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
        
        /*$result['total']=$total;
        $result['obj']=$obj;
        $this->db->last_query();
        return $result;*/
	}
}
?>