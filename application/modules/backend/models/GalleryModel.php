<?php
    class GalleryModel extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function galleryList()
        {
            $query = $this->db->get('tbl_gallery');
            return $query->result_array();
        }
        public function hapus($id)
        {
            $this->db->query("DELETE FROM tbl_gallery WHERE id_gallery = '$id'");
            $this->session->set_flashdata('msg_error',"<p style='color:green;'>Data berhasil di hapus</p>");
            redirect('gallery');
        }
        public function dataKategori()
        {
            $query = $this->db->get('tbl_gallery_category');
            return $query->result_array();
        }
        public function kategori()
        {
            $nama = $this->input->post('kategorij');
            $data = array(
                'kategori' => $nama
            );
            $this->db->insert('tbl_gallery_category',$data);
            $this->session->set_flashdata('msg_error',"<p style='color:green;'>Data berhasil di simpan</p>");
            redirect('gallery');
        }
        public function hapuskategori($id)
        {
            $this->db->query("DELETE FROM tbl_gallery_category WHERE id_galeri_kategori = '$id'");
            $this->session->set_flashdata('msg_error',"<p style='color:green;'>Data berhasil di hapus</p>");
            redirect('gallery');
        }
        public function EditKategori($id)
        {
            $nama = $this->input->post('kategorij');
            $data = array(
                'kategori' => $nama
            );
            $this->db->where('id_galeri_kategori',$id);
            $this->db->update('tbl_gallery_category',$data);
            $this->session->set_flashdata('msg_error',"<p style='color:green;'>Data berhasil di update</p>");
            redirect('gallery');
        }
    }
    
?>