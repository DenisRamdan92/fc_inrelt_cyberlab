<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('Template');
        $this->load->model('MainModel','model');
    }
    
    public function index(){
        $data['info'] = $this->model->info();
        $data['socmed'] = $this->model->socmed();
        $data['aboutus'] = $this->model->aboutus();
        $this->template->load('tmp/frontend','homeView',$data);
    }
    //////homeview
    public function newsletter()
    {
        $this->model->newsletter();
    }
    public function contactSend()
    {
        $this->model->contactSend();
    }
 
}
?>
