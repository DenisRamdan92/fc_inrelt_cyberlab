<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller{
    
    public $table = "tbl_tag";

    function __construct() {
        parent::__construct();
        $this->load->model('BlogModel','model');
    }
    
    public function index(){
        $this->template->load('tmp/backend','blogView');
    }
    public function tag()
    {
        $this->template->load('tmp/backend','blogTagView');
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

}
?>
