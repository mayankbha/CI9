<?php

class Home extends Admin_Controller {

	 function __construct() {
		  parent::__construct();

		  if (!$this->is_logged_in()) {
			   redirect('admin/login');
		  }

		  $this->data = array();

		  $this->data['sel'] = '';
		  $this->data['display_menu'] = 'yes';
	 }

	 function index() {
		  $this->data['body'] = 'admin/home';
		  $this->load->view('admin/structure', $this->data);
	 }

}

?>
