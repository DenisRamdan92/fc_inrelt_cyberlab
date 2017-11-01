<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        if($this->session->userdata('isLogin')!= true)
        {
            redirect('admin');
        }
        $this->load->model('NewsletterModel','model');
        $this->load->library('Template');
    }
    
    public function index(){
        $this->template->load('tmp/backend','newsletterView');
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
                $row[] = $data_->id_newsletter;
                $row[] = $data_->email;
                $row[] = "<button id='delete_btn' 
                id_newsletter='".$data_->id_newsletter."'
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

        $query = $this->db->query("SELECT * FROM tbl_newsletter");
        $result = $query->result();
        foreach($result as $res11):

            $this->db->select("*");
            $data_toko = $this->db->get("tbl_web_info")->row();

            $email_send = $res11->email;
            // $message = $this->input->post("message");
            // $name = $this->input->post("name");
            $pesan = $this->input->post("pesan");
            include_once(FCPATH."application/libraries/utils/mail.php");
            $email_penerima = $email_send;
            $nama_penerima = "Contact Notif";
            $set_web_title = $data_toko->title_web;
            $web = "";
            $email =  $data_toko->email;
            $name =  $data_toko->title_web;
            $subject = "NewsLetter";
            $mail->From = $email; // email pengirim
            $mail->FromName = $name; // nama pengirim
            $mail->AddAddress($email_penerima, $nama_penerima); // penerima
            $mail->AddReplyTo($email, $name); // kirim balik reply ke
            $mail->WordWrap = 50; // set word wrap
            $mail->IsHTML(true);                               // send as HTML
            $mail->Subject = $subject;
            $mail->Body .= "Salam, \n";
            $mail->Body .= "NewsLetter Minggu Ini dari ".$name.",\n <br>";
            $mail->Body .= "\n\n";
            $mail->Body .= "Jawaban : ". $pesan ."\n <br>";
            $mail->Body .= "\n\n <br><br>";
            $mail->Body .= "Terimakasih telah Berlangganan dengan kami"."\n <br>";
            $mail->Body .= $set_web_title . "\n";
            $mail->Body .= $web . "\n";
            print_r($mail->send());
            exit;
            if ($mail->send()) {
                echo json_encode(array("error"=>0));
            }else{
                echo json_encode(array("error"=>1));
            }

        endforeach;
    }
	public function delete(){
		if($this->input->post("id_newsletter")){
			$this->db->where("id_newsletter",$this->input->post("id_newsletter"));
			$this->db->delete("tbl_newsletter");
			echo 1;
		}
	}

}
?>
