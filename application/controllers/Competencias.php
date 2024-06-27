<?php defined('BASEPATH') || exit('No direct script access allowed');

class Competencias extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect(site_url('home/login'));
        }
        $this->load->model('Competencia_model');
    }

    public function index()
    {
    }

    public function details($competencia_id)
    {

        $preguntas=$this->Competencia_model->getpreguntasall($competencia_id);
        $respuestas=$this->Competencia_model->getcountrespuesta($competencia_id);
        $niveles=$this->Competencia_model->getniveles();
        
        $data = array(
            'numero' => $competencia_id,
            'preguntas'=>$preguntas,
            'niveles'=>$niveles,
            'respuestas'=>$respuestas,
        );
        $this->load->view('layouts/header',);
        $this->load->view('competencias/details', $data);
        $this->load->view('layouts/footer');
    }

    
}

/* End of file Competencias.php and path \application\controllers\Competencias.php */
