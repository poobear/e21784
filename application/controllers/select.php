<?php

class Select extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('department');
        $this->load->model('student');
	}

    // main page for selecting department
    function index() {

        //if user haven't login yet
    	if(!$this->session->userdata("student_id")){
    		redirect(base_url()."students/login");
    	}

        // get department detail
        $data['dept'] = $this->department->get_department_array();
        $student_id = $this->session->userdata("student_id");
		$data['student'] = $this->student->get_student($student_id);

        // user already select department, redirect to select/view
		if($data['student']['department_selected']){
            // set session to use with select/view controller to show error message
            $this->session->set_userdata('select_dept_stas','selected');
			redirect(base_url()."select/view");
		} else {
            // everything ok, load select view
        	$this->load->view('select',$data);
    	}
    }

    // processing POST data from select/index
    function select_dept() {

        // login check
    	if(!$this->session->userdata("student_id")){
    		redirect(base_url()."students/login");
    	}

        // no POST data
        if(!$_POST){
            redirect(base_url()."select");
        }

        // get session
        $student_id = $this->session->userdata("student_id");

        $data['student'] = $this->student->get_student($student_id);

        // check if already selected
        if($data['student']['department_selected']){
            // set session to use with select/view controller to show error message
            $this->session->set_userdata('select_dept_stas','selected');
        	redirect(base_url()."select/view");
            return ;
        }

        // explode into array
        $list = explode(',',$this->input->post('selectlist',true));
        // send selected list to model
        $res = $this->student->select_dept($student_id,$list);

        // if sucessfully add, redirect to select/view, else back to login
        if($res == 1){
            $this->session->set_userdata('select_dept_stas','success');
            redirect(base_url()."select/view");
        } else {
            redirect(base_url()."students/login");
        }
    }

    function view() {
        // check for login
        if(!$this->session->userdata("student_id")){
            redirect(base_url()."students/login");
        }

        // get status of viewing ("already select, select complete")
        $args = $this->session->userdata('select_dept_stas');
        // clear session
        $this->session->set_userdata('select_dept_stas','');

        // get student information
        $student_id = $this->session->userdata("student_id");
        $data['student'] = $this->student->get_student($student_id);

        // initialize data
        $data['list'] = array();

        if($data['student']['department_selected'] == 0){
            // if not select dept yet, set status to empty
            $args = "empty";
        } else {
            // get list of selected dept
            $selected = $this->student->get_select_dept($student_id);

            // get dept from dept_id, append to list
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
