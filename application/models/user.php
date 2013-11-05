<?php
Class User extends CI_Model
{
 function login($username)
 {
   $this->db->select('users.id,users.id_encrypt,users.email,user_detail.first_name,user_detail.last_name,user_detail.role,user_detail.limit,user_detail.flag');
   $this->db->from('users');
   $this->db->where('users.email', $username);
   $this->db->where('users.active', 1);
   $this->db->join('user_detail','users.id=user_detail.user_id');

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

 function add_user($data)
 {
	// $code=sha1(mt_rand(10000,99999).time().$this->input->post('email_address'));
	$this->db->set('email',$data['email']);
	$this->db->set('password',$data['password']);
	$this->db->set('active',$data['active']);
	
  if($this->db->insert('users'))
  {
  	$user_id = $this->db->insert_id();
  	$this->db->set('first_name',$data['firstname']);
  	$this->db->set('last_name',$data['lastname']);
  	$this->db->set('role',$data['role']);
  	$this->db->set('secondary_email',$data['email']);
  	$this->db->set('flag','1');
    $this->db->set('user_id',$user_id);
  	$this->db->insert('user_detail');
  	
  	return $user_id;
  }
  else
    return false;
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
	$this->db->select('users.id_encrypt,user_detail.first_name,user_detail.last_name');
	$this->db->from('users');
	$this->db->join('user_detail', 'user_detail.user_id = users.id');
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
 function activate_user($id,$code)
 {
	$this->db->select('id');
	$this->db->from('users');
	$this->db->where('active', $code);
	$this->db->where('id_encrypt', $id);
	$query = $this->db->get();

   if($query -> num_rows() == 1)
   {
	   $data = array('active' => 1);
     $this->db->where('id_encrypt', $id);
	   $this ->db ->update('users',$data);
     return true;
   }
   else
   {
	   return false;
   }
 }

 //Check referred is already registered
 function check_registered($emails)
 {
   //$this->db->select('email');
   //$this->db->where_in('email',$emails);
   $query=$this->db->select('email')->where_in('email',$emails)->from('users')->get()->result();
   return $query;

 }

 //Check email id is already referred
 function check_friend($email)
 {
  $this->db->select('referrer');
  $this->db->where('email',$email);
  $this->db->from('referred_emails');
  $query = $this->db->get();

  if($query -> num_rows() == 1)
    return $query->result_array();
  else
    return false;
 }

 //Add email id with referrer
 function add_friend($email,$referrer)
 {
  $data = array('email' => $email,'referrer' => $referrer);
  $this->db->insert('referred_emails',$data);
 }

 //Add new referrer for exist email
 function update_friend($email,$referrer,$exist_referrer)
 {
    $referrers=$exist_referrer.','.$referrer;
    $data = array('referrer' => $referrers);
    $this->db->where('email',$email);
    $this->db->update('referred_emails',$data);
 }

  //Get any general details about a user 
  function get_userdetail($select,$where)
  {
    $this->db->select($select);
    $this->db->from('users');
    $this->db->join('user_detail', 'users.id = user_detail.user_id');
    $this->db->where($where);
    $query = $this->db->get();
    return $query->result_array();
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
  function get_id($id_encrypt){
    $this->db-> select('id');
    $this->db->where('id_encrypt',$id_encrypt);
    $query = $this->db->get('users');
    if($query->num_rows() == 1)
    {
      $result=$query->result_array();
      return $result[0]['id'];
    }
    else{
      return FALSE;
    }
  }
}
?>