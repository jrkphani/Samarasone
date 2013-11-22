<?php
Class User extends CI_Model
{
 function login($username)
 {
   $this->db->select('id,email');
   $this->db->from('users');
   $this->db->where('email', $username);
   $this->db->where('active', 1);

   $query = $this->db->get();
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function update_user($where,$data)
 {
	// $code=sha1(mt_rand(10000,99999).time().$this->input->post('email_address'));
	$this->db->where($where);
  if($this->db->update('users',$data))
  {
		return true;
  }
  else
  {
	  return false;
  }
 }
 function check_user($data)
 {
    //$email=$this->input->post('email_address');
	$this->db->select('id');
	$this->db->from('users');
	$this->db->where($data);
	$query = $this->db->get();

   if($query -> num_rows() == 1)
   {
	  return $query->result_array();
   }
   else
   {
	   return false;
   }
 }
  function get_user($data)
 {
	 //this method should get the parameter table.coloum in where condtion eg: $data=array('users.id'=>1);
    //$email=$this->input->post('email_address');
	//$this->db->select('user_detail.first_name,user_detail.last_name');
	$this->db->from('users');
	//$this->db->join('user_detail', 'user_detail.user_id = users.id');
	$this->db->where($data);
	$query = $this->db->get();

   if($query -> num_rows() == 1)
   {
	  return $query->result_array();
   }
   else
   {
	   return false;
   }
 }
 function get_password($where)
  {
    $this->db->select('password');
    $this->db->where($where);
    $query = $this->db->get('users');
    if($query->num_rows() == 1)
    {
      $result=$query->result_array();
      return $result[0]['password'];
    }
    else
      return FALSE;
      
  }
}
?>