<?php
class Forgot extends Admin_Controller {

	function __construct() {
		parent::__construct();

		$this->load->helper('string');
		$this->load->model('Email_templates_model'); 
	}

	function index() {

		if ($this->input->post('do_forgot_password')) {
			$this->session->set_flashdata('message-title', 'Forgot Password');

			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

			if ($this->form_validation->run() != FALSE) {

				$email = $this->input->post('email');
				$user = $this->Admin_users_model->fromName($email);
				if ($user) {
					$token = uniqid();
					$this->Admin_users_model->update(array('reset_request' => 1, 'reset_token' => $token), $user->user_id);
					$this->load->library('email');
					$template = $this->Email_templates_model->fromName('admin_forgot_password');
					$message = $template->content;

					$message = str_replace('{LINK}', site_url('admin/forgot/reset/' . $user->user_id . '/' . $token), $message);

					$this->email->from($template->from, $template->from_name);

					$this->email->to($user->email);

					$this->email->subject($template->subject);

					$this->email->message($message);

					if ($this->email->send()) {

						$this->session->set_flashdata('success', 'Instruction to reset your password has been sent your email inbox');
					} else {
						$this->session->set_flashdata('error', 'We couldn\'t send you the email with password procedure at the moment. Please try again later');
					}
				} else {
					$this->session->set_flashdata('error', "User doesn't exist");
				}
			} else {

				$this->session->set_flashdata('error', "Invalid Email Address");
			}
			redirect('admin/forgot');
		}
		$this->data['body'] = 'admin/forgot/form';
		$this->data['contentTitle'] = 'Forgot Password';
		$this->load->view('admin/structure-nomenu', $this->data);
	}

	function reset($user = 0, $token = "") {
		$user = $this->Admin_users_model->fromID($user);
		if ($user) {
			if ($user->reset_token == $token && $user->reset_request == 1) {
				if ($this->input->post('do_reset_password')) {
					$this->session->set_flashdata('message-title', 'Reset Password');
					$this->form_validation->set_rules('password', 'Password', 'required|trim|md5');
					$this->form_validation->set_rules('password_repeat', 'Repeat Password', 'required|trim|matches[password]');
					if ($this->form_validation->run() != FALSE) {
						$this->Admin_users_model->update(array('reset_request' => 0, 'reset_token' => "", 'password' => $this->input->post('password')), $user->user_id);
						$this->session->set_flashdata('success', "Your password has been reset. Please login with your new password");

						redirect('admin/login');
					} else {
						$this->session->set_flashdata('error', "Password mismatched");

						redirect('admin/forgot/reset/' . $user->user_id . '/' . $token);
					}
				}

				$this->data['body'] = 'admin/forgot/reset-form';
				$this->load->view('admin/structure-nomenu', $this->data);
			} else {
				$this->session->set_flashdata('error', "User password reset token has expired. Please make another reset request");

				redirect('admin/forgot');
			}
		} else {
			$this->session->set_flashdata('error', "User doen't exist");

			redirect('admin/forgot');
		}
	}

}

?>
