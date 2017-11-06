<?php

class TeacherModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function record_count() {
        return $this->db->count_all("tbl_teacher");
    }
    public function fetch_courses($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id_teacher","DESC");
        $query = $this->db->get("tbl_teacher");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function teacher($id)
   {
        $this->db->where('id_teacher',$id);
        $query = $this->db->get('tbl_teacher');
        return $query->row_array();
    }
}

?>
