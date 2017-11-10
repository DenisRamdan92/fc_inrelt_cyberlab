<?php

class CoursesModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function record_count() {
        return $this->db->count_all("tbl_courses");
    }
    public function record_count1($id) {
        $this->db->where('id_material',$id);
        return $this->db->count_all("tbl_courses");
    }
    public function fetch_courses($limit, $start) {
        $this->db->select('*,COUNT(a.id_courses) AS jumlah_lesson');
        $this->db->from('tbl_courses a');
        $this->db->join('tbl_teacher b', 'a.id_teacher = b.id_teacher', 'left');
        $this->db->join('tbl_material c', 'a.id_material = c.id_material', 'left');
        $this->db->join('tbl_dtl_lesson_courses d', 'd.id_courses = a.id_courses', 'left');
        $this->db->group_by("a.id_courses","DESC");       
        $this->db->limit($limit, $start);   
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function fetch_courses1($limit, $start, $id) {
        // $this->db->where('c.id_matderial',$id);
        // $this->db->limit;
        // $this->db->order_by("id_courses","DESC");
        // $query = $this->db->query("select *,COUNT(a.id_courses) AS jumlah_lesson from tbl_courses a left join tbl_teacher b on a.id_teacher = b.id_teacher LEFT JOIN tbl_material c ON a.id_material = c.id_material LEFT JOIN tbl_dtl_lesson_courses d ON d.id_courses = a.id_courses WHERE a.id_material = '$id' ORDER BY a.id_courses DESC limit $limit");
        $query = $this->db->query("select *,COUNT(a.id_courses) AS jumlah_lesson from tbl_courses a left join tbl_teacher b on a.id_teacher = b.id_teacher LEFT JOIN tbl_material c ON a.id_material = c.id_material LEFT JOIN tbl_dtl_lesson_courses d ON d.id_courses = a.id_courses where a.id_material = '$id' GROUP BY a.id_courses limit $limit");


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    } 
   public function courses($id)
   {
       $query = $this->db->query("SELECT *, count(e.id_lesson) as jumlah_lesson FROM tbl_courses a left join tbl_teacher b on a.id_teacher = b.id_teacher left join tbl_material c on c.id_material = a.id_material left join tbl_dtl_lesson_courses d on a.id_courses = d.id_courses left join tbl_lesson e on d.id_lesson = e.id_lesson where a.id_courses = '$id' group by a.id_courses");
       return $query->row_array();
   }
   public function addView($id)
   {
    $this->db->where('id_courses', $id);
    $query = $this->db->get('tbl_courses');
    $row = $query->row_array();
    $viewsCourses = $row['views']+1;

    $this->db->query("UPDATE tbl_courses SET views = '$viewsCourses' WHERE id_courses = '$id'");
   }
   public function addDetail($id,$id_student,$price)
   {
       if ($price != "") {
           $aktif = 1;
       } else {
           $aktif = 0;
       }
       $data = array (
           "id_courses" =>$id,
           "id_student" =>$id_student,
           "date" => mdate('%Y-%m-%d'),
           "isAllowed" => $aktif
       );
       $this->db->insert('tbl_dtl_courses_student',$data);
   }
   public function readLesson($id)
   {
       $this->db->where('id_lesson',$id);
       $query = $this->db->get('tbl_lesson'); 
   }
   public function payment0($paymentNUmber)
   {
    $data = array (
        "number_registration" => $paymentNUmber,
        "id_student" => $this->session->userdata('id_student')
    );

    $this->db->insert('tbl_confirm_payment', $data);

    $this->db->select("*");
    $data_toko = $this->db->get("tbl_web_info")->row();

    $email_send = $this->session->userdata("email");
    $message = $paymentNUmber;
    $name = $this->session->userdata("name");
    $pesan = "pesan";
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
    $mail->Body .= "Hallo, \n";
    $mail->Body .= "This is your Confirmation Number,\n <br><br>";
    $mail->Body .= "\n\n";
    $mail->Body .= " "."<h5>".$message."</h5>"."\n <br><br>";
    $mail->Body .= "Please login to your account and input the number"."\n <br>";
    $mail->Body .= "and wait our team to process your registration"."\n <br>";
    $mail->Body .= "Thank you for registration"."\n <br>";
    $mail->Body .= $set_web_title . "\n";
    $mail->Body .= $web . "\n";
    $mail->send();
  
   }
    
}

?>
