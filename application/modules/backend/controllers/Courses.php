<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('CoursesModel','model');
        $this->load->model('MaterialModel','modelMaterial');
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

}
?>
