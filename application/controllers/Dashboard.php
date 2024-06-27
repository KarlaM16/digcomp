<?php defined('BASEPATH')|| exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect(site_url('home/login'));
        }

        $this->load->model(array('Empleado_model', 'Competencia_model'));
    }

    public function index()
    {

        $employees = $this->Empleado_model->countusuarios();
        $competencias = $this->Competencia_model->getall();
        $niveles = array();
        $empresas = $this->Empleado_model->get_empresa();
        foreach ($competencias as $c) {
            $nivel = (object)array('nivel' => 0, 'competencia' => 0, 'ponderado' => 0);
            $resultado = $this->getresult_competencia($c->id);
            $nivel->competencia = $c->id;
            $nivel->nivel = $resultado->promedio_total;
            $nivel->ponderado = $resultado->ponderado;
            array_push($niveles, $nivel);
        }


        $formacion = $this->formacion();

        $data = array(
            'competencias' => $competencias,
            'employees' => $employees,
            'female' => $this->Empleado_model->countfemale(),
            'male' => $this->Empleado_model->countmale(),
            'edades' => $this->getedad(),
            'formacion' => $formacion,
            'interesados' => $this->Empleado_model->countinteresados(),
            'niveles' => $niveles,
            'empresas' => $empresas,
            'usuarios'=>$this->Empleado_model->getall()
        );
        $this->load->view('layouts/header');
        $this->load->view('dashboard/index', $data);
        $this->load->view('layouts/footer');
    }

    public function getarea()
    {

        $competencias = $this->Competencia_model->getall();
        $niveles = array();
        foreach ($competencias as $c) {
            $nivel = (object)array('competencia' => $c->id, 'ponderado' => 0);
            $resultado = $this->getresult_competencia($c->id);
            $nivel->ponderado = $resultado->ponderado;
            array_push($niveles, $nivel);
        }


        echo json_encode($niveles);
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

    public function getresult_empleado($competencia_id){
        $usuarios = $this->Empleado_model->getall();
        $resultados = array();
        foreach ($usuarios as $u) {
            $respuestas = $this->Competencia_model->getrespuestas($u->id, $competencia_id);

            $objetivo = (object)array(
                'usuario_id' => $u->id,
                'preguntas' => 0,
                'validacion' => 0,
                'competencia_id' => $competencia_id,
                'total_preguntas' => 0,
                'total_validacion' => 0,
                'ponderado' => 0
            );

            foreach ($respuestas as $r) {
                $codigo = str_split($r->codigo);
                if ($codigo[0] == 'P') {
                    $objetivo->preguntas += $r->valor;
                } else {
                    $objetivo->validacion += $r->valor;
                }
            }
            array_push($resultados, $objetivo);
        }


        return $resultados;
    }

    public function  getresult_competencia($competencia_id)
    {
        $resultados = $this->getresult_empleado($competencia_id);
        foreach ($resultados as $r) {
            $r->total_preguntas = $r->preguntas / 5;
            $r->total_validacion = $r->validacion / 2;
        }

        $competencia = (object)array('promedio_preguntas' => 0, 'promedio_validacion' => 0, 'promedio_total' => 0, 'ponderado' => 0);
        foreach ($resultados as $r) {
            $competencia->promedio_preguntas += ($r->total_preguntas / 100);
            $competencia->promedio_validacion += ($r->total_validacion / 100);
        }
        $competencia->promedio_total = ($competencia->promedio_preguntas + $competencia->promedio_validacion) / 2;

        foreach ($resultados as $r) {
            $r->ponderado = ($r->total_preguntas * 12.5) + ($r->total_validacion * 12.5);
        }

        foreach ($resultados as $r) {
            $competencia->ponderado += $r->ponderado / 100;
        }


        return $competencia;
    }
}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */
