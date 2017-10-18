<?php

class Employee extends CI_Controller{

	
	public $table = "tbl_employee";

	function __construct()
	{
		parent::__construct();
		$this->load->model("EmployeeModel","model");
	}

	public function index()
	{
		$data['title'] = "Master Data Pegawai";
		$this->template->load("tmp/backend","employeeView",$data);
	}

	public function delete()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_employee");
			$this->db->where(array("id_employee"=>$id));
			$this->db->delete("tbl_employee");
		endif;
	}

	public function update()
	{
		if($this->input->method(TRUE)=='POST'):
			$id = $this->input->post("id_employee");
			$nip = $this->input->post("nip");
			$nokktp = $this->input->post("nokktp");
			$nama = $this->input->post("nama");
			$agama = $this->input->post("agama");
			$tmp = $this->input->post("tmp");
			$tgl = $this->input->post("tgl");
			$al = $this->input->post("al");
			$tel = $this->input->post("tel");
			$em = $this->input->post("em");
			$stat = $this->input->post("stat");
            $jns = $this->input->post("jns");
            $edu = $this->input->post("edu");

			$this->db->where(array("id_employee"=>$id));

			$this->db->update("tbl_employee",array(
				"nip"=>$nip,
				"no_ktp"=>$nokktp,
				"name_employee"=>$nama,
				"religion"=>$agama,
				"place_of_birth"=>$tmp,
				"date_of_birth"=>$tgl,
				"address"=>$al,
				"telp"=>$tel,
				"email"=>$em,
				"status"=>$stat,
                "sex"=>$jns,
                "education"=>$edu,
				));
		endif;
	}

	public function insert()
	{
		if($this->input->method(TRUE)=='POST'):
			
			$nip = $this->input->post("nip");
			$nokktp = $this->input->post("nokktp");
			$nama = $this->input->post("nama");
			$agama = $this->input->post("agama");
			$tmp = $this->input->post("tmp");
			$tgl = $this->input->post("tgl");
			$al = $this->input->post("al");
			$tel = $this->input->post("tel");
			$em = $this->input->post("em");
			$stat = $this->input->post("stat");
            $jns = $this->input->post("jns");
            $edu = $this->input->post("edu");

			
			$this->model->check($nama);

			$this->db->insert($this->table,array(
				"nip"=>$nip,
				"no_ktp"=>$nokktp,
				"name_employee"=>$nama,
				"religion"=>$agama,
				"place_of_birth"=>$tmp,
				"date_of_birth"=>$tgl,
				"address"=>$al,
				"telp"=>$tel,
				"email"=>$em,
				"status"=>$stat,
                "sex"=>$jns,
                "education"=>$edu,
				));
		endif;
	}

	public function ajax_list()
	{
		if($this->input->method(TRUE)=='POST'):
		$list = $this->model->get_datatables();
        $data_ = array();
        $no = $_POST['start'];
        foreach ($list as $data) {
            $no++;
            $row = array();
            if ($data->status == 1) {
                $statusstr = "Aktif";
            } else {
                $statusstr = "Tidak Aktif";
            }
			$m = preg_match_all("!\D+!",$data->id_employee,$match);
			$row[] = "<button id='edit_btn' jns='".$data->sex."' no_ktp='".$data->no_ktp."' edu='".$data->education."' tmp='".$data->place_of_birth."'nip='".$data->nip."' agama='".$data->religion."' tgl='".$data->date_of_birth."' id_employee='".$data->id_employee."' nama='".$data->name_employee."' telepon='".$data->telp."' alamat='".$data->address."' email='".$data->email."' status='".$data->status."' class='btn btn-info'><i class='fa fa-pencil'></i> Edit</button> <button id='delete_btn' id_employee='".$data->id_employee."' class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button>";
			$row[] = $no;
			$row[] = ucfirst($data->id_employee);
            $row[] = ucfirst($data->nip);
            $row[] = ucfirst($data->no_ktp);
			$row[] = ucfirst($data->name_employee);
			$row[] = ucfirst($data->religion);
			$row[] = ucfirst($data->education);
			$row[] = ucfirst($data->place_of_birth);
			$row[] = ucfirst($data->date_of_birth);
			$row[] = ucfirst($data->sex);
			$row[] = ucfirst($data->address);
			$row[] = ucfirst($data->telp);
			$row[] = ucfirst($data->email);
            $row[] = $statusstr;
			/*
			$row[] = ucfirst($data->status);
			*/
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
}