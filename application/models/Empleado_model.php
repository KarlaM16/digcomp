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
        
        $this->db->select('count(e.id) as employees');//de la base de datos seleccionamos por id para contar
        $this->db->from('employees e');
        $total= $this->db->get()->row();//total apunta a la bd obtiene por fila 
        return $total->employees;//retorna el total de empleados
    }
    //cuenta femeninos desde la bd
    public function countfemale(){
        $this->db->select('count(f.id) as female');
        $this->db->from('employees f');
        $this->db->where('f.genero', 'Femenino');
        $total=$this->db->get()->row();
        return $total->female;
    }
    //cuenta masculinos desde la bd
    public function countmale(){
        $this->db->select('count(f.id) as male');
        $this->db->from('employees f');
        $this->db->where('f.genero', 'Masculino');
        $total=$this->db->get()->row();
        return $total->male;
    }
    //cuenta la formacion
    public function formacion(){
        $this->db->select('formacion');//selecciona formacion en bd
        $this->db->order_by('formacion', 'asc');//orden en  ascendente
        
        return $this->db->get('employees')->result();
    }

    public function getcountformacion($formacion){//funcion obtiene el conteo de formacion
        $this->db->select('count(id) as cantidad');
        
        $this->db->from('employees');
        $this->db->where('formacion', $formacion);
        $data= $this->db->get()->row();
       
        return  $data->cantidad;
    }

    public function edades(){ //selecciona edad en la base de datos retorna este valor para empleados, agragandos a un result.
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

    public function getquestion($data){
        $this->db->select($data);
        return $this->db->get('competencias')->result();
    }

    // Esto va a obtener todos los empleados
    public function getall(){
        $this->db->order_by('id', 'asc');
        return $this->db->get('employees')->result();
    }

    //esto permitirá obtener la informacion por un empleado para llenar la tabla basico de detalles
    public function getone($global_id){
        $this->db->select('e.id empleado_id,e.global_id,e.email,e.genero,e.edad,e.creation_time,e.formacion,c.*');
        $this->db->from('employees e');
        $this->db->join('competencias c', 'e.id = c.employee_id', 'inner');
        $this->db->where('global_id', $global_id);
        return $this->db->get()->row();
    }
   
    public function getquestionone($data,$id){
      

        $this->db->select($data);
        $this->db->from('competencias');
        $this->db->join('employees', 'competencias.employee_id = employees.id', 'left');
        $this->db->where('employees.global_id', $id);
       $competencia= $this->db->get()->result();
       $value=0;
        foreach($competencia as $c){
            foreach($c as $a){
                $value+=$a;
            }
        }
        return ($value/5);
    }
    
    public function getvalidationone($data,$id){
        $this->db->select($data);
        $this->db->from('competencias');
        $this->db->join('employees', 'competencias.employee_id = employees.id', 'left');
        $this->db->where('employees.global_id', $id);
        $validacion=$this->db->get()->result();
        $value=0;
        foreach($validacion as $v){
            foreach($v as $a){
                $value+=$a;
            }
        }

        return $value/2;
    }
                        
}


/* End of file Empleado_model.php and path \application\models\Empleado_model.php */
