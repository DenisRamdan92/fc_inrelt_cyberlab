<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    //fungsi untuk cek data user pada database
    public function check_login($username, $password) {
        $result = $this->db->where('username', $username)
                ->where('password', $password)
                ->limit(1)
                ->get('tbl_user');
        if ($result->num_rows() != 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    //fungsi untuk get data user
    public function select_user() {
        $result = $this->db->get('tbl_user');
        return $result;
    }

}