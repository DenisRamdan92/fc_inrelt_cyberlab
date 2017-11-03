<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('Template');
        $this->load->model('RegisterModel','model');
        $this->load->model('MainModel');
    }
    
    public function index(){
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();

        
        $this->template->load('tmp/frontend','registerView',$data);
    }
    public function logincek()
    {
        $this->model->cek();
    }

    public function logout() {
        header ("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");  
        header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
        header ("Cache-Control: no-cache, must-revalidate");  
        header ("Pragma: no-cache");
        $this->session->sess_destroy();
        redirect('frontend/register');
    }

 
}
?>
