<?php

class RegisterModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function cek()
    {
        $username = $this->input->post('username');
        $pass = md5($this->input->post('password'));

        $query = $this->db->query(
        "SELECT * FROM tbl_student 
        WHERE public_username='$username' AND pass = '$pass'"
        );

        $row = $query->row_array();
        $jml = $query->num_rows();
        if ($jml > 0) {
            $data = array(
                'id_student' => $row['id_student'],
                'pass' => $row['pass'],
                'name' => $row['name'],
                'url_foto' => $row['url_foto'],
                'isLoginClient' => true
            );
            $this->session->set_userdata($data);
            redirect('frontend/Profile');
        }else{
            $this->session->set_flashdata('msg_error',"Username atau Password salah");
            redirect('frontend/register');
        }
    }
}

?>
