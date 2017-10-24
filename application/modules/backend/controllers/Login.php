<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel','model');
    }

    public function index() {
        
        $this->load->view('loginView');
    }

    public function login() {
        $validation_rules = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required',
                'errors' => array('required' => 'belum diisi !')
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required',
                'errors' => array('required' => 'belum diisi !')
            )
        );

        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {

            $user = $this->input->post('username');
            $pass = $this->input->post('password');
            $is_valid_data = $this->model->check_login($user, $pass);

            if ($is_valid_data != false) {
                $id_user = $this->model->get_user($user);
                $this->session->set_userdata('user_id', $id_user->id_user);
                $this->session->set_userdata('employee_id', $id_user->id_employee);
                $this->session->set_userdata('username', $id_user->username);
                
                $session_user = $this->model->get_user_session();
                $roles = explode(',',$session_user->role);
                $this->session->set_userdata('roles_sess', $roles);
                $this->session->set_userdata('id_group', $session_user->id_group);
                $this->session->set_userdata('id_unit', $session_user->id_unit);
                $this->session->set_userdata('nama_unit', $session_user->nama_unit);
                redirect('backend/main');
            } else {
                $error = 'Pengguna atau Kata sandi salah.';
                $this->session->set_flashdata('msg_error_login', $error);
                $this->load->view('loginView');
            }
        }
    }

    public function ref_employee() {
        $data['emply'] = $this->model->get_employee();
        $this->load->view('user', $data);
    }

    public function save_user() {
        $validation_rules = array(
            array('field' => 'username', 'label' => 'Username', 'rules' => 'trim|required', 'errors' => array('required' => ' belum diisi !')
            ),
            array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required', 'errors' => array('required' => ' belum diisi !')
            ),
            array('field' => 'repassword', 'label' => 'Repassword', 'rules' => 'trim|required|matches[password]', 'errors' => array('required' => 'belum diisi !', 'matches' => 'sandi, tidak cocok !')
            ),
            array('field' => 'id_employee', 'label' => 'Id_employee', 'rules' => 'trim|required', 'errors' => array('required' => 'belum dipilih !')
            ),
            array('field' => 'status', 'label' => 'Status', 'rules' => 'trim|required', 'errors' => array('required' => 'belum dipilih !')
            )
        );

        $this->form_validation->set_rules($validation_rules);
        if ($this->form_validation->run() == false) {
           $arr = array("username"=>form_error("username"),
                        "password"=>form_error("password"),
                        "repassword"=>form_error("repassword"),
                        "id_employee"=>form_error("id_employee"),
                        "status"=>form_error("status")
                        );
           echo json_encode($arr);
            
        } else {
            $user = $this->input->post('username');
            $pass = $this->input->post('password');
            $id_emp = $this->input->post('id_employee');
            $st = $this->input->post('status');
            $cek = $this->model->insert_user($user, $pass, $id_emp, $st);
            if ($cek == 1) {
                $error = 'Berhasil Data simpan.';
                $this->session->set_flashdata('msg_error_login', $error);
                $arrs = array('cek1' => '1');
                echo json_encode($arrs);
            }else{

            }
              
        }
    }

    public function get_session() {
		$id	= $this->session->user_id;
		$this->model->get_user_session();
    }

    public function logout() {
        header ("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");  
        header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
        header ("Cache-Control: no-cache, must-revalidate");  
        header ("Pragma: no-cache");
        $this->session->sess_destroy();
        redirect('login');
    }

}

?>
