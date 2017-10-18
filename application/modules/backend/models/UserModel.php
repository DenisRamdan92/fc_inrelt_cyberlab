<?php

class UserModel extends CI_Model{
	public $table = "tbl_mst_user";
	
	var $id_member = "";
	var $column_order = array(null, 'u.username'); //set column field database for datatable orderable
    var $column_search = array('u.username','e.nama','g.group_name'); //set column field database for datatable searchable 
    var $order = array('u.id_user' => 'desc'); // default order

	function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
    {
		$this->db->select("*, u.status as status_user");
        $this->db->join("tbl_mst_user_group g","g.id_group=u.id_group","left");
        $this->db->join("tbl_employee e","e.id_employee=u.id_employee","left");

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
		$this->db->join("tbl_mst_user_group g","g.id_group=u.id_group","left");
        $this->db->join("tbl_employee e","e.id_employee=u.id_employee","left");

        $this->db->from($this->table.' u');
        return $this->db->count_all_results();
    }


	public function pegawai($x)
	{
		$this->db->select("name_employee,id_employee");
		$this->db->like("name_employee",$x);
		$get = $this->db->get('tbl_employee');
		if($get->num_rows()>0){
			$g=$get->result();
			foreach($g as $ge):
			$a[] = array("itemName"=>$ge->name_employee,"id"=>$ge->id_employee);
			endforeach;
			echo json_encode($a);
		}else{
			return false;
		}
	}

	public function group($x)
	{
		$this->db->select("group_name,id_group");
		$this->db->like("group_name",$x);
		$get = $this->db->get('tbl_mst_user_group');
		if($get->num_rows()>0){
			$g=$get->result();
			foreach($g as $ge):
			$a[] = array("itemName"=>$ge->group_name,"id"=>$ge->id_group);
			endforeach;
			echo json_encode($a);
		}else{
			return false;
		}
	}

	public function check($username)
	{
		$this->db->where("username",$username);
		$get = $this->db->get($this->table);
		if($get->num_rows()>0){
			exit(json_encode(array("error"=>1,"message"=>'Username sudah ada!')));
		}else{
			//echo json_encode(array("error"=>0));
		}
	}

	public function check_another($username,$id)
	{
		$this->db->where("username",$username);
		$this->db->where("id_user <>",$id);
		$get = $this->db->get($this->table);
		if($get->num_rows()>0){
			exit(json_encode(array("error"=>1,"message"=>'Username sudah ada!')));
		}else{
			//echo json_encode(array("error"=>0));
		}
	}
	public function check_login($user, $pass) {
        $q_user = $this->db->where('username', $user)
                ->limit(1)
                ->get('tbl_mst_user');

        if ($q_user->num_rows() != 0) {
            $r_user = $q_user->row();
            $username = $r_user->username;
            $password = $r_user->password;

            if (isset($r_user)) {
                return $this->verify_pass($pass, $password);
            } else {
                return false;
            }
        } else {
            return false;
        }
	}
	//ambil data user
    public function get_user($username) {
        $q_user = $this->db->where('username', $username)
                ->limit(1)
                ->get('tbl_mst_user')->row();
        return $q_user;
    }
    
    //ref employee for user
    public function get_employee() {
        $q_user = $this->db->get('tbl_mst_employee');
        return $q_user->result();
    }
    
    //insert employee for user
    public function insert_user($user, $pass, $id_emp, $st) {
        $data = array(
            'username' =>$user,
            'password' =>password_hash($pass, PASSWORD_BCRYPT),
            'id_employee' =>$id_emp,
            'status' =>$st
        );
        $query = $this->db->insert('tbl_mst_user',$data);
        if ($query) {
            return 1;
        }else{
            return 0;
        }
    }

    public function get_user_session() {
		$id	= $this->session->user_id;
		$this->db->where("id_user",$id);
		$this->db->join("tbl_employee b","a.id_employee = b.id_employee");
        $this->db->join("tbl_mst_user_group c","a.id_group = c.id_group");
		return $this->db->get("tbl_mst_user a")->row();
	}
	//password hash ecryp
    public function verify_pass($pass, $hash) {
        if (password_verify($pass, $hash)) {
            return 1;
        } else {
            return false;
        }
    }

}