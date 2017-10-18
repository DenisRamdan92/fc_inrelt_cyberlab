<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('ContactModel');
        $this->load->library('Template');
    }
    
    public function index(){
        $this->template->load('tmp/backend','contactView');
    }

}
?>
