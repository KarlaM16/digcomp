<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

    public function details($competencia_id){
        $questions=$this->Competencia_model->getquestions();
        
        //$data1=str_split($questions[0]->codigo);
        $preguntas=array();
        foreach($questions as $q){
            $pregunta=str_split($q->codigo);
            if($pregunta[1]==$competencia_id){
                array_push($preguntas,$q);
            }
        }
        
        $data=array(
            'numero'=>$competencia_id,
            'preguntas'=>$preguntas,
            'evaluacion'=>$this->evaluacion($competencia_id),
        );
        $this->load->view('layouts/header',);
        $this->load->view('competencias/details',$data);
        $this->load->view('layouts/footer');
        
    }

    public function evaluacion($competencia_id){
        switch ($competencia_id) {
            case 1:
                $competencia=$this->Competencia_model->getanswer('pregunta_11,pregunta_12,
                pregunta_13,pregunta_14,pregunta_15');
                $campos=array_keys(get_object_vars($competencia[0]));
                return $this->getvalor($competencia,$campos);
                break;
            
            case 2:
                $competencia=$this->Competencia_model->getanswer('pregunta_21,pregunta_22,
                pregunta_23,pregunta_24,pregunta_25');
                $campos=array_keys(get_object_vars($competencia[0]));
                return $this->getvalor($competencia,$campos);
                break;
            
            case 3:
                $competencia=$this->Competencia_model->getanswer('pregunta_31,pregunta_32,
                pregunta_33,pregunta_34,pregunta_35');
                $campos=array_keys(get_object_vars($competencia[0]));
                return $this->getvalor($competencia,$campos);
                break;
            
            case 4:
                $competencia=$this->Competencia_model->getanswer('pregunta_41,pregunta_42,
                pregunta_43,pregunta_44,pregunta_45');
                $campos=array_keys(get_object_vars($competencia[0]));
                return $this->getvalor($competencia,$campos);
                break;
            
            
            
            
        }
       
    }

    public function getvalor($competencia,$campos){
        $valores=array();
        
        foreach($campos as $c){
            $valor =array_column($competencia,$c);
            $univalor=(object)array(
                'a'=>0,
                'b'=>0,
                'c'=>0,
                'd'=>0,
            );
            
            foreach($valor as $v){
                switch ($v) {
                    case 1:
                        $univalor->a+=1;
                        break;
                    case 2:
                        $univalor->b+=1;
                        break;
                    case 3:
                        $univalor->c+=1;
                        break;
                    case 4:
                        $univalor->d+=1;
                        break;
                   
                }
                

            }
            array_push($valores,$univalor);
        }
       
        return $valores;
    }
}

/* End of file Competencias.php and path \application\controllers\Competencias.php */
