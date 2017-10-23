<?php

class LessonModel extends CI_Model{
    public $table = "tbl_lesson";
	
	var $id_member = "";
	var $column_order = array(null, 'nama'); //set column field database for datatable orderable
    var $column_search = array("id_lesson","title_lesson","content_lesson","leng_time","leveling","url_video"); //set column field database for datatable searchable 
    var $order = array('id_lesson' => 'desc'); // default order

	function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
    {
        $tbl_storage = $this->db->get($this->table);
 
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
        $query = $this->db->get('tbl_lesson');
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get('tbl_lesson');
        return $query->num_rows();
    }
 
    public function count_all()
    {
		$tbl_storage = $this->db->get($this->table);
        return $this->db->count_all_results();
    }

	public function save($data = array())
	{
		return $this->db->insert($this->table,$data);
	}

	public function delete($where = array())
	{
		return $this->db->delete($this->table,$where);
	}

	public function update($data = array())
	{
		return $this->db->update($this->table,$data);
	}
	public function check($employee)
	{
		$this->db->where("title_lesson",$employee);
		$get = $this->db->get($this->tablel);
		if($get->num_rows()>0){
			exit(json_encode(array("error"=>1,"message"=>'Nama lesson sudah ada!')));
		}else{
			echo json_encode(array("error"=>0));
		}
    }

}