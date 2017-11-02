<?php

class BlogModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function record_count() {
        return $this->db->count_all("tbl_blog");
    }
    public function fetch_courses($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id_blog","DESC");
        $query = $this->db->query("select *, count(id_comment) as banyak_komentar from tbl_blog a LEFT JOIN tbl_tag b ON a.id_tag = b.id_tag LEFT JOIN tbl_comment c ON a.id_blog = c.id_blog group by a.id_blog");

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
