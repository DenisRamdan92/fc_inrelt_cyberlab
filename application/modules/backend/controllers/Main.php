<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        if($this->session->userdata('isLogin')!= true)
        {
            redirect('admin');
        }
        $this->load->model('MainModel');
        $this->load->library('Template');
        
    }
    
    public function index(){
        $this->template->load('tmp/backend','dashboard');
    }
    
    public function login(){
        $this->load->view('login');
    }
    


}
?>
