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
}

?>
