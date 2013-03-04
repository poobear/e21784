<?php

class validates extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('student');
	}
	function index(){
		if(!$this->session->userdata('student_id'))
			redirect(base_url()."auth");
		$student_id = $this->session->userdata('student_id');
		$student = $this->student->get_student($student_id);
		if($student['validated'] == 1){
			redirect(base_url()."home");
		}
		$data = array();
		$data['student_id'] = $student_id;
		$data['result'] = "";
		if($_POST){
			$this->load->library('form_validation');
			$email = $this->input->post('email');
			if($this->student->is_unique_email($student_id,$email) != 0){
				$data['result'] = 'invalid';
			} else {
				$this->student->add_email($student_id,$email);
				$data['email'] = $email;
				$data['result'] = 'success';
				$this->mail_validation_code($student_id,$student['name_en'],$email);
			}
		}

		$this->load->view('validate',$data);
	}

	function link($student_id,$key){
		$data = array();
		if(empty($student_id) || !empty($key)){
			redirect(base_url());
		}
		$student = $this->student->get_student($student_id);
		if($key == $this->key_hash($student_id,$name_en,$email)){
			$data['email'] = $student['email'];
			$this->student->validated($student_id);
			$this->load->view('validate-success',$data);
		} else {
			redirect(base_url());
		}
	}

	private function key_hash($student_id,$name_en,$email){
		return sha1(sha1($student_id).md5($name_en).sha1($email));
	}

	private function mail_validation_code($student_id,$name_en,$email){

		//code
		$key = $this->key_hash($student_id,$name_en,$email);

		//recipients
		$to  = $email;

		// subject
		$subject = 'ยืนยันตัวตนสำหรับการเลือกภาควิชา';

		// message
		$message = '
		<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<title>Nettuts Email Newsletter</title>
		</head>
		<body>
		<table width="100%" cellpadding="0" cellspacing="0" bgcolor="e4e4e4"><tr><td>
			<table id="top-message" cellpadding="20" cellspacing="0" width="600" align="center">
				<tr><td align="center"><img src="'.base_url().'assets/img/logo.png" alt=""></td></tr>
			</table><!-- top message -->
			<table id="main" cellpadding="0" cellspacing="15" bgcolor="ffffff" width="600" align="center">
				<tr><td>
					<h5>รหัสนิสิต: 5431010121</h5>
					<p>คลิกที่ลิงค์เพื่อยืนยันอีเมล</p>
					<h5><a href="'.base_url().'validates/link/'.$student_id.'/'.$key.'">'.base_url().'validates/link/'.$student_id.'/'.$key.'</a></h5>
				</tr></td>
			</table><!-- main -->
			<table id="bottom-message" cellpadding="20" cellspacing="0" width="600" align="center">
				<tr><td>
				<i>Registration and Evaluation<br/>
				Faculty of Engineering, Chulalongkorn University<br/>
				<a href="http://www.reg.eng.chula.ac.th">http://www.reg.eng.chula.ac.th</a></i>
				</tr></td>
			</table><!-- bottom message -->
		</tr></td></table><!-- wrapper -->
		</body>
		</html>

		';

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		// Additional headers
		$headers .= 'To: '.$name_en.' <'.$email.'>' . "\r\n";
		$headers .= 'From: Registration and Evaluation, Faculty of Engineering, Chulalongkorn University <noreply@reg.eng.chula.ac.th>' . "\r\n";

		// Mail it
		mail($to, $subject, $message, $headers);
	}
}