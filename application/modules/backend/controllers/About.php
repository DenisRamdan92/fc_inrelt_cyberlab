<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller{
    
    function __construct() {
        
        parent::__construct();
        if($this->session->userdata('isLogin')!= true)
        {
            redirect('admin');
        }
        $this->load->model('aboutModel','model');
        $this->load->library('Template');
    }
    
    public function index(){
        $this->template->load('tmp/backend','aboutView');
    }
    public function data_list(){
    	$result = $this->model->data_list();
       	echo json_encode($result);
    }
    public function update()
    {
        $this->model->update();
    }

}
?>
