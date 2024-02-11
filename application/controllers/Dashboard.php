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

        $this->load->model('Empleado_model');
    }

    public function index()
    {

        $employees = $this->Empleado_model->countemployees();

        $formacion = $this->formacion();
        $competencia_1=$this->getcompetencia1();
        $competencia_2=$this->getcompetencia2();
        $competencia_3=$this->getcompetencia3();
        $competencia_4=$this->getcompetencia4();
       
        $porcentaje_competencias=$this->porcentaje_comp($competencia_1,$competencia_2,$competencia_3,$competencia_4);
        
        $niveles=(object)array(
            'nivel_1'=>$this->obtenernivel($competencia_1),
            'nivel_2'=>$this->obtenernivel($competencia_2),
            'nivel_3'=>$this->obtenernivel($competencia_3),
            'nivel_4'=>$this->obtenernivel($competencia_4),
        );

        $data = array(
            'employees' => $employees,
            'female' => $this->Empleado_model->countfemale(),
            'male' => $this->Empleado_model->countmale(),
            'edades' => $this->getedad(),
            'formacion' => $formacion,
            'interesados' => $this->Empleado_model->countinteresados(),
            'competencias'=>$porcentaje_competencias,
            'niveles'=>$niveles,
        );
        $this->load->view('layouts/header');
        $this->load->view('dashboard/index', $data);
        $this->load->view('layouts/footer');
    }

    public function obtenernivel($competencia){
        $level=0;
        $count=0;
        foreach($competencia as $c){
            $level+=$c->total_nivel;
            $count++;
        }

        
        return $level/$count;
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

    public function getcomp_1(){
        $competencia_1=$this->getcompetencia1();
        $competencia_2=$this->getcompetencia2();
        $competencia_3=$this->getcompetencia3();
        $competencia_4=$this->getcompetencia4();
       
        $porcentaje_competencias=$this->porcentaje_comp($competencia_1,$competencia_2,$competencia_3,$competencia_4);
        
        echo json_encode($porcentaje_competencias);
    }

    

    public function getcompetencia1()
    {
       $preguntas=$this->getpreguntas(1);
        
        //$campos=array_keys(get_object_vars($datos[0]));
        
        
        $promedios=array();

        foreach($preguntas as $p){
            $promedio=(object)array(
            'id'=>$p->id,'promedio'=>0,'ponderado'=>0,
            'promedio_val'=>0,'ponderado_v'=>0,
            'total_nivel'=>0,'total_ponderado'=>0
        );
            $prom=($p->pregunta_11+$p->pregunta_12+$p->pregunta_13+$p->pregunta_14+$p->pregunta_15)/5;
            $promedio->promedio=$prom;
            $pon=$prom*(12.5/100);
            $promedio->ponderado=$pon;

            $promval=($p->validacion_11+$p->validacion_12)/2;
            $promedio->promedio_val=$promval;
            $ponval=$promval*(12.5/100);
            $promedio->ponderado_v=$ponval;

            $promedio->total_nivel=($prom+$promval)/2;
            $promedio->total_ponderado=$pon+$ponval;
            array_push($promedios,$promedio);
        }
        
        // array_sum(array_column($input, 'gozhi')); 
        return $promedios;
    }

    public function getcompetencia2(){
        
        $preguntas=$this->getpreguntas(2);
        
        //$campos=array_keys(get_object_vars($datos[0]));
        
        
        $promedios=array();

        foreach($preguntas as $p){
            $promedio=(object)array(
            'id'=>$p->id,'promedio'=>0,'ponderado'=>0,
            'promedio_val'=>0,'ponderado_v'=>0,
            'total_nivel'=>0,'total_ponderado'=>0
        );
            $prom=($p->pregunta_21+$p->pregunta_22+$p->pregunta_23+$p->pregunta_24+$p->pregunta_25)/5;
            $promedio->promedio=$prom;
            $pon=$prom*(12.5/100);
            $promedio->ponderado=$pon;

            $promval=($p->validacion_21+$p->validacion_22)/2;
            $promedio->promedio_val=$promval;
            $ponval=$promval*(12.5/100);
            $promedio->ponderado_v=$ponval;

            $promedio->total_nivel=($prom+$promval)/2;
            $promedio->total_ponderado=$pon+$ponval;
            array_push($promedios,$promedio);
        }
        
    
        // array_sum(array_column($input, 'gozhi')); 
        return $promedios;

  
    }

    public function getcompetencia3(){
        
        $preguntas=$this->getpreguntas(3);
        
        //$campos=array_keys(get_object_vars($datos[0]));
        
        
        $promedios=array();

        foreach($preguntas as $p){
            $promedio=(object)array(
            'id'=>$p->id,'promedio'=>0,'ponderado'=>0,
            'promedio_val'=>0,'ponderado_v'=>0,
            'total_nivel'=>0,'total_ponderado'=>0
        );
            $prom=($p->pregunta_31+$p->pregunta_32+$p->pregunta_33+$p->pregunta_34+$p->pregunta_35)/5;
            $promedio->promedio=$prom;
            $pon=$prom*(12.5/100);
            $promedio->ponderado=$pon;

            $promval=($p->validacion_31+$p->validacion_32)/2;
            $promedio->promedio_val=$promval;
            $ponval=$promval*(12.5/100);
            $promedio->ponderado_v=$ponval;

            $promedio->total_nivel=($prom+$promval)/2;
            $promedio->total_ponderado=$pon+$ponval;
            array_push($promedios,$promedio);
        }
        
   
        // array_sum(array_column($input, 'gozhi')); 
        return $promedios;

  
    }

    public function getcompetencia4(){
        
        $preguntas=$this->getpreguntas(4);
        
        //$campos=array_keys(get_object_vars($datos[0]));
        
        
        $promedios=array();

        foreach($preguntas as $p){
            $promedio=(object)array(
            'id'=>$p->id,'promedio'=>0,'ponderado'=>0,
            'promedio_val'=>0,'ponderado_v'=>0,
            'total_nivel'=>0,'total_ponderado'=>0
        );
            $prom=($p->pregunta_41+$p->pregunta_42+$p->pregunta_43+$p->pregunta_44+$p->pregunta_45)/5;
            $promedio->promedio=$prom;
            $pon=$prom*(12.5/100);
            $promedio->ponderado=$pon;

            $promval=($p->validacion_41+$p->validacion_42)/2;
            $promedio->promedio_val=$promval;
            $ponval=$promval*(12.5/100);
            $promedio->ponderado_v=$ponval;

            $promedio->total_nivel=($prom+$promval)/2;
            $promedio->total_ponderado=$pon+$ponval;
            array_push($promedios,$promedio);
        }
        
   
        // array_sum(array_column($input, 'gozhi')); 
        return $promedios;

  
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

    function competencias($competencia_id){
        $competencia=array();
        switch ($competencia_id) {
            case 1:
                $competencia=$this->getpreguntas($competencia_id);
                break;
            case 2:
                $competencia=$this->getpreguntas($competencia_id);
                break;
            case 3:
                $competencia=$this->getpreguntas($competencia_id);
                break;
            case 4:
                $competencia=$this->getpreguntas($competencia_id);
                break;
            
        }
        
        $data=array(
            'about'=>$competencia,
        );
        $this->load->view('layouts/header');
        $this->load->view('dashboard/competencia',$data);
        $this->load->view('layouts/footer');
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

    
    

}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */
