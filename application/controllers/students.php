<?php

class Students Extends CI_Controller{
	function login(){
		$data['error'] = 0;
		//just login
		if($_POST){
			$this->load->model("student");
			$student_id = $this->input->post('student_id',true);
			$password = $this->input->post('password',true);
			$user = $this->student->login($student_id,$password);
			$data['student_id'] = $student_id;
			if(!$user){
				$data['error'] = 1;
			} else {
				$this->session->set_userdata('student_id',$user['student_id']);
				$this->session->set_userdata('user_type','student');
				redirect(base_url()."select");
			}
		}
		$this->load->view("student-login",$data);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."student/login");
	}
}