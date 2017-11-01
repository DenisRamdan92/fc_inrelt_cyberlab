<?php

class MainModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    function info()
    {
        $query = $this->db->get('tbl_web_info');
        return $query->row_array();
    }  
    function socmed()
    {
        $query = $this->db->get('tbl_sosial_media');
        return $query->row_array();
    }
    function aboutus()
    {
        $query = $this->db->get('tbl_about_us');
        return $query->row_array();
    }
    function newsletter()
    {
        $email = $this->input->post('subscribe-email');
        $data  = array(
            "email" => $email
        );
        $this->db->insert('tbl_newsletter',$data);
        redirect('frontend/main');
    }
    function contactSend()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $data  = array(
            "email" => $email,
            "name" => $name,
            "subject" => $subject,
            "message" => $message
        );
        $this->db->insert('tbl_contact',$data);
        redirect('frontend/main');
    }     
}

?>
