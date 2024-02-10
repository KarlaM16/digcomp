<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------
  public function add($data){
    return $this->db->insert('usuarios', $data);
    
  }

  //este password va a venir en texto plano juan35
  public function login($email,$password ){
    $this->db->where('email', $email);
    $finduser=$this->db->get('usuarios')->row();
    
    if($finduser!=null){
      if(password_verify($password,$finduser->password)){
        return $finduser;
      }
    }
    else{
      return false;
    }
    
  }

  // ------------------------------------------------------------------------
  public function getall()
  {
   return $this->db->get('usuarios')->result();
    
  }

  public function getone($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('usuarios')->row();
  
  }

  // ------------------------------------------------------------------------

  public function update($id,$data)
  {
    $this->db->where('id', $id);
    return $this->db->update('usuarios',$data);
  }

  // ------------------------------------------------------------------------

  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('usuarios');
    
  }

  // ------------------------------------------------------------------------



}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */