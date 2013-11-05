<?php
Class Admin_model extends CI_Model{
  
//List users
function userList($current_user,$role=NULL,$status=NULL,$from=NULL)
{
  if($from==NULL)
    $this->db->limit(2);
  else
    $this->db->limit(2,$from);

  $where['users.id !=']=$current_user;
  if($role)
    $where['user_detail.role']=$role;
  if($status=='1' || $status=='-1')
    $where['users.active']=$status;
  else if($status=='pending')
  {
    $this->db->where_not_in('users.active',array('1','-1'));
  }

  $this -> db -> select('users.id,users.email,users.active,user_detail.first_name,user_detail.last_name,user_detail.role');
  $this -> db -> where($where);
  $this -> db -> from('users');
  $this -> db -> join('user_detail','users.id=user_detail.user_id');
  return $this -> db -> get()->result();
}

//Total records in usesr list
function totalUserRecords($current_user,$role,$status)
{
  $this->db->where('users.id !=',$current_user);
  if($role!=NULL && $status!=NULL)
  {
    $this->db->where('role',$role);
    if($status=='pending')
      $this->db->where_not_in('users.active',array('-1','1'));
    else
      $this->db->where('users.active',$status);

    $this->db->from('users');
    $this -> db -> join('user_detail','users.id=user_detail.user_id');
  }
  else
  {
    if($role==NULL && $status==NULL)
    {
      $this->db->from('users');
    }
    else if($role!=NULL)
    {
      $this->db->where('user_detail.role',$role);
      $this->db->from('users');
      $this -> db -> join('user_detail','users.id=user_detail.user_id');
    }
    else if($status!=NULL)
    {
      if($status=='pending')
        $this->db->where_not_in('active',array('-1','1'));
      else
        $this->db->where('active',$status);
      $this->db->from('users');
    }
  }
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