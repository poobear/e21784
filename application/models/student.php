<?php

class Student Extends CI_Model {
	function login($student_id,$password){
		$where = array('student_id' => $student_id,'password' => sha1($password));
		$this->db->select()->from('students')->where($where);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function get_student($student_id){
		$this->db->select()->from('students')->where('student_id',$student_id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	// return 0 if student not found
	function select_dept($student_id,$prefix_en_list){
		$this->load->model('department');
		$this->db->select()->from('students')->where('student_id',$student_id);
		$query = $this->db->get();
		$query = $query->first_row('array');
		$response = 1;
		if(!$query){
			$response = 0;
		} else {
			$this->db->flush_cache();
			$list = array('student_id' =>  $student_id, 'department_id' => 0, 'rank' => 1);
			foreach($prefix_en_list as $key){
				$dept = $this->department->get_department_from_en_prefix($key);
				if($dept){
					$list['department_id'] = $dept['department_id'];
					$this->db->insert('selects',$list);
					$list['rank']++;
				}
			}
			$this->db->flush_cache();
			$this->db->where('student_id',$student_id)->update('students',array('department_selected'=>1));
		}
		return $response;
	}

	function get_select_dept($student_id){
		$this->db->select()->from('selects')->where('student_id',$student_id)->order_by('rank','asc');
		$query = $this->db->get();
		return $query->result_array();
	}
}