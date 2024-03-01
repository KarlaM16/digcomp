<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect(site_url('home/login'));
        }
        
        $this->load->model(array('Empleado_model','Competencia_model'));
    }

    public function index()
    {

        $employees = $this->Empleado_model->countusuarios();
        $competencias=$this->Competencia_model->getall();
        $niveles=array();
        foreach($competencias as $c){
            $nivel=(object)array('nivel'=>0,'competencia'=>0,'ponderado'=>0);
            $resultado=$this->getresult_competencia($c->id);
            $nivel->competencia=$c->id;
            $nivel->nivel=$resultado->promedio_total;
            $nivel->ponderado=$resultado->ponderado;
            array_push($niveles,$nivel);
        }
        
        
        $formacion = $this->formacion();
        
       
        // $porcentaje_competencias=$this->porcentaje_comp($competencia_1,$competencia_2,$competencia_3,$competencia_4);
        
        

        $data = array(
            'competencias'=>$competencias,
            'employees' => $employees,
            'female' => $this->Empleado_model->countfemale(),
            'male' => $this->Empleado_model->countmale(),
            'edades' => $this->getedad(),
            'formacion' => $formacion,
            'interesados' => $this->Empleado_model->countinteresados(),
            // 'competencias'=>$porcentaje_competencias,
            'niveles'=>$niveles,
        );
        $this->load->view('layouts/header');
        $this->load->view('dashboard/index', $data);
        $this->load->view('layouts/footer');
    }

    

    public function formacion()
    {
        $formaciones = $this->Empleado_model->formacion();

        $formacion = array();
        $listaform = array();

        foreach ($formaciones as $f) {
            if ($formacion == null) {
                array_push($formacion, $f);
            } else {
                if (!in_array($f, $formacion)) {
                    array_push($formacion, $f);
                }
            }
        }


        foreach ($formacion as $f) {
            $data = (object)array(
                'formacion' => $f->formacion,
                'cantidad' => 0,
            );

            $count = $this->Empleado_model->getcountformacion($f->formacion);
            $data->cantidad = $count;
            array_push($listaform, $data);
        }

        return $listaform;
    }

    public function getedad()
    {
        $getedad = $this->Empleado_model->edades();
        $edades = array();

        foreach ($getedad as $e) {
            if ($edades == null) {
                array_push($edades, $e);
            } else {
                if (!in_array($e, $edades)) {
                    array_push($edades, $e);
                }
            }
        }
        $listedad = array();

        foreach ($edades as $ed) {
            $array = (object)array(
                'edad' => $ed->edad,
                'cantidad' => 0,
            );
            $cantidad = $this->Empleado_model->getcantidadedad($ed->edad);

            $array->cantidad = $cantidad;
            array_push($listedad, $array);
        }

        return $listedad;
    }

   

    


    function porcentaje_comp($comp_1,$comp_2,$comp_3,$comp_4){
        $competencias=(object)array('competencia_1'=>0, 'competencia_2'=>0, 
        'competencia_3'=>0,'competencia_4'=>0);
        foreach ($comp_1 as $c1) {
            $competencias->competencia_1+=$c1->total_ponderado;
        }
        foreach ($comp_2 as $c2) {
            $competencias->competencia_2+=$c2->total_ponderado;
        }
        foreach ($comp_3 as $c3) {
            $competencias->competencia_3+=$c3->total_ponderado;
        }
        foreach ($comp_4 as $c4) {
            $competencias->competencia_4+=$c4->total_ponderado;
        }

        return $competencias;

    }

    

    function getpreguntas($competencia_id){
        $preguntas=array();
        switch ($competencia_id) {
            case 1:
                $question='id,pregunta_11,pregunta_12,pregunta_13,pregunta_14,pregunta_15,validacion_11,validacion_12';
                $preguntas = $this->Empleado_model->getquestion($question);
                break;
            case 2:
                $question='id,pregunta_21,pregunta_22,pregunta_23,pregunta_24,pregunta_25,validacion_21,validacion_22';
                $preguntas = $this->Empleado_model->getquestion($question);
                break;
            case 3:
                $question='id,pregunta_31,pregunta_32,pregunta_33,pregunta_34,pregunta_35,validacion_31,validacion_32';
                $preguntas = $this->Empleado_model->getquestion($question);
                break;
            case 4:
                $question='id,pregunta_41,pregunta_42,pregunta_43,pregunta_44,pregunta_45,validacion_41,validacion_42';
                $preguntas = $this->Empleado_model->getquestion($question);
                break;
            
          
        }

        return $preguntas;
    }

    
    public function getresult_empleado($competencia_id){
        $usuarios=$this->Empleado_model->getall();
        $resultados=array();
        foreach($usuarios as $u){
            $respuestas=$this->Competencia_model->getrespuestas($u->id,$competencia_id);
            
            $objetivo=(object)array(
                'usuario_id'=>$u->id,
                'preguntas'=>0,
                'validacion'=>0,
                'competencia_id'=>$competencia_id,
                'total_preguntas'=>0,
                'total_validacion'=>0,
                'ponderado'=>0);

            foreach ($respuestas as $r) {
               $codigo= str_split($r->codigo);
               if($codigo[0]=='P'){
                $objetivo->preguntas+=$r->valor;
               }
               else{
                $objetivo->validacion+=$r->valor;
               }
            }
            array_push($resultados,$objetivo);

        }
        
        
       return $resultados;
    }

    public function  getresult_competencia($competencia_id){
        $resultados=$this->getresult_empleado($competencia_id);
        foreach ($resultados as $r) {
            $r->total_preguntas=$r->preguntas/5;
            $r->total_validacion=$r->validacion/2;
        }

        $competencia=(object)array('promedio_preguntas'=>0,'promedio_validacion'=>0,'promedio_total'=>0,'ponderado'=>0);
        foreach($resultados as $r){
            $competencia->promedio_preguntas+=($r->total_preguntas/100);
            $competencia->promedio_validacion+=($r->total_validacion/100);
        }
        $competencia->promedio_total=($competencia->promedio_preguntas+$competencia->promedio_validacion)/2;
        
        foreach($resultados as $r){
            	$r->ponderado=($r->total_preguntas*12.5)+($r->total_validacion*12.5);
        }

        foreach($resultados as $r){
            $competencia->ponderado+=$r->ponderado/100;
        }

 
        return $competencia;
    }

}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */
