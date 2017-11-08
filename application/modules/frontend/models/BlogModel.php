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
        $this->db->select('*, count(id_comment) as banyak_komentar');
        $this->db->from('tbl_blog a');
        $this->db->join('tbl_tag b', 'a.id_tag = b.id_tag', 'left');
        $this->db->join('tbl_comment c', 'a.id_blog = c.id_blog', 'left');
        $this->db->group_by("a.id_blog","DESC");       
        $this->db->limit($limit, $start);   
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function blog($id)
   {
       $query = $this->db->query("select *, count(id_comment) as banyak_komentar from tbl_blog a LEFT JOIN tbl_tag b ON a.id_tag = b.id_tag LEFT JOIN tbl_comment c ON a.id_blog = c.id_blog WHERE a.id_blog = '$id' group by a.id_blog");
       return $query->row_array();
   } 
   public function commentSend($id)
   {
       $content = $this->input->post('message');
       $name = $this->input->post('name');
       $date = date('Y-m-d h:i:s');
       $data = array(
           "id_blog" => $id,
           "content_comment" => $content,
           "sender" => $name,
           "create_date" => $date
       );
       $this->db->insert('tbl_comment',$data);
       redirect('frontend/blog/read/'.$id);
   }
}

?>
