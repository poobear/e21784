<?php

class Scores extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('score');
	}
	function admin() {
		$this->load->view('admin-score');
	}

	function admin_upload_csv() {
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'csv';
		$filename = 'scores_'.time().'.csv';
		$config['file_name'] = $filename;
		$this->load->library('upload',$config);
		$this->upload->do_upload();
		$this->load->model('csv');
		$arr = $this->csv->to_array("uploads/".$filename);
		foreach ($arr as $row) {
			$this->score->add_score($row);
		}
	}
}