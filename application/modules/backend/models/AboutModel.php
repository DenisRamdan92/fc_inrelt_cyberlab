<?php
    class AboutModel extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function update()
        {
            if($this->input->method(TRUE)=='POST'):
    
                $title_about = $this->input->post("title_about");
                $content = $this->input->post("content");
                $url_video = $this->input->post("url_foto");

                    $this->db->update("tbl_about_us",array(
                        "title"=>$this->input->post("title_about"),
                        "content"=>$this->input->post("content"),
                        "url_video"=>$this->input->post("url_video")
                    ));

            endif;   
            echo json_encode(array("error"=>0));
        }
        public function data_list(){
        
           $query =  $this->db->get("tbl_about_us");
           return $query->result();
               
        }
    }
    
?>