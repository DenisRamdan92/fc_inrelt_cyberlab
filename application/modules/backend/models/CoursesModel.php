<?php

class CoursesModel extends CI_Model{
	public $table = "tbl_courses";
	
	var $id_member = "";
	var $column_order = array(null, 'u.title_courses'); //set column field database for datatable orderable
    var $column_search = array('u.title_courses','e.title_material','t.name'); //set column field database for datatable searchable 
    var $order = array('u.id_courses' => 'desc'); // default order

	function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
    {
		$this->db->select("*");
		$this->db->join("tbl_material e","e.id_material=u.id_material","left");
        $this->db->join("tbl_teacher t","t.id_teacher=u.id_teacher","left");

        $this->db->from($this->table.' u');
 
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
        $this->db->join("tbl_material e","e.id_material=u.id_material","left");
        $this->db->join("tbl_teacher t","t.id_teacher=u.id_teacher","left");

        $this->db->from($this->table.' u');
        return $this->db->count_all_results();
    }


	public function material_list($x)
	{
		$this->db->select("title_material,id_material");
		$this->db->like("title_material",$x);
		$get = $this->db->get('tbl_material');
		if($get->num_rows()>0){
			$g=$get->result();
			foreach($g as $ge):
			$a[] = array("itemName"=>$ge->title_material,"id"=>$ge->id_material);
			endforeach;
			echo json_encode($a);
		}else{
			return false;
		}
	}

	public function lesson_list($x)
	{
		$this->db->select("title_lesson,id_lesson");
		$this->db->like("title_lesson",$x);
		$get = $this->db->get('tbl_lesson');
		if($get->num_rows()>0){
			$g=$get->result();
			foreach($g as $ge):
			$a[] = array("itemName"=>$ge->title_lesson,"id"=>$ge->id_lesson);
			endforeach;
			echo json_encode($a);
		}else{
			return false;
		}
	}
	public function teacher_list($x)
	{
		$this->db->select("name,id_teacher");
		$this->db->like("name",$x);
		$get = $this->db->get('tbl_teacher');
		if($get->num_rows()>0){
			$g=$get->result();
			foreach($g as $ge):
			$a[] = array("itemName"=>$ge->name,"id"=>$ge->id_teacher);
			endforeach;
			echo json_encode($a);
		}else{
			return false;
		}
	}
	public function check($username)
	{
		$this->db->where("title_courses",$username);
		$get = $this->db->get($this->table);
		if($get->num_rows()>0){
			exit(json_encode(array("error"=>1,"message"=>'Username sudah ada!')));
		}else{
			//echo json_encode(array("error"=>0));
		}
	}
	//ambil data pelajaran
    public function get_courses($courses) {
        $q_user = $this->db->where('title_courses', $courses)
                ->limit(1)
                ->get('tbl_courses')->row();
        return $q_user;
    }
    
    //ref employee for user
    public function get_material() {
        $q_user = $this->db->get('tbl_material');
        return $q_user->result();
	}
	public function get_teacher() {
        $q_user = $this->db->get('tbl_teacher');
        return $q_user->result();
    }
    public function check_another($username,$id)
	{
		$this->db->where("title_courses",$username);
		$this->db->where("id_courses <>",$id);
		$get = $this->db->get($this->table);
		if($get->num_rows()>0){
			exit(json_encode(array("error"=>1,"message"=>'Username sudah ada!')));
		}else{
			//echo json_encode(array("error"=>0));
		}
	}
	public function pelajaran($id)
	{
		$query = $this->db->query("select * from tbl_dtl_lesson_courses a LEFT JOIN tbl_lesson b ON a.id_lesson = b.id_lesson where id_courses='$id'");
		return $query->result_array();
	}
	public function simpanPelajaran()
	{
		$id_courses = $this->input->post('id_coursesModal');
		$id_lesson = $this->input->post('id_lesson');
		$query = $this->db->query("SELECT * FROM tbl_dtl_lesson_courses WHERE id_lesson = '$id_lesson' AND id_courses='$id_courses'");
		$jml = $query->num_rows();
		$data = array(
			'id_lesson' => $id_lesson,
			'id_courses' => $id_courses
		);
		if($jml < 1)
		{

			$this->db->insert('tbl_dtl_lesson_courses',$data);
		
		}
		
		redirect('courses');
		
	}

	public function deletePelajaran()
	{
		$id_courses = $this->input->post('id_courses');
		$id_lesson = $this->input->post('id_lesson');
		$this->db->query("DELETE FROM tbl_dtl_lesson_courses WHERE id_lesson='$id_lesson' AND id_courses='$id_courses'");
		echo 1;
	}

}