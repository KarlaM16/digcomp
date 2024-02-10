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



        $data = array(
            'employees' => $employees,
            'female' => $this->Empleado_model->countfemale(),
            'male' => $this->Empleado_model->countmale(),
            'edades' => $this->getedad(),
            'formacion' => $formacion,
            'interesados' => $this->Empleado_model->countinteresados(),
            'competencia_1'=>$this->getcompetencia1(),
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

    public function getcomp_1(){
        $competencia=$this->getcompetencia1();
        echo json_encode($competencia);
    }

    public function getmediaarea($competencia)
    {
       
        $datos = (object)array('n1' => 0, 'n2' => 0, 'n3' => 0, 'n4' => 0, 'val_1' => 0, 'val_2' => 0,);

        foreach ($competencia as $c4) {
            $count = 0;
            switch ($c4) {
                case 1:
                    $datos->n1++;
                    break;
                case 2:
                    $datos->n2++;
                    break;
                case 3:
                    $datos->n3++;
                    break;
                case 4:
                    $datos->n4++;
                    break;
               
            }
        }
        return $datos;
    }

    public function getcompetencia1()
    {
        $datos = $this->Empleado_model->getcompetencia1();
        
        $pregunta_1 = array();
        $pregunta_2 = array();
        $pregunta_3 = array();
        $pregunta_4 = array();
        $pregunta_5 = array();

        
        foreach ($datos as $c1) {
            if ($c1->pregunta_11) {
                array_push($pregunta_1, $c1->pregunta_11);
            }
        }
        
        foreach ($datos as $c1) {
            if ($c1->pregunta_12) {
                array_push($pregunta_2, $c1->pregunta_12);
            }
        }
        foreach ($datos as $c1) {
            if ($c1->pregunta_13) {
                array_push($pregunta_3, $c1->pregunta_13);
            }
        }
        foreach ($datos as $c1) {
            if ($c1->pregunta_14) {
                array_push($pregunta_4, $c1->pregunta_14);
            }
        }
        foreach ($datos as $c1) {
            if ($c1->pregunta_15) {
                array_push($pregunta_5, $c1->pregunta_15);
            }
        }
        $val_1=0;
        $val_2=0;
        
        foreach ($datos as $c1) {
            if ($c1->validacion_11==100) {
                $val_1++;
            }
        }
        foreach ($datos as $c1) {
            if ($c1->validacion_12==100) {
                $val_2++;
            }
        }

        
    

        $datos_1 = $this->getmediaarea($pregunta_1);
        $datos_2 = $this->getmediaarea($pregunta_2);
        $datos_3 = $this->getmediaarea($pregunta_3);
        $datos_4 = $this->getmediaarea($pregunta_4);
        $datos_5 = $this->getmediaarea($pregunta_5);
        $final = (object)array('totaln1' => 0, 'totaln2' => 0, 'totaln3' => 0, 'totaln4' => 0);

        $final->totaln1 = $datos_1->n1 + $datos_2->n1 + $datos_3->n1 + $datos_4->n1 + $datos_5->n1;
        $final->totaln2 = $datos_1->n2 + $datos_2->n2 + $datos_3->n2 + $datos_4->n2 + $datos_5->n2;
        $final->totaln3 = $datos_1->n3 + $datos_2->n3 + $datos_3->n3 + $datos_4->n3 + $datos_5->n3;
        $final->totaln4 = $datos_1->n4 + $datos_2->n4 + $datos_3->n4 + $datos_4->n4 + $datos_5->n4;

        $promedio_n1 = $final->totaln1 / 5;
        $promedio_n2 = $final->totaln2 / 5;
        $promedio_n3 = $final->totaln3 / 5;
        $promedio_n4 = $final->totaln4 / 5;

        $promedio = (object)array('promedio_1' => 0, 'promedio_2' => 0, 'promedio_3' => 0, 'promedio_4' => 0,'valida_1' => $val_1, 'valida_2' => $val_2);

        $promedio->promedio_1 = $promedio_n1;
        $promedio->promedio_2 = $promedio_n2;
        $promedio->promedio_3 = $promedio_n3;
        $promedio->promedio_4 = $promedio_n4;

        return $promedio;
    }

    

}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */
