<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Empleado_model extends CI_Model 
{
    
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    public function countusuarios(){
        
        $this->db->select('count(e.id) as usuarios');
        $this->db->from('usuarios e');
        $this->db->where('e.rol', 'Empleado');
        $total= $this->db->get()->row();
        return $total->usuarios;
    }

    

    public function countfemale(){
        $this->db->select('count(f.id) as female');
        $this->db->from('usuarios f');
        $this->db->where('f.genero', 'Femenino');
        $this->db->where('f.rol', 'Empleado');
        $total=$this->db->get()->row();
        return $total->female;
    }

    public function countmale(){
        $this->db->select('count(m.id) as male');
        $this->db->from('usuarios m');
        $this->db->where('m.genero', 'Masculino');
        $this->db->where('m.rol', 'Empleado');
        $total=$this->db->get()->row();
        return $total->male;
    }

    public function formacion(){
        $this->db->select('formacion');
        $this->db->order_by('formacion', 'asc');
        $this->db->where('rol', 'Empleado');
        return $this->db->get('usuarios')->result();
    }

    public function getcountformacion($formacion){
        $this->db->select('count(id) as cantidad');
        
        $this->db->from('usuarios');
        $this->db->where('formacion', $formacion);
        $data= $this->db->get()->row();
       
        return  $data->cantidad;
    }

    public function edades(){
        $this->db->select('edad'); 
        $this->db->where('rol', 'Empleado');   
        return $this->db->get('usuarios')->result();
    }
    
    public function getcantidadedad($edad){
        $this->db->select('count(id) as cantidad');
        $this->db->where('edad', $edad);
        $total=$this->db->get('usuarios')->row();
        
        return $total->cantidad;
        
    }
    public function countinteresados(){
        $this->db->select('count(id) as cantidad');
        $this->db->where('email is not null',null, FALSE);
        $this->db->where('rol', 'Empleado');
        $interesado= $this->db->get('usuarios')->row();
        return $interesado->cantidad;
    }

    public function getquestion($data){
        $this->db->select($data);
        return $this->db->get('competencias')->result();
    }

    // Esto va a obtener todos los usuarios que son empleados
    public function getall(){
        
        $this->db->order_by('id', 'asc');
        $this->db->where('rol', 'Empleado');
        return $this->db->get('usuarios')->result();
    }

    public function getone($global_id){
        $this->db->select('e.id empleado_id,e.global_id,e.email,e.genero,e.edad,e.creation_time,e.formacion,');
        $this->db->from('usuarios e');
        $this->db->where('global_id', $global_id);
        return $this->db->get()->row();
    }
   
    public function getquestionone($data,$id){
      

        $this->db->select($data);
        $this->db->from('competencias');
        $this->db->join('usuarios', 'competencias.employee_id = usuarios.id', 'left');
        $this->db->where('usuarios.global_id', $id);
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
        $this->db->join('usuarios', 'competencias.employee_id = usuarios.id', 'left');
        $this->db->where('usuarios.global_id', $id);
        $validacion=$this->db->get()->result();
        $value=0;
        foreach($validacion as $v){
            foreach($v as $a){
                $value+=$a;
            }
        }

        return $value/2;
    }

    public function getrespuestas($usuario_id,$competencia_id){
        $this->db->select('r.usuario_id,n.nombre,n.valor,p.codigo,p.competencia_id,p.pregunta');
        $this->db->from('respuestas r');
        $this->db->join('niveles n', 'r.nivel_id = n.id', 'left');
        $this->db->join('preguntas p', 'r.pregunta_id = p.id', 'left');
        $this->db->join('usuarios u', 'r.usuario_id = u.id', 'left');
        $this->db->where('u.global_id', $usuario_id);
        $this->db->where('p.competencia_id', $competencia_id);
        return $this->db->get()->result();
    }
                        
}


/* End of file Empleado_model.php and path \application\models\Empleado_model.php */
