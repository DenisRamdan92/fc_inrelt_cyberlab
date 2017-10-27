<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class info extends CI_Controller {


    function __construct() {
        parent::__construct();
        if($this->session->userdata('isLogin')!= true)
        {
            redirect('admin');
        }
        $this->load->model('infoModel','model');
    }

    public function index() {
        $this->template->load('tmp/backend','infoView');
    }
    public function data_list(){
    	$result = $this->model->data_list();
       	echo json_encode($result);
    }
    public function updateData()
    {
        
        $query = $this->db->get('tbl_web_info');
        $row = $query->row_array();
        $title_web = $this->input->post('title_web');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $fax = $this->input->post('fax');
        $email = $this->input->post('email');
        $this->db->query(
            "UPDATE tbl_web_info 
            SET 
            title_web = '".$title_web."',
            addreess ='".$address."', 
            phone ='".$phone."',
            fax = '".$fax."',
            email = '".$email."'
            ");
            $this->session->set_flashdata('msg_error_employee',"<p style='color:green;'>Data pegawai berhasil diubah</p>");
            redirect('backend/info');
    }
    public function updateLogo()
    {
        
        $config['upload_path']          = './assets/backend/img/logo/';
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
            $urlSlider = base_url()."assets/backend/img/logo/".$file_name;
        }
        $query = $this->db->get('tbl_web_info');
        $row = $query->row_array();
        $this->db->query(
            "UPDATE tbl_web_info 
            SET 
            logo_url='".$urlSlider."'
            ");
            $this->session->set_flashdata('msg_error_employee',"<p style='color:green;'>Data pegawai berhasil diubah</p>");
            redirect('backend/info');
    }
    public function updateMaps()
    {
        
        $query = $this->db->get('tbl_web_info');
        $row = $query->row_array();
        $maps = $this->input->post('map');
        $this->db->query(
            "UPDATE tbl_web_info 
            SET 
            maps_url='".$maps."'
            ");
            $this->session->set_flashdata('msg_error_employee',"<p style='color:green;'>Data pegawai berhasil diubah</p>");
            redirect('backend/info');
    }
}

?>
