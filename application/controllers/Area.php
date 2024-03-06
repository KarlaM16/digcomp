<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Area extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    
  }

  public function index()
  {
   
    $this->load->view('layouts/header');
    $this->load->view('area/index');
    $this->load->view('layouts/footer');
  }

  public function encuesta(){
    $this->load->view('layouts/header');
    $this->load->view('area/encuesta');
    $this->load->view('layouts/footer');
  }


}