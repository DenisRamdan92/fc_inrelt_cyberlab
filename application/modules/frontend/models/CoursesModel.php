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
        $query = $this->db->query("select *,COUNT(a.id_courses) AS jumlah_lesson from tbl_courses a left join tbl_teacher b on a.id_teacher = b.id_teacher LEFT JOIN tbl_material c ON a.id_material = c.id_material LEFT JOIN tbl_dtl_lesson_courses d ON d.id_courses = a.id_courses GROUP BY a.id_courses");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   } 
   public function courses($id)
   {
       $query = $this->db->query("SELECT *, count(e.id_lesson) as jumlah_lesson FROM tbl_courses a left join tbl_teacher b on a.id_teacher = b.id_teacher left join tbl_material c on c.id_material = a.id_material left join tbl_dtl_lesson_courses d on a.id_courses = d.id_courses left join tbl_lesson e on d.id_lesson = e.id_lesson where a.id_courses = '$id' group by a.id_courses");
       return $query->row_array();
   }
   public function addView($id)
   {
    $this->db->where('id_courses', $id);
    $query = $this->db->get('tbl_courses');
    $row = $query->row_array();
    $viewsCourses = $row['views']+1;

    $this->db->query("UPDATE tbl_courses SET views = '$viewsCourses' WHERE id_courses = '$id'");
   }
}

?>
