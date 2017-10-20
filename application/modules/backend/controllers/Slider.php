<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->model('SliderModel','model');
    }

    public function index() {
        $data['dataSlider'] = $this->model->sliderList();
        $this->template->load('tmp/backend', 'sliderView',$data);
    }
    public function simpan()
    {
        
        $config['upload_path']          = './assets/backend/img/slider/';
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
            $urlSlider = base_url()."assets/backend/img/slider/".$file_name;
        }
        $tema = $this->input->post('tema');
        $deskripsi = $this->input->post('deskripsi');
        $idSlider = $this->input->post('urutanSlider');
        $data = array(
            'title' => $tema,
            'content' => $deskripsi,
            'url_slider' => $urlSlider
        );
        $this->db->where('id_slider',$idSlider);
        $this->db->update('tbl_slider',$data);
        redirect('backend/slider');
    }
}

?>
