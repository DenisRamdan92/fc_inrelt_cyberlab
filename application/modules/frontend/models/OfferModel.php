<?php

class OfferModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function offer($id)
    {
        $this->db->where('id_offer',$id);
        $query = $this->db->get('tbl_offer');
        return $query->row_array();
    }
}

?>
