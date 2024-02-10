<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Empleado_model extends CI_Model 
{
    
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    public function countemployees(){
        
        $this->db->select('count(e.id) as employees');
        $this->db->from('employees e');
        $total= $this->db->get()->row();
        return $total->employees;
    }

    public function countfemale(){
        $this->db->select('count(f.id) as female');
        $this->db->from('employees f');
        $this->db->where('f.genero', 'Femenino');
        $total=$this->db->get()->row();
        return $total->female;
    }

    public function countmale(){
        $this->db->select('count(f.id) as male');
        $this->db->from('employees f');
        $this->db->where('f.genero', 'Masculino');
        $total=$this->db->get()->row();
        return $total->male;
    }

    public function formacion(){
        $this->db->select('formacion');
        $this->db->order_by('formacion', 'asc');
        
        return $this->db->get('employees')->result();
    }

    public function getcountformacion($formacion){
        $this->db->select('count(id) as cantidad');
        
        $this->db->from('employees');
        $this->db->where('formacion', $formacion);
        $data= $this->db->get()->row();
       
        return  $data->cantidad;
    }

    public function edades(){
        $this->db->select('edad');    
        return $this->db->get('employees')->result();
    }
    
    public function getcantidadedad($edad){
        $this->db->select('count(id) as cantidad');
        $this->db->where('edad', $edad);
        $total=$this->db->get('employees')->row();
        
        return $total->cantidad;
        
    }
    public function countinteresados(){
        $this->db->select('count(id) as cantidad');
        $this->db->where('email is not null',null, FALSE);
        $interesado= $this->db->get('employees')->row();
        return $interesado->cantidad;
    }

    public function getcompetencia1(){
        $this->db->select('pregunta_11,pregunta_12,pregunta_13,pregunta_14,
        pregunta_15,validacion_11,validacion_12,');
        return $this->db->get('competencias')->result();
    }

                        
}


/* End of file Empleado_model.php and path \application\models\Empleado_model.php */
