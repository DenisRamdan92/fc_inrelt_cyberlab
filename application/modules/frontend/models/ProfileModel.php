<?php

class ProfileModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function student()
    {
        $id = $this->session->userdata('id_student');
        $this->db->where('id_student',$id);
        $query = $this->db->get('tbl_student');
        return $query->row_array();
    }
    public function record_count() {
        $this->db->where('id_student',$this->session->userdata('id_student'));
        return $this->db->count_all_results("tbl_dtl_courses_student");
    }
    public function fetch_courses($limit, $start) {
        $this->db->select('*,COUNT(a.id_courses) AS jumlah_lesson');
        $this->db->from('tbl_courses a');
        $this->db->join('tbl_teacher b', 'a.id_teacher = b.id_teacher', 'left');
        $this->db->join('tbl_material c', 'a.id_material = c.id_material', 'left');
        $this->db->join('tbl_dtl_lesson_courses d', 'd.id_courses = a.id_courses', 'left');
        $this->db->join('tbl_dtl_courses_student e', 'e.id_courses = a.id_courses', 'left');
        $this->db->where('e.id_student',$this->session->userdata('id_student'));
        $this->db->where('e.date',mdate('%Y-%m-%d'));
        $this->db->group_by("a.id_courses","DESC");       
        $this->db->limit($limit, $start);   
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
}

?>
