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
        $config = array();
        $config["base_url"] = base_url() . "frontend/profile/index";
        $config["total_rows"] = $this->model->record_count();
        $config["per_page"] = 2;
        $config["uri_segment"] = 4;

		$config["next_tag_open"] = "<li>";
		$config["next_tag_close"] = "</li>";

		$config["last_tag_open"] = "<li>";
		$config["last_tag_close"] = "</li>";

		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";

		$config["next_link"] = "Next";
		$config["prev_link"] = "Prev";
		$config["last_link"] = "Last";
		$config["first_link"] = "First";

		$config["cur_tag_open"] = "<li><span class='active'>";
		$config["cur_tag_close"] = "</li></span>";

		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";

		$config["first_tag_open"] = "<li>";
		$config["first_tag_close"] = "</li>";

        $this->pagination->initialize($config);
		

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["results"] = $this->model->fetch_courses($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

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
    public function paymentInsert()
    {
        $config['upload_path']          = './assets/backend/img/confirmation/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 80000;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('urlSlider'))
        {
             $urlSlider = "";
             $error = $this->upload->display_errors();
             echo $error;
        }
        else
        {
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $file_name = $upload_data['file_name'];
            $urlSlider = base_url()."assets/backend/img/confirmation/".$file_name;
        }

        $confirmation = $this->input->post('confirmation-number');
        $account = $this->input->post('account-of-destination-o');
        $value = $this->input->post('value-of-money-o');
        $information = $this->input->post('information');
        $id_student = $this->session->userdata('id_student');

        $this->db->where('id_student',$id_student);
        $this->db->where('number_registration',$confirmation);
        $query = $this->db->get('tbl_confirm_payment');
        $jml = $query->num_rows();
        
        if ($jml > 0) {
            $data = array(
                'id_bank' => $account,
                'quantity_send' => $value,
                'date_transfer' => mdate('%Y-%m-%d'),
                'information' => $information,
                'url_picture' => $urlSlider
            );
            $this->db->update('tbl_confirm_payment',$data);
            $this->session->set_flashdata('msg_error',"<p style='color:#26A65B;'>Your confirmation number has been sent, please wait until one day</p>");            
        } else {
            $this->session->set_flashdata('msg_error',"<p style='color:#E87E04;'>An error occurred, please re-enter your registration number</p>");            
        }
        redirect('frontend/Profile');
    }
 
}
?>
