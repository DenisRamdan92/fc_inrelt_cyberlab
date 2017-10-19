<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class BlogModel extends CI_Model{

    public $table = "tbl_tag";
    var $id_member = "";
	var $column_order = array(null, 'id_tag'); //set column field database for datatable orderable
    var $column_search = array("title_tag"); //set column field database for datatable searchable 
    var $order = array('id_tag' => 'desc'); // default order
    
    function __construct() {
        parent::__construct();
    }

    //tag function
    private function _get_datatables_queryTag()
    {
        // $this->db->join("tbl_mst_jabatan j","j.id_jabatan=e.id_jabatan",'left');
		// $this->db->join("tbl_mst_department d","d.id_department=e.id_department",'left');
        $tbl_storage = $this->db->get("tbl_tag");
 
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
 
    function get_datatablesTag()
    {
        $this->_get_datatables_queryTag();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get("tbl_tag");
        return $query->result();
    }
 
    function count_filteredTag()
    {
        $this->_get_datatables_queryTag();
        $query = $this->db->get("tbl_tag");
        return $query->num_rows();
    }
 
    public function count_allTag()
    {
		// $this->db->join("tbl_mst_jabatan j","j.id_jabatan=e.id_jabatan",'left');
		// $this->db->join("tbl_mst_department d","d.id_department=e.id_department",'left');
        $tbl_storage = $this->db->get("tbl_tag");
        return $this->db->count_all_results();
    }

	public function saveTag($data = array())
	{
		return $this->db->insert("tbl_tag",$data);
	}

	public function deleteTag($where = array())
	{
		return $this->db->delete("tbl_tag",$where);
	}

	public function updateTag($data = array())
	{
		return $this->db->update("tbl_tag",$data);
	}

	public function checkTag($employee)
	{
		$this->db->where("title_tag",$employee);
		$get = $this->db->get("tbl_tag");
		if($get->num_rows()>0){
			exit(json_encode(array("error"=>1,"message"=>'Nama pegawai sudah ada!')));
		}else{
			echo json_encode(array("error"=>0));
        }
        //and tag function
    }

}
?>
