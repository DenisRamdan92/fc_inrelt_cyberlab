<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('Template');
        $this->load->model('MainModel');
        $this->load->model('BlogModel','model');
    }
    
    public function index(){
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();

        $config = array();
        $config["base_url"] = base_url() . "frontend/blog/index";
        $config["total_rows"] = $this->model->record_count();
        $config["per_page"] = 5;
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

        $this->template->load('tmp/frontend','blogView',$data);
    }
    public function read($id)
    {
        $data['info'] = $this->MainModel->info();
        $data['socmed'] = $this->MainModel->socmed();
        $data['aboutus'] = $this->MainModel->aboutus();
        $data['blog'] = $this->model->blog($id);

        $this->template->load('tmp/frontend','blog/blogSingle',$data);
    }
    public function commentSend($id)
    {
        $this->model->commentSend($id);
    }
 
}
?>
