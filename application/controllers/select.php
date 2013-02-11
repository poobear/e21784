<?php

class Select extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('department');
        $this->load->model('student');
	}
    function index() {
        //add that if already select dept, redirct to view select
    	if(!$this->session->userdata("student_id")){
    		redirect(base_url()."students/login");
    	}
        $data['dept'] = $this->department->get_department_array();
        $student_id = $this->session->userdata("student_id");
		$data['student'] = $this->student->get_student($student_id);
		if($data['student']['department_selected']){
            $this->session->set_userdata('select_dept_stas','selected');
			redirect(base_url()."select/view");
		} else {
        	$this->load->view('select',$data);
    	}
    }

    function select_dept() {
    	if(!$this->session->userdata("student_id")){
    		redirect(base_url()."students/login");
    	}
        if(!$_POST){
            redirect(base_url()."select");
        }
        $student_id = $this->session->userdata("student_id");
        $data['student'] = $this->student->get_student($student_id);
        if($data['student']['department_selected']){
            $this->session->set_userdata('select_dept_stas','selected');
        	redirect(base_url()."select/view");
            return ;
        }
        $list = explode(',',$this->input->post('selectlist',true));
        $res = $this->student->select_dept($student_id,$list);
        if($res == 1){
            $this->session->set_userdata('select_dept_stas','success');
            redirect(base_url()."select/view");
        } else {
            redirect(base_url()."students/login");
        }
    }

    function view() {
        if(!$this->session->userdata("student_id")){
            redirect(base_url()."students/login");
        }
        $args = $this->session->userdata('select_dept_stas');
        $this->session->set_userdata('select_dept_stas','');
        $student_id = $this->session->userdata("student_id");
        $data['student'] = $this->student->get_student($student_id);
        $data['list'] = array();
        if($data['student']['department_selected'] == 0){
            $args = "empty";
        } else {
            $selected = $this->student->get_select_dept($student_id);
            foreach ($selected as $row) {
                $dept_id = $row['department_id'];
                $dept = $this->department->get_department($dept_id);
                array_push($data['list'],$dept);
            }
        }
        $data['args'] = $args;
        $this->load->view('view-selected',$data);
    }
}
