<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller{
    
    public $table = "tbl_tag";

    function __construct() {
        parent::__construct();
        if($this->session->userdata('isLogin')!= true)
        {
            redirect('admin');
        }
		$this->load->model('BlogModel','model');
		$this->load->model('BlogMainModel','modelMain');
		$this->load->model('CommentModel');
    }
    
    public function index(){
		$data['datablog'] = $this->modelMain->datablog();
        $data['datatag'] = $this->modelMain->datatag();
        $this->template->load('tmp/backend','blogView',$data);
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
	public function blogTambah()
    {
        $this->model->blogTambah();
    }
    public function edit($id)
    {
        $this->model->edit($id);
    }
    public function hapus($id)
    {
        $this->modelMain->hapus($id);
    }
    public function simpan($id="")
    {
        $config['upload_path']          = './assets/backend/img/blog/';
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
            $urlSlider = base_url()."assets/backend/img/blog/".$file_name;
        }
        $title_blog = $this->input->post("title_blog");
        $content_blog = $this->input->post("content_blog");
        $id_tag = $this->input->post("id_tag");
        $date_blog = mdate('%Y-%m-%d');
        $data = array(
            'img_url' => $urlSlider,
            'title_blog' => $title_blog,
            'content_blog' => $content_blog,
            'date_blog' => $date_blog,
            'id_tag' =>$id_tag,
            'id_user' => $this->session->userdata('username')
		);
		if ($id == "") {
			
			$this->db->insert('tbl_blog',$data);
			
		} else {
			$this->db->where('id_blog',$id);
			$this->db->update('tbl_blog',$data);
		}
        $this->session->set_flashdata('msg_error',"<p style='color:green;'>Data berhasil di simpan</p>");
        redirect('backend/blog');
    }
    public function blogEdit()
    {
        $this->model->blogEditKategori();
    }
    public function hapusKeterangan($id)
    {
        $this->model->hapusKeterangan($id);
    }

    //tags function
    public function deleteTag($id)
	{
		if($this->input->method(TRUE)=='POST'):
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

	public function insertTag($id="")
	{
		$this->modelMain->insertTag($id);
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
