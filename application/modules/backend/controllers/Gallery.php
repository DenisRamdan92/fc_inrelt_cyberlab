<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {


    function __construct() {
        parent::__construct();
        if($this->session->userdata('isLogin')!= true)
        {
            redirect('admin');
        }
        $this->load->model('galleryModel','model');
    }

    public function index() {
        $data['dataGaleri'] = $this->model->galleryList();
        $data['datakategori'] = $this->model->dataKategori();
        $this->template->load('tmp/backend', 'galleryView',$data);
    }
    public function simpan()
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
        $tema = $this->input->post('tema');
        $karegori = $this->input->post('kategoriList');
        $data = array(
            'nama_image' => $tema,
            'id_galeri_kategori' => $karegori,
            'url_image' => $urlSlider
        );
        $this->db->insert('tbl_gallery',$data);
        $this->session->set_flashdata('msg_error',"<p style='color:green;'>Data berhasil di simpan</p>");
        redirect('gallery');
    }
    public function hapus($id)
    {
        $this->model->hapus($id);
    }
    public function kategori()
    {
        $this->model->kategori();
    }
    public function hapuskategori($id)
    {
        $this->model->hapuskategori($id);
    }
    public function EditKategori($id)
    {
        $this->model->EditKategori($id);
    }
}

?>
