<?php 

 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Home extends CI_Controller {
 
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        
    }
    
    public function index()
    {
        if($this->session->userdata('login')){
            redirect(site_url('dashboard/index'));
        }
        else{
            $this->load->view('home/index');
        }
        
    }

    public function login()
    {
        if($this->session->userdata('login')){
            redirect(site_url('dashboard/index'));
        }
        else{
            $this->load->view('home/login');
        }
       
    }

    public function auth()
    {
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $user_current=$this->User_model->login($email,$password);
        if($user_current){
            $user_data=array(
                'name'=>$user_current->nombre,
                'email'=>$user_current->email,
                'role'=>$user_current->rol,
                'login'=>true,
            );
            
            
            $this->session->set_userdata($user_data);
            redirect(site_url('dashboard/index'));
            
        }
        else{
           
            $this->session->set_flashdata('error', 'Algunos de sus campos estan vacios o no coinciden.');
            
            redirect(site_url('home/login'));
        }

    }

    public function logout()
    {
       
        $this->session->sess_destroy();
        redirect(site_url('home/login'));
    }

 
 }
 
 /* End of file Home.php */
 