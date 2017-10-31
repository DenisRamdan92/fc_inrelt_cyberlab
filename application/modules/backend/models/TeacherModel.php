<?php
    class TeacherModel extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function teacherList()
        {
            $query = $this->db->get('tbl_teacher');
            return $query->result_array();
        }
        public function hapus($id)
        {
            $this->db->query("DELETE FROM tbl_teacher WHERE id_teacher = '$id'");
            $this->session->set_flashdata('msg_error',"<p style='color:green;'>Data berhasil di hapus</p>");
            redirect('teacher');
        }
    }
    
?>