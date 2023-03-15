<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Hero_Controller extends CI_Controller {

	var $perPage = 15;
	var $pageTitle = array();
	var $data = array();
	var $orders=array('asc','desc');
	var $orderFields=array('user_id');

	public function __construct() {

		parent::__construct();
		$this->pageTitle[] = "StartupMeow";
		$this->data['contentTitle'] = "Admin";
		$this->data['display_menu']="yes";
		$this->load->model('Members_model');
	}

	function is_logged_in() {
		if ($this->getLoginID()) {
			return true;
		}
		return false;
	}

	function getLoginID() {
		if ($this->session->userdata('user_id')) {
			if ($this->Members_model->fromID($this->session->userdata('user_id'))) {
				return $this->session->userdata('user_id');
			}
		}
		return false;
	}

	function friendlyURL($string) {
		$string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $string);
		$string = preg_replace("`\[.*\]`U", "", $string);
		$string = preg_replace("`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i", "\\1", $string);
		$string = preg_replace(array(
			"`[^a-z0-9]`i",
			"`[-]+`"
				), "-", $string);
		return strtolower(trim($string, '-'));
	}

	function getCURL($url = "") {
		if (function_exists('curl_init') && $url != "") {
			$ch = curl_init($url);
			$options = array(
				CURLOPT_HEADER => 0,
				CURLOPT_SSL_VERIFYPEER => 0,
				CURLOPT_SSL_VERIFYHOST => 0,
				CURLOPT_BINARYTRANSFER => 1,
				CURLOPT_RETURNTRANSFER => 1
			);
			curl_setopt_array($ch, $options);
			$content = curl_exec($ch);
			if ($content !== false) {
				return $content;
			}
		}
		return false;
	}
	
	function uploadMedia($field){
		if(is_uploaded_file($_FILES[$field]['tmp_name'])){
		$rawname=strtolower($_FILES[$field]['name']);
		$ext=substr($rawname,strrpos($rawname,".")+1,strlen($rawname));
		$name=$this->friendlyURL(substr($rawname,0,strrpos($rawname,".")));
		$uploadDir=FCPATH."/upload";
		$tmp=$_FILES[$field]['tmp_name'];
		$propername=$this->getProperFileName($name,$ext,0);
		if(move_uploaded_file($_FILES[$field]['tmp_name'],$uploadDir."/".$propername)){
			return site_url('upload/'.$propername);
			}
		}
		return "";
		}
		function getProperFileName($name,$ext,$counter=0){
		$uploadDir=FCPATH."/media";
		$newname=$name.($counter>0?"-".$counter:"");
		if(file_exists($uploadDir."/".$newname.".".$ext)){
			return $this->getProperFileName($name,$ext,$counter+1);
			}
			return $newname.".".$ext;
			
		}

}

class Admin_Controller extends Hero_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Admin_users_model');
	}

	function getLoginID() {

		if ($this->session->userdata('admin_id')) {
			if ($this->Admin_users_model->fromID($this->session->userdata('admin_id'))) {
				return $this->session->userdata('admin_id');
			}
		}
		return false;
	}

}

class Front_Controller extends Hero_Controller {

	function __construct() {
		parent::__construct();
	}

}
