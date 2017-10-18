<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('Template');
    }
    
    public function index(){
        $this->template->load('tmp/frontend','home');
    }

    
    public function home(){
        $this->template->load('tmp/frontend','home');
    }
    
    public function about(){
        $this->template->load('tmp/frontend','about');
    }
    
    public function training(){
        $this->template->load('tmp/frontend','training');
    }
    
    public function team(){
        $this->template->load('tmp/frontend','team');
    }
    
    public function product(){
        $this->template->load('tmp/frontend','product');
    }
    
    public function contact(){
        $this->template->load('tmp/frontend','contact');
    }
 
}
?>
