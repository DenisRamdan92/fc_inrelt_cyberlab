<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {


    function __construct() {
        parent::__construct();
        if($this->session->userdata('isLogin')!= true)
        {
            redirect('admin');
        }
        $this->load->model('EmployeeModel','model');
    }

    public function index() {
        $data['dataemployee'] = $this->model->data_list();
        $this->template->load('tmp/backend','employeeView',$data);
    }
    public function simpan($id="")
    {
        $config['upload_path']          = './assets/backend/img/employee/';
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
            $urlSlider = base_url()."assets/backend/img/employee/".$file_name;
        }
        $query = $this->db->get('tbl_employee');
        $jml = $query->num_rows();
		$row = $query->row_array();
		
        $name_employee = $this->input->post('name_employee');
        $place_of_birth = $this->input->post('place_of_birth');
        $date_of_birth = $this->input->post('date_of_birth');
        $address = $this->input->post('address');
        $telp = $this->input->post('telp');
        $email = $this->input->post('email');
        $nip = $this->input->post('nip');
        $no_ktp = $this->input->post('no_ktp');
        $sex = $this->input->post('sex');
        $religion = $this->input->post('religion');
        $education = $this->input->post('education');
        $status = $this->input->post('status');
        $data = array(
            'name_employee' => $name_employee,
            'place_of_birth' => $place_of_birth,
            'date_of_birth' => $date_of_birth,
            'address' => $address,
            'telp' => $telp,
            'email' => $email,
            'nip' => $nip,
            'no_ktp' => $no_ktp,
            'sex' => $sex,
            'religion' => $religion,
            'education' => $education,
            'status' => $status,
            'url_foto' => $urlSlider
		);
		if ($id=="") {
			
			$this->db->insert('tbl_employee',$data);

		} else {
			
			$this->db->update('tbl_employee',$data);
		}
        $this->session->set_flashdata('msg_error_employee',"<p style='color:green;'>Data berhasil di simpan</p>");
        redirect('backend/employee');
    }
}

?>
