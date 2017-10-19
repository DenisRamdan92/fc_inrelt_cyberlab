<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Socmed extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('SocmedModel','model');
        $this->load->library('Template');
    }
    
    public function index(){
        $this->template->load('tmp/backend','socmedView');
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
