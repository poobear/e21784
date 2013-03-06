<?php
// TODO: Fix to current schema
class Score extends CI_Model {

	function get_score($student_id,$course_id) {
		$this->db->select()
			->from('scores')
			->where(array('student_id'=>$student_id,'course_id'=>$course_id));
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function add_score($data) {
		foreach ($data as $key => $value) {
			if($key == 'student_id'){
				$student_id = $value;
				break;
			}
		}
		if($student_id) {
			foreach ($data as $key => $value) {
				if($key != 'student_id'){
					$course_id = $key;
					$score = $this->eval_score($value);
					$this->db->flush_cache();
					$this->db->select()
						->from('scores')
						->where(array('student_id'=>$student_id,'course_id'=>$course_id));
					$query = $this->db->get();
					$query  = $query->first_row('array');
					$arr = array('student_id'=>$student_id,'course_id'=>$course_id,'score'=>$score);
					$this->db->flush_cache();
					if($query){
						$this->db->where(array('student_id'=>$student_id,'course_id'=>$course_id));
						$this->db->update('scores',$arr);
					} else{
						$this->db->insert('scores',$arr); 
					}
				}
			}
			return TRUE;
		}
		return FALSE;
	}

	private function eval_score($grade) {
		if(is_float($grade) || is_int($grade) || is_numeric($grade)){
			return $grade;
		}
		switch ($grade) {
			case 'A':	return 4;
			case 'B+':	return 3.5;
			case 'B':	return 3;
			case 'C+':	return 2.5;
			case 'C':	return 2;
			case 'D+':	return 1.5;
			case 'D':	return 1;
			default:	return 0;
		}
	}
}