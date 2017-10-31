<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller{
    
    function __construct() {
        
        parent::__construct();
        if($this->session->userdata('isLogin')!= true)
        {
            redirect('admin');
        }
        $this->load->model('aboutModel','model');
        $this->load->library('Template');
    }

}
?>
