<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Competencia_model extends CI_Model {

    public function getquestions(){
        $this->db->order_by('codigo', 'asc');
        return $this->db->get('questions')->result();
    }

    public function getanswer($answer){
        $this->db->select($answer);
        return $this->db->get('competencias')->result();
        
    }

}


