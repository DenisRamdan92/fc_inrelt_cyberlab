<?php

class User extends CI_Controller{

	
	public $table = "tbl_mst_user";
	public $table_group = "tbl_mst_user_group";

	function __construct()
	{
		parent::__construct();
		$this->load->model("UserModel","model");
		$this->load->model("UserGroupModel","model_group");
	}

	public function index()
	{
		$data['title'] = "Master Data Pengguna";
		$this->template->load("tmp/backend","userView",$data);
	}

	public function group_pengguna()
	{
		$data['title'] = "Master Data Pengguna";
		$this->template->load("tmp/backend","userGroupView",$data);
	}
        
	public function ajax_list()
	{
		if($this->input->method(TRUE)=='POST'):
		$list = $this->model->get_datatables();
        $data_ = array();
        $no = $_POST['start'];
        foreach ($list as $files_) {
            $no++;
            $row = array();
			
			if ($files_->status_user == 1) {
				$status_user = 'Aktif';
			}
			else{
				$status_user = "Tidak Aktif";
			}
			
			$row[] = $no;
			$row[] = ucfirst($files_->name_employee);
            $row[] = ucfirst($files_->username);
			$row[] = ucfirst($files_->group_name);
			$row[] = ucfirst($status_user);

			$row[] = "<button id_user='".$files_->id_user."' username='".$files_->username."' id_employee='".$files_->id_employee."' id_group='".$files_->id_group."' nama='".$files_->name_employee."' group_name='".$files_->group_name."' status=".$files_->status_user." class='btn btn-info' id='edit_pengguna'><i class='fa fa-pencil'></i> Edit</button> <button id='delete_pengguna' id_user=".$files_->id_user."  class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button>";
			
            $data_[] = $row;


		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model->count_all(),
                        "recordsFiltered" => $this->model->count_filtered(),
                        "data" => $data_,
                );
        //output to json format
        echo json_encode($output);
		endif;
	}

	public function ajax_list_group()
	{
		if($this->input->method(TRUE)=='POST'):
		$list = $this->model_group->get_datatables();
        $data_ = array();
        $no = $_POST['start'];
        foreach ($list as $files_) {
            $no++;
            $row = array();
			
			
			$row[] = $no;
			$row[] = ucfirst($files_->group_name);

			$row[] = "<button id_group='".$files_->id_group."'  group_name='".$files_->group_name."' role='".$files_->role."' class='btn btn-info' id='edit_pengguna'><i class='fa fa-pencil'></i> Edit</button> <button id='delete_pengguna' id_group=".$files_->id_group."  class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button>";
			
            $data_[] = $row;


		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model_group->count_all(),
                        "recordsFiltered" => $this->model_group->count_filtered(),
                        "data" => $data_,
                );
        //output to json format
        echo json_encode($output);
		endif;
	}

	public function insert()
	{
		if($this->input->method(TRUE)=='POST'):

			$id_employee = $this->input->post("id_employee");
			$id_group = $this->input->post("id_group");
			$username = $this->input->post("username");
			$password = password_hash($this->input->post("password"),PASSWORD_BCRYPT);
			$status = $this->input->post("status");

			$this->model->check($username);


			$this->db->insert($this->table,array(
				"id_employee"=>$this->input->post("id_employee"),
				"id_group"=>$id_group,
				"username"=>$this->input->post('username'),
				"password"=>$password,
				"status"=>$this->input->post('status')
				));
		endif;
		echo json_encode(array("error"=>0));
	}

	public function insert_group()
	{
		if($this->input->method(TRUE)=='POST'):

			$group_name = $this->input->post("group_name");
			
			$this->model_group->check($group_name);

			$fix_role = "";
			if ($this->input->post("role")) {
				$role = $this->input->post("role");
				foreach ($role as $key) {
					$fix_role = $fix_role.$key.",";
				}

			}

			$this->db->insert($this->table_group,array(
				"group_name"=>$this->input->post("group_name"),
				"role" => $fix_role
				));
		endif;
		echo json_encode(array("error"=>0));
	}

	public function update()
	{
		if($this->input->method(TRUE)=='POST'):

			$id = $this->input->post("id_user");
			$id_employee = $this->input->post("id_employee");
			$id_group = $this->input->post("id_group");
			$username = $this->input->post("username");
			$password = password_hash($this->input->post("password"),PASSWORD_BCRYPT);
			$status = $this->input->post("status");
			
			$this->model->check_another($username,$id);


			$this->db->where(array("id_user"=>$id));
			$this->db->update($this->table,array(
				"id_employee"=>$this->input->post("id_employee"),
				"id_group"=>$id_group,
				"username"=>$this->input->post('username'),
				"password"=>$password,
				"status"=>$this->input->post('status')
				));
		endif;
		echo json_encode(array("error"=>0));
	}

	public function update_group()
	{
		if($this->input->method(TRUE)=='POST'):

			$id_group = $this->input->post("id_group");
			$group_name = $this->input->post("group_name");
			
			$this->model_group->check_another($group_name,$id_group);

			$fix_role = "";
			if ($this->input->post("role")) {
				$role = $this->input->post("role");
				foreach ($role as $key) {
					$fix_role = $fix_role.$key.",";
				}

			}

			$this->db->where(array("id_group"=>$id_group));
			$this->db->update($this->table_group,array(
				"group_name"=>$this->input->post('group_name'),
				"role" => $fix_role
				));

			$roles = explode(',',$fix_role);
            $this->session->set_userdata('roles_sess', $roles);
		endif;
		echo json_encode(array("error"=>0));
	}

	public function delete()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_user");
			$this->db->where(array("id_user"=>$id));
			$this->db->delete($this->table);
		endif;
		echo json_encode(array("error"=>0));
	}

	public function delete_group()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_group");
			$this->db->where(array("id_group"=>$id));
			$this->db->delete($this->table_group);
		endif;
		echo json_encode(array("error"=>0));
	}

	public function pegawai()
	{
		$this->model->pegawai($this->input->get('term'));

	}
	public function group()
	{
		$this->model->group($this->input->get('term'));

	}

}