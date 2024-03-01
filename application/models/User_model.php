<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // Agregar
  public function add($data){
    return $this->db->insert('usuarios', $data);//retorna  lo que agrego en el arreglo data de usuarios
    
  }

  //este password va a venir en texto plano 

  public function login($email,$password ){//funcion login viene con email y password.
    $this->db->where('email', $email);//base de datos donde 
    $finduser=$this->db->get('usuarios')->row();//buscar usuario en la base de datos obtiene usuarios y presenta en una fila
    
    if($finduser!=null){//si no encuentra el usuario
      if(password_verify($password,$finduser->password)){//verifica contraseña que el usuario buscando apunte bien a la contraseña
        return $finduser;
      }
    }
    else{
      return false;
    }
    
  }

  // obtener todos los usuarios
  public function getall()
  {
   return $this->db->get('usuarios')->result();//retorna los usuarios de la base de datos
    
  }

  public function getone($id)//retorna por un tipo de id, un usuario especifico
  {
    $this->db->where('id', $id);
    return $this->db->get('usuarios')->row();
  
  }

  // Actualiza la base de datos considerando un id

  public function update($id,$data)
  {
    $this->db->where('id', $id);
    return $this->db->update('usuarios',$data);
  }

  // Elimina considerando un id

  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('usuarios');
    
  }
}
