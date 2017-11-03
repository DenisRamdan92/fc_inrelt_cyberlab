<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        if($this->session->userdata('isLoginClient')!= true)
        {
            redirect('frontend/register');
        }
        $this->load->library('Template');
        $this->load->model('MainModel');
        $this->load->model('profileModel','model');
        
    }
    
    public function index(){

        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();
        $this->template->load('tmp/profile','profileHomeView',$data);
    }
    public function profile()
    {
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();
        $data['student'] = $this->model->student();
        $this->template->load('tmp/profile','profile/profileView',$data);   
    }
    public function progress()
    {
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();
        $this->template->load('tmp/profile','profile/progressView',$data);   
    }
    public function score()
    {
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();
        $this->template->load('tmp/profile','profile/scoreView',$data);   
    }
    public function info()
    {
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();
        $this->template->load('tmp/profile','profile/infoView',$data);   
    }
 
}
?>
