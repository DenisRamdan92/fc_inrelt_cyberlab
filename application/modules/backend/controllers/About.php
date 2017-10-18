<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('AboutModel');
        $this->load->library('Template');
    }
    
    public function index(){
        $this->template->load('tmp/backend','aboutView');
    }

}
?>
