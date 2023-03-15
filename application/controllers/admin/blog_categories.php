<?php

class Blog_categories extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('my_pagination');
		
		$this->load->model('blog_categories_model');
		$this->data['sel']     = 'blogs';
		$this->data['sub_sel'] = 'blog_categories';
		
		$this->orderFields = array(
			'parent_name',
			'name'
		);
	}

	function index()
	{
		$this->session->set_userdata(array(
			'search_category' => 0,
			'search_term' => ''
		));
		$this->page(1);
	}
	
	function page($page = 1, $orderBy = "parent_name", $order = "asc")
	{
		$page = max(1, $page);
		
		if (!in_array($order, $this->orders)) {
			$order = $this->orders[0];
		}
		
		$this->data['order'] = $order;
		if (!in_array($orderBy, $this->orderFields)) {
			$orderBy = $this->orderFields[0];
			
		}
		
		$joins   = array();
		$joins[] = array(
			'table' => 'blog_categories as c2',
			'joinOn' => 'blog_categories.parent_id = c2.id',
			'select' => "coalesce(`c2`.`name`, 'Root') as `parent_name`",
			'dir' => 'left'
		);
		
		$search_term = $this->session->userdata('search_term');
		if ($search_term === FALSE)
			$search_term = '';
		
		$search_category = $this->session->userdata('search_category');
		if ($search_category === FALSE)
			$search_category = 0;
		$search_category = intval($search_category);
		
		$where_array = array();
		if ($search_category > 0) {
			$where_array['where'] = array(
				'blog_categories.parent_id' => $search_category
			);
		}
		if ($search_term != '') {
			$where_array['like'] = array(
				'blog_categories.name' => $search_term
			);
		}
		
		$this->data['page']            = $page;
		$this->data['orderBy']         = $orderBy;
		$this->data['blog_categories'] = $this->blog_categories_model->get($where_array, $orderBy, $order, $this->perPage, ($page - 1) * $this->perPage, $joins);
		
		$this->data['total'] = $this->blog_categories_model->getTotal($where_array);
		$this->my_pagination->Items($this->data['total']);
		$this->my_pagination->limit($this->perPage);
		$this->my_pagination->urlFriendly();
		$this->my_pagination->target(site_url('admin/blog_categories/page') . '/%/' . $this->data['orderBy'] . "/" . $this->data['order']);
		$this->my_pagination->currentPage($this->data['page']);
		$this->my_pagination->className = "pagination pagination-centered ";
		$this->my_pagination->adjacents(1);
		
		//load category level 1
		$this->data['level1_blog_categories'] = $this->blog_categories_model->get(array(
			'parent_id' => 0
		), 'name');
		$this->data['search_category']        = $search_category;
		$this->data['search_term']            = $search_term;
		$this->data['body']                   = 'admin/blog_categories/list';
		$this->load->view('admin/structure', $this->data);
	}
	
	function search()
	{
		if ($_POST) {
			$search_category = $this->input->post('search_category');
			$search_term     = $this->input->post('search_term');
			$this->session->set_userdata(array(
				'search_category' => $search_category,
				'search_term' => $search_term
			));
		}
		$this->page(1);
	}
	
	function add()
	{
		$this->session->set_flashdata('message-title', 'Add Blog Category');
		$this->form_validation->set_rules('parent_category_id', 'Category', 'numeric');
		$this->form_validation->set_rules('subcategory_name', 'Subcategory', 'trim|xss_clean|required');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
		if ($this->form_validation->run() != FALSE) {
			$blog_category_data = array(
				'name' => $this->input->post('subcategory_name'),
				'parent_id' => $this->input->post('parent_category_id')
			);
			
			$blog_category_id = $this->blog_categories_model->insert($blog_category_data);
			$this->session->set_flashdata('success', 'New blog category added successfully');
			redirect('admin/blog_categories');
		} else {
			$this->session->set_flashdata('error', 'Error in adding blog category.');
		}
		redirect('admin/blog_categories');
	}
	
	function edit($id)
	{
		if (is_numeric($id)) {
			$blog_categories = $this->blog_categories_model->fromID($id);
			if ($blog_categories) {
				$this->session->set_flashdata('message-title', 'Edit Blog Category');
				$this->form_validation->set_rules('edit_parent_category_id', 'Category', 'numeric');
				$this->form_validation->set_rules('edit_subcategory_name', 'Subcategory', 'trim|xss_clean|required');
				$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
				if ($this->form_validation->run() != FALSE) {
					$blog_category_data = array(
						'name' => $this->input->post('edit_subcategory_name'),
						'parent_id' => $this->input->post('edit_parent_category_id')
					);
					
					$blog_category_id = $this->blog_categories_model->update($blog_category_data, $id);
					$this->session->set_flashdata('success', 'Blog category updated successfully');
					redirect('admin/blog_categories');
				} else {
					$this->session->set_flashdata('error', 'Error in updating blog category.');
				}
			}
		}
		redirect('admin/blog_categories');
	}
	
	function delete($id)
	{
		if (is_numeric($id)) {
			$blog_categories = $this->blog_categories_model->fromID($id);
			if ($blog_categories) {
				$this->blog_categories_model->delete($id);
				$this->session->set_flashdata('message-title', 'Delete Blog Category');
				$this->session->set_flashdata('success', 'Blog category has been deleted');
			}
		}
		redirect('admin/blog_categories');
	}
	
	/////
	
	function delete_pp($user_id)
	{
		
		$this->data['user_id'] = $user_id;
		
		$this->load->view('admin/users/remove', $this->data);
	}
	
	
	
	
	
	function view($user_id)
	{
		
		$this->data['user'] = $this->admin_users->get_user_by_id($user_id);
		
		$this->data['user_id'] = $user_id;
		
		$this->data['body'] = 'admin/users/view';
		
		$this->load->view('admin/structure', $this->data);
		
	}
	
	function save($user_id)
	{
		//Set Form validation rules
		
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|xss_clean|required|alpha|callback_name_check');
		
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|xss_clean|required|alpha|callback_name_check');
		
		$this->form_validation->set_rules('email', 'Email Address', 'trim|xss_clean|required|valid_email|callback_username_check');
		
		if ($user_id == 0) {
			$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required');
			$this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|xss_clean|required|callback_same');
		} else {
			
			if ($this->input->post('password', TRUE) != '' || $this->input->post('confirm', TRUE) != '') {
				$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required');
				
				$this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|xss_clean|required|callback_same');
			}
		}
		
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
		
		if ($this->form_validation->run() != FALSE) {
			
			$first_name = $this->input->post('first_name', true);
			
			$last_name = $this->input->post('last_name', true);
			
			$email = $this->input->post('email', true);
			
			$password = $this->input->post('password', true);
			
			$active = $this->input->post('active', true);
			
			$this->admin_users->SaveAdminUser($first_name, $last_name, $email, $password, $user_id, $active); //Calling model function for save admin user details
			
			if ($user_id == 0) {
				
				$this->data['edit'] = 'new';
				
				$this->session->set_flashdata('message', 'User added successfully');
				
				redirect('admin/users');
				
			} else
				$this->session->set_flashdata('message', 'User updated successfully');
			
			redirect('admin/users');
		} else {
			
			$this->edit($user_id);
			
		}
	}
	
	function same($confirm)
	{
		$pass = $this->input->post('password');
		
		if ($confirm != $pass) {
			
			$this->form_validation->set_message('same', "The two passwords do not match");
			
			return FALSE;
		} else {
			
			return TRUE;
			
		}
	}
	
	function name_check($name)
	{
		if ($name == 'First Name' || $name == 'Last Name') {
			$this->form_validation->set_message('name_check', "The " . $name . " is required");
			return FALSE;
		} else {
			
			return TRUE;
		}
	}
	
	function username_check($email)
	{
		
		$result = $this->admin_users->CheckAdminUser($email, $this->session->userdata('edit_user_id'));
		
		if (count($result) > 0) {
			
			$this->form_validation->set_message('username_check', 'This email address already exist in our database.');
			
			return FALSE;
		} else {
			
			return TRUE;
			
		}
	}
}
?>
