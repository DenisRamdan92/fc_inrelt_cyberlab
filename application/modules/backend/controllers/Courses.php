<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller{
    function __construct() {
		parent::__construct();
		if($this->session->userdata('isLogin')!= true)
        {
            redirect('admin');
        }
        $this->load->model('CoursesModel','model');
		$this->load->model('MaterialModel','modelMaterial');
        $this->load->model('LessonModel','modelLesson');
        $this->load->library('Template');
    }
    
    public function index(){
        $this->template->load('tmp/backend','coursesView');
	}
	

    //material function
    public function material()
    {
        $this->template->load('tmp/backend','materialView');
    }
    public function deleteMaterial()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_material");
			$this->db->where(array("id_material"=>$id));
			$this->db->delete("tbl_material");
		endif;
	}

	public function updateMaterial()
	{
		if($this->input->method(TRUE)=='POST'):
			$id_material = $this->input->post("id_material");
			$title_material = $this->input->post("title_material");
			$content_material = $this->input->post("content_material");

			$this->db->where(array("id_material"=>$id_material));

			$this->db->update("tbl_material",array(
				"title_material"=>$title_material,
				"content_material"=>$content_material
				));
		endif;
	}

	public function insertMaterial()
	{
		if($this->input->method(TRUE)=='POST'):
			
			$title_material = $this->input->post("title_material");
			$content_material = $this->input->post("content_material");

			
			$this->modelMaterial->check($title_material);

			$this->db->insert("tbl_material",array(
				"title_material"=>$title_material,
				"content_material"=>$content_material
				));
		endif;
	}

	public function ajax_listMaterial()
	{
		if($this->input->method(TRUE)=='POST'):
		$list = $this->modelMaterial->get_datatables();
        $data_ = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;
            $row = array();
			$m = preg_match_all("!\D+!",$data->id_material,$match);
			$row[] = "<button id='edit_btn' id_material='".$data->id_material."' title_material='".$data->title_material."' content_material='".$data->content_material."' class='btn btn-info'><i class='fa fa-pencil'></i> Edit</button> <button id='delete_btn' id_material='".$data->id_material."' id_material='".$data->id_material."' class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button>";
			$row[] = $no;
			$row[] = ucfirst($data->id_material);
            $row[] = ucfirst($data->title_material);
            $row[] = ucfirst($data->content_material);
			/*
			$row[] = ucfirst($data->status);
			*/
            $data_[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->modelMaterial->count_all(),
                        "recordsFiltered" => $this->modelMaterial->count_filtered(),
                        "data" => $data_,
                );
        //output to json format
        echo json_encode($output);
		endif;
	}
	//end material function

	//Lesson function
	public function lesson()
	{
		$this->template->load('tmp/backend','lessonView');
	}
	public function deleteLesson()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_lesson");
			$this->db->where(array("id_lesson"=>$id));
			$this->db->delete("tbl_lesson");
		endif;
	}

	public function updateLesson()
	{
		if($this->input->method(TRUE)=='POST'):
			$id_lesson = $this->input->post("id_lesson");
			$title_material = $this->input->post("title_lesson");
			$content_material = $this->input->post("content_lesson");
			$leng_time = $this->input->post('leng_time');
			$leveling = $this->input->post('leveling');
			$url_video = $this->input->post('url_video');

			$this->db->where(array("id_lesson"=>$id_lesson));

			$this->db->update("tbl_lesson",array(
				"title_lesson"=>$title_material,
				"content_lesson"=>$content_material,
				"leng_time"=>$leng_time,
				"leveling"=>$leveling,
				"url_video"=>$url_video
				));
		endif;
	}

	public function insertLesson()
	{
		if($this->input->method(TRUE)=='POST'):
			
			$title_lesson = $this->input->post("title_lesson");
			$content_lesson = $this->input->post("content_lesson");
			$leng_time = $this->input->post("leng_time");
			$url_video = $this->input->post("url_video");
			$leveling = $this->input->post("leveling");
			
			
			
			
			$this->modelLesson->check($title_lesson);

			$this->db->insert("tbl_lesson",array(
				"title_lesson"=>$title_lesson,
				"content_lesson"=>$content_lesson,
				"leng_time" => $leng_time,
				"leveling" => $leveling,
				"url_video" => $url_video
				));
		endif;
	}

	public function ajax_listLesson()
	{
		if($this->input->method(TRUE)=='POST'):
		$list = $this->modelLesson->get_datatables();
        $data_ = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;
            $row = array();
			$m = preg_match_all("!\D+!",$data->id_lesson,$match);
			$row[] = "<button id='edit_btn' id_lesson='".$data->id_lesson."' title_lesson='".$data->title_lesson."' content_lesson='".$data->content_lesson."' leng_time='".$data->leng_time."' leveling='".$data->leveling."' url_video='".$data->url_video."' class='btn btn-info'><i class='fa fa-pencil'></i> Edit</button> <button id='delete_btn' id_lesson='".$data->id_lesson."' class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button>";
			$row[] = $no;
			$row[] = ucfirst($data->id_lesson);
            $row[] = ucfirst($data->title_lesson);
            $row[] = ucfirst($data->content_lesson);
            $row[] = ucfirst($data->leng_time);
            $row[] = ucfirst($data->leveling);
            $row[] = " <button id='lihat_btn' url_video='".$data->url_video."' class='btn btn-info' data-toggle='modal'data-target='#videoView'><i class='fa fa-eye'></i> Lihat Video</button>";
			/*
			$row[] = ucfirst($data->status);
			*/
            $data_[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->modelLesson->count_all(),
                        "recordsFiltered" => $this->modelLesson->count_filtered(),
                        "data" => $data_,
                );
        //output to json format
        echo json_encode($output);
		endif;
	}
	//end lesson function

	//courses function
	public function ajax_list()
	{
		if($this->input->method(TRUE)=='POST'):
		$list = $this->model->get_datatables();
        $data_ = array();
        $no = $_POST['start'];
        foreach ($list as $files_) {
            $no++;
            $row = array();
			
			$row[] = $no;
			$row[] = ucfirst($files_->id_courses);
            $row[] = ucfirst($files_->name);
			$row[] = ucfirst($files_->title_courses);
            $row[] = ucfirst($files_->title_lesson);
			$row[] = ucfirst($files_->title_material);
			$row[] = ucfirst($files_->content_courses);
			$row[] = ucfirst($files_->price);
			$row[] = "<img src='".$files_->url_image."' alt='dont have image' sizes='100x100' width='75px'>";

			$row[] = "<button id_courses='".$files_->id_courses."' id_material='".$files_->id_material."' id_teacher='".$files_->id_teacher."' title_courses='".$files_->title_courses."' content_courses='".$files_->content_courses."' price='".$files_->price."' class='btn btn-info btn-xs' id='edit_pengguna'><i class='fa fa-pencil'></i> Edit</button> <button id_courses='".$files_->id_courses."' class='btn btn-success btn-xs' id='edit_pengguna_foto'><i class='fa fa-image'></i> Edit Picture</button> <button id='delete_pengguna' id_courses=".$files_->id_courses."  class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</button>";
			
            $data_[] = $row;


		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model->count_all(),
                        "recordsFiltered" => $this->model->count_filtered(),
                        "data" => $data_,
                );
        //output to json format
        echo json_encode($output);
		endif;
	}

	public function insert()
	{
		if($this->input->method(TRUE)=='POST'):

			$title_courses = $this->input->post("title_courses");
			$id_lesson = $this->input->post("id_lesson");
			$id_material = $this->input->post("id_material");
			$id_teacher = $this->input->post("id_teacher");
			$content_courses = $this->input->post("content_courses");
			$price = $this->input->post("price");

			$this->model->check($title_courses);


			$this->db->insert("tbl_courses",array(
				"title_courses"=>$title_courses,
				"id_lesson"=>$id_lesson,
				"id_material"=>$id_material,
				"id_teacher"=>$id_teacher,
				"content_courses"=>$content_courses,
				"price"=>$price
				));
		endif;
		echo json_encode(array("error"=>0));
	}

	public function update()
	{
		if($this->input->method(TRUE)=='POST'):

			$title_courses = $this->input->post("title_courses");
			$id_lesson = $this->input->post("id_lesson");
			$id_material = $this->input->post("id_material");
			$id_teacher = $this->input->post("id_teacher");
			$content_courses = $this->input->post("content_courses");
			$price = $this->input->post("price");
			$id = $this->input->post("id_courses");
			
			$this->model->check_another($title_courses,$id);


			$this->db->where(array("id_courses"=>$id));
			$this->db->update("tbl_courses",array(
				"id_material"=>$id_material,
				"id_lesson"=>$id_lesson,
				"id_teacher"=>$id_teacher,
				"title_courses"=>$title_courses,
				"content_courses"=>$content_courses,
				"price"=>$price
				));
		endif;
		echo json_encode(array("error"=>0));
	}

	public function delete()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_courses");
			$this->db->where(array("id_courses"=>$id));
			$this->db->delete("tbl_courses");
		endif;
		echo json_encode(array("error"=>0));
	}

	public function lesson_list()
	{
		$this->model->lesson_list($this->input->get('term'));

	}
	public function material_list()
	{
		$this->model->material_list($this->input->get('term'));

	}
	public function teacher_list()
	{
		$this->model->teacher_list($this->input->get('term'));

	}
	public function updateFoto($id)
	{
		$config['upload_path']          = './assets/backend/img/courses/';
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
            $urlSlider = base_url()."assets/backend/img/courses/".$file_name;
        }
        $data = array(
            'url_image' => $urlSlider
		);
		$this->db->where('id_courses',$id);
        $this->db->update('tbl_courses',$data);
        $this->session->set_flashdata('msg_error',"<p style='color:green;'>Data berhasil di simpan</p>");
        redirect('courses');
	}
}
?>
