<?php

class Auth extends CI_Controller{

	function index(){
		$this->load->model('student');
		$data['error'] = 0;
		// If already login
		if($this->session->userdata('student_id')){
			redirect(base_url()."validates");
		}
		// Check if user has just click login
		if($_POST){
			$student_id = $this->input->post('student_id',true);
			$password = $this->input->post('password',true);

			if(empty($student_id) || empty($password)){
				$data['error'] = 1;
			} else {
				$student_id = trim($student_id);
				$cookieFields = $this->httpSignIn($student_id, $password);
				if($cookieFields != false){

					$student = $this->student->get_student($student_id);
					if($student){
						$this->session->set_userdata('student_id',$student_id);
						redirect(base_url()."validates");
					} else { // not valid user
						$data['error'] = 2;
					}

				} else {	// cannot login into reg chula
					$data['error'] = 1;
				}
				// Close reg.chula connection to prevent A00010
				$this->httpSignOut($cookieFields);
			}
		}
		// If user just enter login page(no POST) or Wrong login
		$this->load->view("login",$data);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."auth");
	}

	private function httpPost($hostName, $postContent, $cookieContent='', $isRequestHeader=false, $refererURL=false) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $hostName);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)');
		curl_setopt($ch, CURLOPT_COOKIE, $cookieContent);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postContent);
		curl_setopt($ch, CURLOPT_HEADER, (($isRequestHeader) ? 1 : 0));
		curl_setopt($ch, CURLOPT_REFERER, (($refererURL) ? $refererURL : $hostName));
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		curl_close($ch);

		return $response;
	}

	private function httpGet($hostName, $cookieContent='', $isRequestHeader=false, $refererURL=false) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $hostName);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)');
		curl_setopt($ch, CURLOPT_COOKIE, $cookieContent);
		curl_setopt($ch, CURLOPT_HTTPGET, 1);
		curl_setopt($ch, CURLOPT_HEADER, (($isRequestHeader) ? 1 : 0));
		curl_setopt($ch, CURLOPT_REFERER, (($refererURL) ? $refererURL : $hostName));
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		curl_close($ch);

		return $response;
	}

	private function httpSignIn($username, $password) {
		$username = trim($username);
		$password = trim($password);

		$postFields = 'userid='. $username .'&password='. $password .'&programsystem=S&language=T';
		$response = $this->httpPost('http://www.reg.chula.ac.th/servlet/com.dtm.chula.reg.servlet.LogonServlet', $postFields, '', true, 'https://www.reg.chula.ac.th/cu/reg/logon/logonPage.html');

		if (preg_match('/StatusServlet/', $response)) {	// Success
			if (preg_match_all('/Set-Cookie: ([^;]+)/', $response, $regs, PREG_OFFSET_CAPTURE)) 
				$cookieFields = $regs[1][0][0] .'; '. $regs[1][1][0] .';';

			return $cookieFields;
		} else {
			return false;
		}
	}

	private function httpSignOut($cookieFields) {
		$this->httpGet('http://www.reg.chula.ac.th/servlet/com.dtm.chula.reg.servlet.LogOutServlet?language=T', $cookieFields, false, 'https://www.reg.chula.ac.th/cu/reg/welcome/logout/LogOutFrame.jsp');
	}

	private function utf8($string) {
		return iconv("TIS-620", "UTF-8", $string);
	} 
}