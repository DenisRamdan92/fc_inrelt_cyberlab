<?php
    class infoModel extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function data_list(){
            
               $query =  $this->db->get("tbl_web_info");
               return $query->result();     
        }
    }
    
?>