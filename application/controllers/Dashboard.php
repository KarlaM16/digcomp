<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('login')){
        redirect(site_url('home/login'));
        }
         $this->load->model('User_model');

    }

    public function index()
    {
        $this->load->view('layouts/header');
        $this->load->view('dashboard/index');    
        $this->load->view('layouts/footer');
        
        
    }
}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */
