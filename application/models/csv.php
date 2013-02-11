<?php

class csv extends CI_Model{
	function to_array($filename,$delimiter = ','){
		if(!file_exists($filename) || !is_readable($filename))
			return FALSE;
		$header = NULL;
		$data = array();
		ini_set('auto_detect_line_endings', '1');
		if(($handle = fopen($filename,'r')) !== FALSE){
			while(($row = fgetcsv($handle)) !== FALSE){
				if(!$header){
					$header = $row;
				} else {
					$data[] = array_combine($header, $row);
				}
			}
			fclose($handle);
		}
		return $data;
	}
}