<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Competencia_model extends CI_Model {

    public function getall(){
        return $this->db->get('competencias')->result();
    }

    public function getniveles(){
        return $this->db->get('niveles')->result();
    }

    

    public function getrespuestas($usuario_id,$competencia_id){
        $this->db->select('r.usuario_id,n.nombre nivel,n.valor,p.codigo,p.competencia_id');
        $this->db->from('respuestas r');
        $this->db->join('niveles n', 'r.nivel_id = n.id', 'left');
        $this->db->join('preguntas p', 'r.pregunta_id = p.id', 'left');
        $this->db->where('r.usuario_id', $usuario_id);
        $this->db->where('p.competencia_id', $competencia_id);
        return $this->db->get()->result();
    }

    public function getpreguntasall($competencia_id){
       
        $this->db->where('competencia_id', $competencia_id);
        
      return  $this->db->get('preguntas')->result();
    }

    public function getcountrespuesta($competencia_id){

        $this->db->select('p.id pregunta_id,p.pregunta,n.nombre nivel,n.valor,r.nivel_id,p.codigo,p.competencia_id');
        $this->db->from('respuestas r');
        $this->db->join('niveles n', 'r.nivel_id = n.id', 'left');
        $this->db->join('preguntas p', 'r.pregunta_id = p.id', 'left');
        $this->db->where('p.competencia_id', $competencia_id);
        return $this->db->get()->result();
    }
}


