<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class offer extends CI_Controller {


    function __construct() {
        parent::__construct();
        if($this->session->userdata('isLogin')!= true)
        {
            redirect('admin');
        }
        $this->load->model('OfferModel','model');
    }

    public function index() {
        $data['dataOffer'] = $this->model->sliderList();
        $this->template->load('tmp/backend', 'offerView',$data);
    }
    public function simpan($id="")
    {
        
        $config['upload_path']          = './assets/backend/img/offer/';
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
            $urlSlider = base_url()."assets/backend/img/offer/".$file_name;
        }
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $data = array(
            'title' => $title,
            'content' => $content,
            'url_foto' => $urlSlider
        );
        if ($id == "") {        
            $this->db->insert('tbl_offer',$data); 
        } else {
            $this->db->where('id_offer',$id);
            $this->db->update('tbl_offer',$data); 
        }
        redirect('backend/offer');
    }
    public function delete($id)
    {
        $this->model->delete($id);
        redirect('backend/offer');
    }
}

?>
