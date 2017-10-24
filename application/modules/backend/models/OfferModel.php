<?php
    class OfferModel extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function sliderList()
        {
            $query = $this->db->get('tbl_offer');
            return $query->result_array();
        }
        public function delete($id)
        {
            $this->db->where('id_offer',$id);
            $this->db->delete('tbl_offer');
        }
    }
    
?>