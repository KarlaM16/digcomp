<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empleados extends CI_Controller
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
        $data = array('empleados' => $this->Empleado_model->getall());
        $this->load->view('layouts/header');
        $this->load->view('empleados/index', $data);
        $this->load->view('layouts/footer');
    }

    public function details($id)
    {

        $data = array(
            'empleado' => $this->Empleado_model->getone($id),

        );
        $this->load->view('layouts/header');
        $this->load->view('empleados/details', $data);
        $this->load->view('layouts/footer');
    }

    public function competencia($global_id)
    {

        $respuestas = $this->datacompetencia($global_id);
        
        $data = array(
            'empleado' => $this->Empleado_model->getone($global_id),
            'competencias'=>$respuestas,
        );
        $this->load->view('layouts/header');
        $this->load->view('empleados/competencia', $data);
        $this->load->view('layouts/footer');
    }

    public function preguntas($id)
    {
        $niveles = $this->Competencia_model->getniveles();
        $respuestas = $this->Empleado_model->getrespuestas($id, 1);
        $respuestas_2 = $this->Empleado_model->getrespuestas($id, 2);
        $respuestas_3 = $this->Empleado_model->getrespuestas($id, 3);
        $respuestas_4 = $this->Empleado_model->getrespuestas($id, 4);
        $data = array(
            'empleado' => $this->Empleado_model->getone($id),
            'niveles' => $niveles,
            'respuestas' => $respuestas,
            'respuestas_2' => $respuestas_2,
            'respuestas_3' => $respuestas_3,
            'respuestas_4' => $respuestas_4,
        );

        $this->load->view('layouts/header');
        $this->load->view('empleados/preguntas', $data);
        $this->load->view('layouts/footer');
    }

    public function datacompetencia($global_id)
    {
        $user = $this->Empleado_model->get_empleado($global_id);
        $competencias = $this->Competencia_model->getall();
        $resultados = array();
        foreach ($competencias as $c) {
            $objetivo = (object)array(
                'usuario_id' => $user->id,
                'preguntas' => 0,
                'validacion' => 0,
                'competencia_id' => $c->id,
                'total_preguntas' => 0,
                'total_validacion' => 0,
                'total_nivel' => 0,
                'total_ponderado' => 0,
                'competencia_id' => $c->id,
                'competencia_codigo' => $c->codigo,
                'competencia_nombre' => $c->competencia,
            );

            $respuestas = $this->Competencia_model->getrespuestas($user->id, $c->id);


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
        
        foreach ($resultados as $r) {
            $r->total_preguntas=$r->preguntas/5;
            $r->total_validacion=$r->validacion/2;
            $r->total_ponderado=($r->total_preguntas*12.5)+($r->total_validacion*12.5);
            $r->total_nivel=($r->total_preguntas+$r->total_validacion)/2;
        }
        
        return $resultados;
    }

    public function descargapreguntas($id){
        $this->load->library('PdfGenerator');
        $niveles = $this->Competencia_model->getniveles();
        $respuestas = $this->Empleado_model->getrespuestas($id, 1);
        $respuestas_2 = $this->Empleado_model->getrespuestas($id, 2);
        $respuestas_3 = $this->Empleado_model->getrespuestas($id, 3);
        $respuestas_4 = $this->Empleado_model->getrespuestas($id, 4);
        $data = array(
            'empleado' => $this->Empleado_model->getone($id),
            'niveles' => $niveles,
            'respuestas' => $respuestas,
            'respuestas_2' => $respuestas_2,
            'respuestas_3' => $respuestas_3,
            'respuestas_4' => $respuestas_4,
        );


       // $this->load->view('empleados/descarga', $data);
        $html=$this->load->view('empleados/descarga', $data, TRUE);
        $file="Preguntas del Empleado".$id;
        $this->pdfgenerator->generate($html, $file,true,'A4', 'portrait');
    }
    public function descarcompetencias($global_id){
        $this->load->library('PdfGenerator');

        $respuestas = $this->datacompetencia($global_id);
      
        $data = array(
            'empleado' => $this->Empleado_model->getone($global_id),
            'competencias'=>$respuestas,
        );
 
        $html=$this->load->view('empleados/descargacompetencia', $data, TRUE);
        //$this->load->view('empleados/descargacompetencia', $data);
        $file="Competencias del Empleado".$global_id;
       $this->pdfgenerator->generate($html, $file,true,'A4', 'portrait');
    }
}

/* End of file Empleados.php and path \application\controllers\Empleados.php */
