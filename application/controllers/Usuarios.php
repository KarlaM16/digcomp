<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('login')) {
      redirect(site_url('home/login'));
    }
    $this->load->model('User_model');
  }

//cargamos las funciones del index que deben salir por defecto
  public function index()
  {
    $data = array('usuarios'=>$this->User_model->getadmin());
    
    $this->load->view('layouts/header');
    $this->load->view('usuarios/index.php', $data);
    $this->load->view('layouts/footer');
  }
  
  public function empleados(){
    $data = array('usuarios'=>$this->User_model->getempleados());

    $this->load->view('layouts/header');
    $this->load->view('usuarios/empleados.php', $data);
    $this->load->view('layouts/footer');
  }

  public function create()
  {
    $password = $this->input->post('password');
    $pbcrypt = password_hash($password, PASSWORD_BCRYPT);//encriptar la contraseña
    $data = array(
      'nombre' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'rol' => $this->input->post('rol'),
      'password' => $pbcrypt,
    );

    if ($this->User_model->add($data)) {
      $this->session->set_flashdata('success', 'Su usuario se creo con exito.');
      
      redirect(site_url('usuarios/index'));
    } else {
      $this->session->set_flashdata('error', 'Su usuario no se ha podido crear, revise los campos vacios o si ya existe el usuario.');
      redirect(site_url('usuarios/index'));
    }
  }

  public function getonejson()
  {
    $id=$this->input->post('id');
    
    $user=$this->User_model->getone($id);

    echo json_encode($user);

  }

  public function update()
  {
    $id=$this->input->post('id');

    $data = array(
      'nombre'=>$this->input->post('name'),
      'email'=>$this->input->post('email'),
      'rol'=>$this->input->post('rol'),
    );

    if($this->User_model->update($id,$data)){
      $this->session->set_flashdata('success', 'Su usuario se actualizó con exito.');
      redirect(site_url('usuarios/index'));
    }
    else{
      $this->session->set_flashdata('error', 'Su usuario no se ha actualizado.');
      redirect(site_url('usuarios/index'));
    }
    
  }


  public function changepassword(){
    $id=$this->input->post('id');
    $password=$this->input->post('password');
    $encrypt=password_hash($password,PASSWORD_BCRYPT);//encriptar contraseña

    $data=array(
      'password'=>$encrypt,
    );
    
    if($this->User_model->update($id,$data)){
      $this->session->set_flashdata('success', 'Su contraseña se actualizó con exito.');
      redirect(site_url('usuarios/index'));
    }
    else{
      $this->session->set_flashdata('error', 'Su contraseña no se pudo actualizar.');
      redirect(site_url('usuarios/index'));
    }
    
  }

  public function delete()
  {
    $id=$this->input->post('id');

    if($this->User_model->delete($id)){
      $this->session->set_flashdata('success', 'Su usuario se eliminado con exito.');
      redirect(site_url('usuarios/index'));
    }
    else{
      $this->session->set_flashdata('error', 'No se ha podido eliminar este usuario.');
      redirect(site_url('usuarios/index'));
    }
    
  }
}


/* End of file Usuarios.php */
/* Location: ./application/controllers/Usuarios.php */