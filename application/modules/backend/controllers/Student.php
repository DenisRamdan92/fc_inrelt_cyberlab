<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('StudentModel');
        $this->load->library('Template');
    }
    
    public function index(){
        $this->template->load('tmp/backend','studentView');
    }

}
?>
