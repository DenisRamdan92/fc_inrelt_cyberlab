<?php

class Tags extends CI_Controller{

	
	public $table = "tbl_tag";

	function __construct()
	{
		parent::__construct();
		$this->load->model("tagModel","model");
	}

	public function index()
	{
		$data['title'] = "Master Data Pegawai";
		$this->template->load("tmp/backend","tagsView",$data);
	}

	public function delete()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_tag");
			$this->db->where(array("id_tag"=>$id));
			$this->db->delete("tbl_tag");
		endif;
	}

	public function update()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_tag");
			$title_tag = $this->input->post("title_tag");

			$this->db->where(array("id_tag"=>$id));

			$this->model->check($title_tag);

			$this->db->update("tbl_tag",array(
				"title_tag"=>$title_tag
				));
		endif;
	}

	public function insert()
	{
		if($this->input->method(TRUE)=='POST'):
			
			$title_tag = $this->input->post("title_tag");

			$this->db->where("title_tag",$title_tag);
			$get = $this->db->get("tbl_tag");
			if($get->num_rows()>0){
				exit(json_encode(array("error"=>1,"message"=>'Nama pegawai sudah ada!')));
			}else{
				$this->db->insert("tbl_tag",array(
					"title_tag"=>$title_tag
				));
			}
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
            // if ($data->status == 1) {
            //     $statusstr = "Aktif";
            // } else {
            //     $statusstr = "Tidak Aktif";
            // }
			$m = preg_match_all("!\D+!",$data->id_tag,$match);
			$row[] = "<button id='edit_btn' id_tag='".$data->id_tag."' title_tag='".$data->title_tag."' class='btn btn-info'><i class='fa fa-pencil'></i> Edit</button> <button id='delete_btn' id_tag='".$data->id_tag."' class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button>";
            $row[] = strtoupper($data->title_tag);
            // $row[] = $statusstr;
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