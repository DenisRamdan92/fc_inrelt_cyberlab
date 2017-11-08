<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        if($this->session->userdata('isLoginClient')!= true)
        {
            redirect('frontend/register');
        }
        $this->load->library('Template');
        $this->load->model('MainModel');
        $this->load->model('profileModel','model');
        
    }
    
    public function index(){

        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();
        $this->template->load('tmp/profile','profileHomeView',$data);
    }
    public function profile()
    {
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();
        $data['student'] = $this->model->student();
        $this->template->load('tmp/profile','profile/profileView',$data);   
    }
    public function progress()
    {
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();
        $this->template->load('tmp/profile','profile/progressView',$data);   
    }
    public function score()
    {
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();
        $this->template->load('tmp/profile','profile/scoreView',$data);   
    }
    public function info()
    {
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();
        $this->template->load('tmp/profile','profile/infoView',$data);   
    }
    public function insert()
	{
		if($this->input->method(TRUE)=='POST'):
           
            $id = $this->input->post("id_student");
            $name = $this->input->post("name");
            $place_of_birth = $this->input->post("place_of_birth");
            $date_of_birth = $this->input->post("date_of_birth");
            $country = $this->input->post("country");
            $gender = $this->input->post("gender");
            $address = $this->input->post("address");
            $phone = $this->input->post("phone");
            $email = $this->input->post("email");
            $public_username = $this->input->post("public_username");
            $last_edu = $this->input->post("last_edu");
            $insteresting_to = $this->input->post("insteresting_to");
            $testimonials = $this->input->post("testimonials");
            $sugestion = $this->input->post("sugestion");
            
            $this->db->where('id_student',$id);
			$this->db->update("tbl_student",array(
                "name"=>$name,
                "place_of_birth"=>$place_of_birth,
                "date_of_birth"=>$date_of_birth,
                "country"=>$country,
                "gender"=>$gender,
                "address"=>$address,
                "telp"=>$phone,
                "email"=>$email,
                "public_username"=>$public_username,
                "last_edu"=>$last_edu,
                "insteresting_to"=>$insteresting_to,
                "sugestion"=>$sugestion,
                "testimonials" => $testimonials
				));
        endif;
        echo 1;
    }
 
}
?>
