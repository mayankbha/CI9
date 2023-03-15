<?php

class Login extends Admin_Controller {

	function __construct() {
		parent::__construct();

		if ($this->is_logged_in()) {
			redirect('admin/users');
		}
	}

	function index() {
		if ($this->input->post('do_login')) {
			$this->session->set_flashdata('message-title', 'Login');
			$this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|valid_email|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|md5');
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

			if ($this->form_validation->run() != FALSE) {
				$user = $this->Admin_users_model->fromName($this->input->post('username'));
				if ($user) {

					if ($this->input->post('password') == $user->password) {

						$this->session->set_userdata('admin_id', $user->user_id);
						redirect('admin/users');
					} else {

						$this->session->set_flashdata('error', 'Invalid Username or Password');
					}
				} else {

					$this->session->set_flashdata('error', 'Invalid Username or Password');
				}
			} else {

				$this->session->set_flashdata('error', 'Invalid Username or Password');
			}
			redirect('admin/login');
		}
		$this->data['body'] = 'admin/login';
		$this->data['contentTitle'] = 'Login';

		$this->load->view('admin/structure-nomenu', $this->data);
	}

}
