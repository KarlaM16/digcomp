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
  public function getonejson()
  {
    $id = $this->input->post('id');

    $user=$this->User_model->getone($id);
   
    echo json_encode($user);
  }

  public function index()
  {
    $usuarios = $this->User_model->getall();
    $data = array('usuarios' => $usuarios);
    $this->load->view('layouts/header');
    $this->load->view('usuarios/index.php', $data);
    $this->load->view('layouts/footer');
  }

  public function create()
  {
    $password = $this->input->post('password');
    $pbcrypt = password_hash($password, PASSWORD_BCRYPT); //encriptar la contraseña
    $data = array(
      'nombre' => $this->input->post('nombre'),
      'email' => $this->input->post('email'),
      'rol' => $this->input->post('rol'),
      'password' => $pbcrypt, //pasa la variable
    );
    if ($this->User_model->add($data)) { //si agrego usuario redirecciona a usuarios/index
      redirect(site_url('usuarios/index'));
    } else {
      redirect(site_url('usuarios/index'));
    }
  }


  public function update()
  {
    $id=$this->input->post('id');
    $data = array(
      'nombre' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'rol' => $this->input->post('rol'),
    );

    if($this->User_model->update($id,$data)){
      redirect(site_url('usuarios/index'));
    }
  }

  public function obtenerusuario()
  {
    echo 'obtener usuario';
  }

  public function eliminar()
  {
    echo 'eliminar usuario';
  }
}
