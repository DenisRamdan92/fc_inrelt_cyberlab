<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('TeacherModel');
        $this->load->library('Template');
    }
    
    public function index(){
        $this->template->load('tmp/backend','teacherView');
    }

}
?>
