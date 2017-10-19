<?php
    class SocmedModel extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function update()
        {
            if($this->input->method(TRUE)=='POST'):
    
                $facebook = $this->input->post("facebook");
                $twitter = $this->input->post("twitter");
                $instagram = $this->input->post("linkedin");
                $id = $this->input->post("google_plus");
                    $this->db->update("tbl_sosial_media",array(
                        "facebook"=>$this->input->post("facebook"),
                        "twitter"=>$this->input->post("twitter"),
                        "linkedin"=>$this->input->post("linkedin"),
                        "google_plus"=>$this->input->post("google_plus")
                    ));
            endif;   
            echo json_encode(array("error"=>0));
        }
        public function data_list(){
        
           $query =  $this->db->get("tbl_sosial_media");
           return $query->result();
               
        }
    }
    
?>