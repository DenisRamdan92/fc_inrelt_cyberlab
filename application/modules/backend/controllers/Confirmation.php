<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class confirmation extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        if($this->session->userdata('isLogin')!= true)
        {
            redirect('admin');
        }
        $this->load->model('ConfirmationModel','model');
        $this->load->library('Template');
    }
    
    public function index(){
        $this->template->load('tmp/backend','confirmationView');
    }
    public function ajax_list()
	{
		if($this->input->method(TRUE)=='POST'):
		$list = $this->model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $url = "";
        foreach ($list as $data_) {
                if ($data_->isAllowed == 1) { 

                    $isActive = "btn btn-default";
                    $isColor = "fa fa-times-circle-o";
                    $isConfirm = "Tidak Ter-konfirmasi";

                } else {

                    $isActive = "btn btn-success";
                    $isColor = "fa fa-check-square-o"; 
                    $isConfirm = "Ter-konfirmasi";

                }
            	$no++;
                $row = array();
                $row[] = $no;
                $row[] = $data_->name;
                $row[] = $data_->name_bank;
                $row[] = $data_->number_registration;
                $row[] = $data_->quantity_send;
                $row[] = $data_->date_transfer;
                $row[] = $data_->information;
                $row[] = "<button id='proof_btn' 
                url_picture='".$data_->url_picture."'
                class='btn btn-info waves-effect proof_btn' type='button'><i class='fa fa-eye'></i> Bukti</button><button id='confirm_btn' 
                id_payment='".$data_->id_payment."'
                class='".$isActive." waves-effect confirm_btn' type='button' id_dtl_courses_student='".$data_->id_dtl_courses_student."'><i class='".$isColor."'></i> ".$isConfirm."</button><button id='delete_btn' 
                id_student='".$data_->id_payment."'
                class='btn btn-danger waves-effect' type='button' id_dtl_courses_student='".$data_->id_dtl_courses_student."' id_payment='".$data_->id_payment."'><i class='fa fa-trash'></i> Hapus</button>";
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
        $id_dtl_courses_student = $this->input->post("id_dtl_courses_student");
        $id_payment = $this->input->post("id_payment");
		if($this->input->post("id_dtl_courses_student")){
            
			$this->db->where("id_payment",$id_payment);
            $this->db->delete("tbl_confirm_payment");
            
            $this->db->where("id_dtl_courses_student",$id_dtl_courses_student);
            $this->db->delete('tbl_dtl_courses_student');
			echo 1;
		}
    }
    public function konfirmasi()
    {
        if($this->input->post("id_dtl_courses_student")){
            $this->db->where('id_dtl_courses_student',$this->input->post("id_dtl_courses_student"));
            $query = $this->db->get('tbl_dtl_courses_student');
            $row = $query->row_array();

            if ($row['isAllowed'] == 1) {
                $aktifdantidak = "0";
            } else {
                $aktifdantidak = "1";
            }

			$this->db->where("id_dtl_courses_student",$this->input->post("id_dtl_courses_student"));
            $data = array (
                "isAllowed" => $aktifdantidak
            );
            $this->db->update("tbl_dtl_courses_student",$data);
			echo 1;
		}  
    }

}
?>
