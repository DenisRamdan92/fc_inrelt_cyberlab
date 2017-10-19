<?php

class StudentModel extends CI_Model{
	public $table = "tbl_student";
	
	var $id_member = "";
	var $column_order = array(null, 'nama'); //set column field database for datatable orderable
    var $column_search = array("name","place_of_birth","date_of_birth","address","telp","email","public_username","country","gender","last_edu","insteresting_to","create_date"); //set column field database for datatable searchable 
    var $order = array('id_student' => 'desc'); // default order

	function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
    {
        // $this->db->join("tbl_mst_jabatan j","j.id_jabatan=e.id_jabatan",'left');
		// $this->db->join("tbl_mst_department d","d.id_department=e.id_department",'left');
        $tbl_storage = $this->db->get("tbl_student");
 
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
        $query = $this->db->get("tbl_student");
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get("tbl_student");
        return $query->num_rows();
    }
 
    public function count_all()
    {
		// $this->db->join("tbl_mst_jabatan j","j.id_jabatan=e.id_jabatan",'left');
		// $this->db->join("tbl_mst_department d","d.id_department=e.id_department",'left');
        $tbl_storage = $this->db->get($this->table);
        return $this->db->count_all_results();
    }

	// public function save($data = array())
	// {
	// 	return $this->db->insert($this->table,$data);
	// }

	public function delete($where = array())
	{
		return $this->db->delete($this->table,$where);
	}

	public function update($data = array())
	{
		return $this->db->update($this->table,$data);
	}

	// public function kode($y,$x)
	// {
	// 	$this->db->where("id_department",$y);
	// 	$this->db->order_by("id_employee","DESC");
	// 	$get = $this->db->get($this->table);
	// 	if($get->num_rows()<1){
	// 		$kode = "001";
	// 	}else{
	// 		$data = $get->row();
	// 		$angka = preg_match_all("!\d+!",$data->id_employee,$match);
	// 		$formatted_value = sprintf("%03d", (int)$match[0][0]+1);
	// 		$kode = $formatted_value;
	// 	}
	// 	$akronim = $x.$kode;
	// 	return $akronim;
	// }

	public function check($employee)
	{
		$this->db->where("public_username",$employee);
		$get = $this->db->get("tbl_student");
		if($get->num_rows()>0){
			exit(json_encode(array("error"=>1,"message"=>'Nama pegawai sudah ada!')));
		}else{
			echo json_encode(array("error"=>0));
		}
    }

}