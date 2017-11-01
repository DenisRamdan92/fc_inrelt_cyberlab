<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

    function __construct() {
        parent::__construct();
        if($this->session->userdata('isLogin')!= true)
        {
            redirect('admin');
        }
        $this->load->model('TeacherModel','model');
    }

    public function index() {
        $data['datateacher'] = $this->model->teacherList();
        $this->template->load('tmp/backend', 'teacherView',$data);
    }
    public function simpan($id="")
    {
        
        $config['upload_path']          = './assets/backend/img/teacher/';
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
            $urlSlider = base_url()."assets/backend/img/teacher/".$file_name;
        }
        $tema = $this->input->post('name');
        $primarySkill = $this->input->post('primarySkill');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $facebook = $this->input->post('facebook');
        $twitter = $this->input->post('twitter');
        $linkedin = $this->input->post('linkedin');
        $youtube = $this->input->post('youtube');
        $status = $this->input->post('status');
        $karegori = $this->input->post('description');
        $data = array(
            'name' => $tema,
            'main_material' => $primarySkill,
            'telepon' => $phone,
            'email' => $email,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'linkedin' => $linkedin,
            'youtube' => $youtube,
            'status' => $status,
            'description' => $karegori,
            'url_foto' => $urlSlider
		);
		if ($id=="") {
			
			$this->db->insert('tbl_teacher',$data);

		} else {
			
			$this->db->where('id_teacher',$id);
			$this->db->update('tbl_teacher',$data);

		}
        $this->session->set_flashdata('msg_error',"<p style='color:green;'>Data berhasil di simpan</p>");
        redirect('teacher');
    }
    public function hapus($id)
    {
        $this->model->hapus($id);
    }
}

?>
