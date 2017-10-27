<?php
    class BlogMainModel extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
        }
        public function datablog()
        {
            $query = $this->db->query("SELECT a.*, b.title_tag FROM tbl_blog a LEFT JOIN tbl_tag b ON a.id_tag = b.id_tag");
            return $query->result_array();
        }
        public function edit($id)
        {
            $title_blog = $this->input->post("title_blog");
            $content_blog = $this->input->post("content_blog");
            $date_blog = mdate('%Y-%m-%d');
            $id_tag = $this->input->post("id_tag");
            $data = array(
                'title_blog' => $title_blog,
                'content_blog' =>$content_blog,
                'id_tag' => $id_tag,
                'date_blog' => $date_blog,
                'id_user' => $this->session->userdata('username')
            );
            $this->db->where('id_blog',$id);
            $this->db->update("tbl_blog",$data);
            $this->session->set_flashdata('msg_error',"<p style='color:green;'>Data berhasil di Ubah</p>");
            redirect('backend/blog');
        }
        public function hapus($id)
        {
            $this->db->query("DELETE FROM tbl_blog WHERE id_blog = '$id'");
            $this->session->set_flashdata('msg_error',"<p style='color:green;'>Data berhasil di hapus</p>");
            redirect('backend/blog');
        }
        public function datatag()
        {
            $query = $this->db->get('tbl_tag');
            return $query->result_array();
        }
        public function insertTag($id)
        {
            $tag = $this->input->post("title_tag");
            $data = array(
                'title_tag' => $tag
            );
            if ($id == "") {
                
                $this->db->insert('tbl_tag',$data);

            } else {
                $this->db->where('id_tag',$id);
                $this->db->update('tbl_tag',$data);
            }
            $this->session->set_flashdata('msg_error',"<p style='color:green;'>Data berhasil di simpan</p>");
            redirect('backend/blog');
        }
        public function blogEditTag()
        {
            $tag = $this->input->post('title_tag');
            $id_tag = $this->input->post('id_tag');
            $data = array(
                'title_tag' => $tag
            );
            $this->db->where('id_tag',$id_tag);
            $this->db->update('tbl_tag',$data);
            $this->session->set_flashdata('msg_error',"<p style='color:green;'>Data berhasil di diganti</p>");
            redirect('backend/blog');
        }
        public function hapusTag($id)
        {
            $this->db->query("DELETE FROM tbl_tag WHERE id_tag='$id'");
            $this->session->set_flashdata('msg_error',"<p style='color:green;'>Data berhasil di diganti</p>");
            redirect('backend/blog');
        }
    }
    
?>