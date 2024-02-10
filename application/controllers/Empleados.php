<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect(site_url('home/login'));
        }

    }

    public function index()
    {
        $this->load->view('layouts/header');
        $this->load->view('empleados/index');
        $this->load->view('layouts/footer');
        
    }
}

/* End of file Empleados.php and path \application\controllers\Empleados.php */
