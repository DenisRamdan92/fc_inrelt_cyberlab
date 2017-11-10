<?php

class ConfirmationModel extends CI_Model{
	public $table = "tbl_confirm_payment";
	
	var $id_member = "";
	var $column_order = array('name','name_bank','bumber_registration','quantity_send'); //set column field database for datatable orderable
    var $column_search = array('name','name_bank','bumber_registration','quantity_send'); //set column field database for datatable searchable 
    var $order = array('id_payment' => 'desc'); // default order

	function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
    {
        $this->db->join("tbl_dtl_courses_student","tbl_dtl_courses_student.id_student=tbl_confirm_payment.id_student",'left');
        $this->db->join("tbl_bank","tbl_bank.id_bank = tbl_confirm_payment.id_bank",'left');
        $this->db->join("tbl_student","tbl_student.id_student = tbl_confirm_payment.id_student");

        // $tbl_storage = $this->db->from("tbl_confirm_payment a,tbl_dtl_courses_student b, tbl_bank c, tbl_student d");
        $tbl_storage = $this->db->from("tbl_confirm_payment");
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if(@$_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

   
 
    public function count_all()
    {
        $tbl_storage = $this->db->from($this->table);
        return $this->db->count_all_results();
    }

}