<?php

class UserGroupModel extends CI_Model{
	public $table = "tbl_mst_user_group";
	
	var $id_member = "";
	var $column_order = array(null, 'g.id_group'); //set column field database for datatable orderable
    var $column_search = array('g.group_name'); //set column field database for datatable searchable 
    var $order = array('g.id_group' => 'desc'); // default order

	function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
    {
		$this->db->select("*");

        $this->db->from($this->table.' g');
 
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

        $this->db->from($this->table.' g');
        return $this->db->count_all_results();
    }



	public function check($group_name)
	{
		$this->db->where("group_name",$group_name);
		$get = $this->db->get($this->table);
		if($get->num_rows()>0){
			exit(json_encode(array("error"=>1,"message"=>'Nama Group sudah ada!')));
		}else{
			//echo json_encode(array("error"=>0));
		}
	}

	public function check_another($group_name,$id)
	{
		$this->db->where("group_name",$group_name);
		$this->db->where("id_group <>",$id);
		$get = $this->db->get($this->table);
		if($get->num_rows()>0){
			exit(json_encode(array("error"=>1,"message"=>'Nama Group sudah ada!')));
		}else{
			//echo json_encode(array("error"=>0));
		}
	}

}