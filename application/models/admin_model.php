<?php
Class Admin_model extends CI_Model{
  
//List users
function userList()
{
  if(!isset($from))
    $this->db->limit(2);
  else
    $this->db->limit(2,$from);

  $this -> db -> select('id,email,active');
  $this -> db -> from('users');
  return $this -> db -> get()->result();
}

//Total records in usesr list
function totalUserRecords()
{
  $this->db->from('users');
  return $this->db->count_all_results();
}

function pendingUsers()
{
  $this-> db ->select('users.id,users.email,user_detail.first_name,user_detail.last_name');
  $where=array('users.active !='=>'1','user_detail.role'=>'member');
  $this -> db -> where ($where);
  $this -> db -> from('users');
  $this ->  db -> join('user_detail','user_detail.user_id=users.id');
  return $this -> db -> get()->result();
}

function activateUser($id)
{
  $this->db->set('active','1');
  $this->db->where('id',$id);
  return $this->db->update('users');
}

function blockUser($id)
{
  $this->db->set('active','-1');
  $this->db->where('id',$id);
  return $this->db->update('users');
}

function userDetails($id)
{
  $this->db->select('users.id,users.email,user_detail.role');
  $this->db->where('users.id',$id);
  $this->db->from('users');
  $this->db->join('user_detail','users.id=user_detail.user_id');
  $query=$this->db->get();
  return $query->result_array();
}

function userUpdate($id,$email,$role)
{
  $this->db->where('id',$id);
  $this->db->update('users',array('email'=>$email));

  $this->db->where('user_id',$id);
  $this->db->update('user_detail',array('role'=>$role));
}

}
?>