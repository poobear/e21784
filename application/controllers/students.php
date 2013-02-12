<?php

class Students Extends CI_Controller{

	function login(){
		$data['error'] = 0;
		// Check if user has just click login
		if($_POST){

			// Check availibility using student model
			// TODO: Check from reg.chula
			$this->load->model("student");
			$student_id = $this->input->post('student_id',true);
			$password = $this->input->post('password',true);
			$user = $this->student->login($student_id,$password);
			$data['student_id'] = $student_id;
			if(!$user){
				// Username and/or Password invalid
				$data['error'] = 1;
			} else {
				// Set session
				$this->session->set_userdata('student_id',$user['student_id']);
				$this->session->set_userdata('user_type','student');
				// redirect to select page
				// TODO: chage to main page
				redirect(base_url()."select");
			}
		}
		// If user just enter login page(no POST) or Wrong login
		$this->load->view("student-login",$data);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."student/login");
	}
}