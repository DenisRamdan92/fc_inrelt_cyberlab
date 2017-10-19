<?php

class Teacher extends CI_Controller{

	
	public $table = "tbl_teacher";

	function __construct()
	{
		parent::__construct();
		$this->load->model("TeacherModel","model");
	}

	public function index()
	{
		$data['title'] = "Master Data Pegawai";
		$this->template->load("tmp/backend","teacherView",$data);
	}

	public function delete()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_teacher");
			$this->db->where(array("id_teacher"=>$id));
			$this->db->delete("tbl_teacher");
		endif;
	}

	public function update()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_teacher");
			$name_student = $this->input->post("id_courses");
			$username = $this->input->post("name_teacher");
			$jns = $this->input->post("description");
			$tmp = $this->input->post("url_foto");
			$tgl = $this->input->post("tgl");
			$negara = $this->input->post("negara");
			$al = $this->input->post("alamat");
			$edu = $this->input->post("edu");
			$tel = $this->input->post("tel");
			$em = $this->input->post("em");
			$tertarikpada = $this->input->post("tertarikpada");

			$this->db->where(array("id_student"=>$id));

			$this->db->update("tbl_student",array(
				"name"=>$name_student,
				"place_of_birth"=>$tmp,
				"date_of_birth"=>$tgl,
				"address"=>$al,
				"telp"=>$tel,
				"email"=>$em,
				"public_username"=>$username,
                "country"=>$negara,
                "gender"=>$jns,
                "last_edu"=>$edu,
                "insteresting_to"=>$tertarikpada
				));
		endif;
	}

	public function ajax_list()
	{
		if($this->input->method(TRUE)=='POST'):
		$list = $this->model->get_datatables();
        $data_ = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;
            $row = array();
			$m = preg_match_all("!\D+!",$data->id_student,$match);
			$row[] = "<button id='edit_btn' id_teacher='".$data->id_teacher."' id_courses='".$data->id_courses."' name_teacher='".$data->name."' decription='".$data->description."' url_foto='".$data->url_foto."' address='".$data->address."' telp='".$data->telp."' email='".$data->email."' public_username='".$data->public_username."' country='".$data->country."' gender='".$data->gender."' last_edu='".$data->last_edu."' insteresting_to='".$data->insteresting_to."' class='btn btn-info'><i class='fa fa-pencil'></i> Edit</button> <button id='delete_btn' id_student='".$data->id_student. "' name_student='".$data->name."' class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button>";
			$row[] = $no;
			$row[] = ucfirst($data->id_student);
            $row[] = ucfirst($data->name);
            $row[] = ucfirst($data->public_username);
			$row[] = ucfirst($data->place_of_birth);
			$row[] = ucfirst($data->date_of_birth);
			$row[] = ucfirst($data->country);
			$row[] = ucfirst($data->gender);
			$row[] = ucfirst($data->address);
			$row[] = ucfirst($data->last_edu);
			$row[] = ucfirst($data->insteresting_to);
			$row[] = ucfirst($data->telp);
			$row[] = ucfirst($data->email);
            $row[] = ucfirst($data->create_date);
			/*
			$row[] = ucfirst($data->status);
			*/
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
}