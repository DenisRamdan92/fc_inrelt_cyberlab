<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('Template');
        $this->load->model('MainModel');
        $this->load->model('CoursesModel','model');
    }
    
    public function index(){
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();

        $config = array();
        $config["base_url"] = base_url() . "frontend/courses/index";
        $config["total_rows"] = $this->model->record_count();
        $config["per_page"] = 10;
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

        $this->template->load('tmp/frontend','coursesView',$data);
    }
    public function read($id)
    {
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();
        $data['courses'] = $this->model->courses($id);

        $this->model->addView($id);
        $this->template->load('tmp/frontend','courses/coursesSingle',$data);
    }
    public function coursesList($id)
    {
        if ($id != "*") {

            $config = array();
            $config["base_url"] = base_url() . "frontend/courses/index";
            $config["total_rows"] = $this->model->record_count($id);
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
            $data["results"] = $this->model->fetch_courses1($config["per_page"], $page, $id);
            $data["links"] = $this->pagination->create_links();
            $this->load->view('courses/CoursesSelectMaterial',$data);

        } else {
            return false;
        }
    }
    public  function lessonList($id)
    {
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();
        $data['courses'] = $this->model->courses($id);
        
        $this->db->where('id_courses',$id);
        $query = $this->db->get('tbl_courses');
        $row = $query->row_array();
        $price = $row['price'];

        if ($price == "") {
            $this->template->load('tmp/frontend','courses/lessonList',$data);
        }   else{

                if ($this->session->userdata('isLoginClient') == true) {
                    $this->model->payment0();
                    $this->template->load('tmp/frontend','courses/paymentView',$data);
                    // $this->model->send_pesan();
                } else {
                    $this->template->load('tmp/frontend','courses/notLogin',$data);
                }
            
        }
        if ($this->session->userdata('isLoginClient') == true) {
            $this->model->addDetail($id,$this->session->userdata('id_student'),$price);
        }

        $this->model->addView($id);
    }
    public function readLesson($id)
    {
        $data['lesson'] = $this->model->readLesson($id);
        $this->load->view('courses/singleLesson',$data);
    }
 public function send_pesan()
 {
    $this->model->send_pesan();
 }
}
?>
