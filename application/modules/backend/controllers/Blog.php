<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller{
    
    public $table = "tbl_tag";

    function __construct() {
        parent::__construct();
		$this->load->model('BlogModel','model');
		$this->load->model('BlogMainModel','modelMain');
		$this->load->model('CommentModel');
    }
    
    public function index(){
        $this->template->load('tmp/backend','blogView');
    }
    public function tag()
    {
        $this->template->load('tmp/backend','blogTagView');
	}
	public function comment()
	{
		$this->template->load('tmp/backend','commentView');
	}

	//Blog function
	public function delete()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_blog");
			$this->db->where(array("id_blog"=>$id));
			$this->db->delete("tbl_blog");
		endif;
		echo json_encode(array("error"=>0));
	}
	public function update()
	{
		if($this->input->method(TRUE)=='POST'):

			$title_blog = $this->input->post("title_blog");
			$id_tag = $this->input->post("id_tag");
			$title_blog = $this->input->post("title_blog");
			$content_blog = $this->input->post("content_blog");
			$id_blog = $this->input->post("id_blog");
			
			$this->modelMain->check_another($title_blog,$id);


			$this->db->where(array("id_blog"=>$id));
			$this->db->update("tbl_blog",array(
				"title_blog"=>$title_blog,
				"content_blog"=>$content_blog,
				"id_tag"=>$id_tag
				));
		endif;
		echo json_encode(array("error"=>0));
	}
	public function insert()
	{
		if($this->input->method(TRUE)=='POST'):

			$id_tag = $this->input->post("id_tag");
			$title_blog = $this->input->post("title_blog");
			$content_blog = $this->input->post("content_blog");
			$date_blog = $this->input->post("date_blog");

			$this->model->check($title_blog);


			$this->db->insert("tbl_blog",array(
				"title_blog"=>$title_blog,
				"id_tag"=>$id_tag,
				"content_blog"=>$content_blog,
				"date_blog"=>$date_blog
				));
		endif;
		echo json_encode(array("error"=>0));
	}
	public function ajax_list()
	{
		if($this->input->method(TRUE)=='POST'):
		$list = $this->modelMain->get_datatables();
        $data_ = array();
        $no = $_POST['start'];
        foreach ($list as $files_) {
            $no++;
            $row = array();
			
			$row[] = $no;
			$row[] = ucfirst($files_->id_tag);
			$row[] = ucfirst($files_->title_blog);
            $row[] = ucfirst($files_->content_blog);
			$row[] = ucfirst($files_->date_blog);
			$row[] = "<button id_blog='".$files_->id_blog."' id_tag='".$files_->id_tag."' title_blog='".$files_->title_blog."' content_blog='".$files_->content_blog."' date_blog='".$files_->date_blog."' class='btn btn-info' id='edit_pengguna'><i class='fa fa-pencil'></i> Edit</button> <button id='delete_pengguna' id_blog=".$files_->id_blog."  class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button>";
			
            $data_[] = $row;


		}
		endif;
	}

    //tags function
    public function deleteTag()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_tag");
			$this->db->where(array("id_tag"=>$id));
			$this->db->delete("tbl_tag");
		endif;
	}

	public function updateTag()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_tag");
			$nip = $this->input->post("title_tag");

			$this->db->where(array("id_tag"=>$id));

			$this->db->update("tbl_tag",array(
				"title_tag"=>$nip
				));
		endif;
	}

	public function insertTag()
	{
		if($this->input->method(TRUE)=='POST'):
			
			$titleTag = $this->input->post("titleTag");

			$this->db->insert($this->table,array(
				"title_tag"=>$titleTag
				));
		endif;
	}

	public function ajax_listTag()
	{
		if($this->input->method(TRUE)=='POST'):
		$list = $this->model->get_datatablesTag();
        $data_ = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;
			$m = preg_match_all("!\D+!",$data->id_tag,$match);
			$row[] = "<button id='edit_btn' id_tag='".$data->id_tag."' title_tag='".$data->title_tag."' class='btn btn-info'><i class='fa fa-pencil'></i> Edit</button> <button id='delete_btn' id_tag='".$data->id_tag."' class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button>";
			$row[] = $no;
			$row[] = $data->id_tag;
            $row[] = ucfirst($data->title_tag);
            $data_[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model->count_allTag(),
                        "recordsFiltered" => $this->model->count_filteredTag(),
                        "data" => $data_,
                );
        //output to json format
        echo json_encode($output);
		endif;
	}
	//and tags function
	
	//comment function
	public function deleteComment()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_comment");
			$this->db->where(array("id_comment"=>$id));
			$this->db->delete("tbl_comment");
		endif;
		echo 1;
	}
	public function ajax_listComment()
	{
		if($this->input->method(TRUE)=='POST'):
		$list = $this->CommentModel->get_datatables();
        $data_ = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;
            $row = array();
			$m = preg_match_all("!\D+!",$data->id_comment,$match);
			$row[] = "<button id='delete_btn' id_comment='".$data->id_comment."' class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button>";
			$row[] = $no;
            $row[] = ucfirst($data->title_blog);
            $row[] = ucfirst($data->content_comment);
            $row[] = ucfirst($data->sender);
			/*
			$row[] = ucfirst($data->status);
			*/
            $data_[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->CommentModel->count_all(),
                        "recordsFiltered" => $this->CommentModel->count_filtered(),
                        "data" => $data_,
                );
        //output to json format
        echo json_encode($output);
		endif;
	}
}
?>
