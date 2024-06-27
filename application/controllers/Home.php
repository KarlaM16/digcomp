<?php defined('BASEPATH')|| exit('No direct script access allowed');
 
 class Home extends CI_Controller {
 
    //constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        
    }
    //funcion principal. Presenta login, si usuario esta en userdata, pasa a la pagina dashboard/index, caso contrarios sigue en home
    public function index()
    {
        if($this->session->userdata('login')){
            redirect(site_url('dashboard/index'));
        }
        else{
            $this->load->view('home/index');
        }
        
    }
    //funcion login
    public function login()
    {
        if($this->session->userdata('login')){
            redirect(site_url('dashboard/index'));
        }
        else{
            $this->load->view('home/login');
        }
       
    }

    //funcion autenticarse

    public function auth()
    {
        $email=$this->input->post('email'); //metodo input y post html
        $password=$this->input->post('password');
        $user_current=$this->User_model->login($email,$password);//redirecciona al modelo
        if($user_current){
            $user_data=array(//almacena en el array
                'name'=>$user_current->nombre,//recorre
                'email'=>$user_current->email,
                'role'=>$user_current->rol,
                'login'=>true,
            );
            
            if($user_data['role']=='Administrador'){
                $this->session->set_userdata($user_data);
            redirect(site_url('dashboard/index'));
            }
            else{
                
            $this->session->set_flashdata('error', 'No cuentas con permisos de administrador');
            
            redirect(site_url('home/login'));
            }

        }
        else{
           
            $this->session->set_flashdata('error', 'Algunos de sus campos estan vacios o no coinciden.');
            
            redirect(site_url('home/login'));
        }

    }

    //funcion salir 
    public function logout()
    {
       
        $this->session->sess_destroy();//desruyte
        redirect(site_url('home/login'));
    }
 }
 
 /* End of file Home.php */
 