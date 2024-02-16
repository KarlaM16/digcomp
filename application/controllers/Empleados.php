<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect(site_url('home/login'));
        }
        $this->load->model('Empleado_model');
        
    }

    public function index()
    {
        $data=array('empleados'=>$this->Empleado_model->getall());
        $this->load->view('layouts/header');
        $this->load->view('empleados/index',$data);
        $this->load->view('layouts/footer');
        
    }

    public function details($id){
        $data=array(
            'empleado'=>$this->Empleado_model->getone($id),
        );
        $this->load->view('layouts/header');
        $this->load->view('empleados/details',$data);
        $this->load->view('layouts/footer');
        
    }

    public function competencia($id){
        $data=array(
            'empleado'=>$this->Empleado_model->getone($id),
        );
        $this->load->view('layouts/header');
        $this->load->view('empleados/competencia',$data);
        $this->load->view('layouts/footer');
        
    }

    public function preguntas($id){
        $data=array(
            'empleado'=>$this->Empleado_model->getone($id),
        );
        $this->load->view('layouts/header');
        $this->load->view('empleados/preguntas',$data);
        $this->load->view('layouts/footer');
        
    }
}

/* End of file Empleados.php and path \application\controllers\Empleados.php */
