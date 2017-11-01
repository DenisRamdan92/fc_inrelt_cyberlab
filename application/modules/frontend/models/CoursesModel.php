<?php

class CoursesModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function record_count() {
        return $this->db->count_all("tbl_courses");
    }
    public function fetch_courses($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id_courses","DESC");
        $query = $this->db->get("tbl_courses");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   } 
}

?>
