<?php

class Department extends CI_Model {
    function get_department_array(){
        $this->db->select()->from('departments');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_department($id){
    	$this->db->select()->from('departments')->where('department_id',$id);
    	$query = $this->db->get();
    	return $query->first_row('array');
    }
}
