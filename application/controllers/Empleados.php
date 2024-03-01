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

    //para los detalles del empleado
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
            'competencias'=>$this->competenciaempleado($id),
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
    public function competenciaempleado($id){
        $competencias=array();

        $comp_1=$this->Empleado_model->getquestionone('pregunta_11,pregunta_12,pregunta_13,pregunta_14,pregunta_15',$id);
        $comp_2=$this->Empleado_model->getquestionone('pregunta_21,pregunta_22,pregunta_23,pregunta_24,pregunta_25',$id);
        $comp_3=$this->Empleado_model->getquestionone('pregunta_31,pregunta_32,pregunta_33,pregunta_34,pregunta_35',$id);
        $comp_4=$this->Empleado_model->getquestionone('pregunta_41,pregunta_42,pregunta_43,pregunta_44,pregunta_45',$id);

        $val1=$this->Empleado_model->getvalidationone('validacion_11,validacion_12',$id);
        $val2=$this->Empleado_model->getvalidationone('validacion_21,validacion_22',$id);
        $val3=$this->Empleado_model->getvalidationone('validacion_31,validacion_32',$id);
        $val4=$this->Empleado_model->getvalidationone('validacion_41,validacion_42',$id);

        $competencia=(object)array('nivel_1'=>($comp_1+$val1)/2, 'nivel_2'=>($comp_2+$val2)/2,
         'nivel_3'=>($comp_3+$val3)/2,'nivel_4'=>($comp_4+$val4)/2,);
        
         return $competencia;
    }

   
}

/* End of file Empleados.php and path \application\controllers\Empleados.php */
