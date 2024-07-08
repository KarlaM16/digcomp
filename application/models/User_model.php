<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

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

  // ------------------------------------------------------------------------
  public function getadmin()
  {
    $this->db->where('rol', 'Administrador');
    return $this->db->get('usuarios')->result();
    
  }

  public function getempleados(){
    $this->db->where('rol', 'Empleado');
    return $this->db->get('usuarios')->result();
  }

  public function getone($id)
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
