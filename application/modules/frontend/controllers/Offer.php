<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('Template');
        $this->load->model('MainModel');
        $this->load->model('OfferModel','model');
    }
    
    public function read($id){
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();
        $data['offer'] = $this->model->offer($id);

        $this->template->load('tmp/frontend','offerView',$data);
    }
 
}
?>
