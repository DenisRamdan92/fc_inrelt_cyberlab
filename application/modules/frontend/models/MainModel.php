<?php

class MainModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    function info()
    {
        $query = $this->db->get('tbl_web_info');
        return $query->row_array();
    }  
    function socmed()
    {
        $query = $this->db->get('tbl_sosial_media');
        return $query->row_array();
    }     
}

?>
