<?php

class BlogMainModel extends CI_Model{
	public $table = "tbl_blog";
	
	var $id_member = "";
	var $column_order = array(null, 'id_blog'); //set column field database for datatable orderable
    var $column_search = array('title_blog','id_tag'); //set column field database for datatable searchable 
    var $order = array('id_blog' => 'desc'); // default order

	function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
    {
		// $this->db->select("*");
        // $this->db->join("tbl_tag e","e.id_tag=u.id_tag","left");
        //     // $this->db->query("SELECT * FROM tbl_blog u LEFT JOIN tbl_tag e ON u.id_tag = e.id_tag");
        // $this->db->from($this->table.' u');
        $this->db->get('tbl_blog');
 
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
				$query = $this->db->get("tbl_blog");
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
        // $this->db->join("tbl_tag e","e.id_tag=u.id_tag","left");

        // $this->db->from($this->table.' u');
        $this->db->get('tbl_blog');
        return $this->db->count_all_results();
    }


	public function tag_list($x)
	{
		$this->db->select("title_tag,id_tag");
		$this->db->like("title_tag",$x);
		$get = $this->db->get('tbl_tag');
		if($get->num_rows()>0){
			$g=$get->result();
			foreach($g as $ge):
			$a[] = array("itemName"=>$ge->title_tag,"id"=>$ge->id_tag);
			endforeach;
			echo json_encode($a);
		}else{
			return false;
		}
	}

	public function check($username)
	{
		$this->db->where("title_tag",$username);
		$get = $this->db->get($this->table);
		if($get->num_rows()>0){
			exit(json_encode(array("error"=>1,"message"=>'Username sudah ada!')));
		}else{
			//echo json_encode(array("error"=>0));
		}
	}
	//ambil data pelajaran
    public function get_blog($courses) {
        $q_user = $this->db->where('title_blog', $courses)
                ->limit(1)
                ->get('tbl_blog')->row();
        return $q_user;
    }
    
    public function check_another($username,$id)
	{
		$this->db->where("title_blog",$username);
		$this->db->where("id_tag <>",$id);
		$get = $this->db->get($this->table);
		if($get->num_rows()>0){
			exit(json_encode(array("error"=>1,"message"=>'Username sudah ada!')));
		}else{
			//echo json_encode(array("error"=>0));
		}
	}

}