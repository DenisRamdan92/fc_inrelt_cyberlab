<?php
    class SliderModel extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function sliderList()
        {
            $query = $this->db->get('tbl_slider');
            return $query->result_array();
        }
    }
    
?>