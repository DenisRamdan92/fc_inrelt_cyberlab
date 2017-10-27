<?php
    class EmployeeModel extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function data_list(){
        
           $query =  $this->db->get('tbl_employee');
           return $query->result_array();
               
        }
    }
    
?>