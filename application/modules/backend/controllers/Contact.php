<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('ContactModel','model');
        $this->load->library('Template');
    }
    
    public function index(){
        $this->template->load('tmp/backend','contactView');
    }
    public function ajax_list()
	{
		if($this->input->method(TRUE)=='POST'):
		$list = $this->model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $url = "";
        foreach ($list as $data_) {
            	$no++;
                $row = array();
                $row[] = $no;
                $row[] = $data_->name;
                $row[] = $data_->email;
                $row[] = $data_->subject;
                $row[] = $data_->message;
                $row[] = "<button id='edit_btn' 
                name='".$data_->name."'
                email='".$data_->email."'
                phone='".$data_->subject."'
                id_pesan='".$data_->id_contact."' 
                message='".$data_->message."'
                class='btn btn-info waves-effect' type='button'><i class='fa fa-pencil'></i> Balas Pesan</button> <button id='delete_btn' 
                id_pesan='".$data_->id_contact."'
                class='btn btn-danger waves-effect' type='button'><i class='fa fa-trash'></i> Hapus</button>";
                $data[] = $row;
		}

		$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model->count_all(),
                        "recordsFiltered" => $this->model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
		endif;
	}

    public function send_pesan()
    {

            $this->db->select("*");
            $data_toko = $this->db->get("tbl_web_info")->row();

            $email_send = $this->input->post("email");
            $message = $this->input->post("message");
            $name = $this->input->post("name");
            $pesan = $this->input->post("pesan");
            include_once(FCPATH."application/libraries/utils/mail.php");
            $email_penerima = $email_send;
            $nama_penerima = "Contact Notif";
            $set_web_title = $data_toko->title_web;
            $web = "";
            $email =  $data_toko->email;
            $name =  $data_toko->title_web;
            $subject = "Balasan - Pesan";
            $mail->From = $email; // email pengirim
            $mail->FromName = $name; // nama pengirim
            $mail->AddAddress($email_penerima, $nama_penerima); // penerima
            $mail->AddReplyTo($email, $name); // kirim balik reply ke
            $mail->WordWrap = 50; // set word wrap
            $mail->IsHTML(true);                               // send as HTML
            $mail->Subject = $subject;
            $mail->Body .= "Salam, \n";
            $mail->Body .= "Berikut pesan yang anda kirim,\n <br>";
            $mail->Body .= "\n\n";
            $mail->Body .= " ". $message ."\n <br><br>";
            $mail->Body .= "Jawaban : ". $pesan ."\n <br>";
            $mail->Body .= "\n\n <br><br>";
            $mail->Body .= "Terimakasih telah menghubungi kami"."\n <br>";
            $mail->Body .= $set_web_title . "\n";
            $mail->Body .= $web . "\n";
            print_r($mail->send());
            exit;
            if ($mail->send()) {
                echo json_encode(array("error"=>0));
            }else{
                echo json_encode(array("error"=>1));
            }
    }
    public function kirim_pesan()
	{
		$save = $this->db->insert('tbl_contact',array(
	        "name"=>$this->input->post("name"),
	        "email"=>$this->input->post("email"),
	        "subject"=>$this->input->post("phone"),
	        "message"=>$this->input->post("message"),
	     ));
		if ($save) {
			echo json_encode(array("error"=>0));
                exit;
		}
		else{
			 echo json_encode(array("error"=>1));
                exit;
		}
	}
	public function delete(){
		if($this->input->post("id_pesan")){
			$this->db->where("id_contact",$this->input->post("id_pesan"));
			$this->db->delete("tbl_contact");
			echo 1;
		}
	}

}
?>
