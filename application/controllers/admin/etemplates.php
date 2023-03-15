<?php
class Users extends Admin_Controller {
	function __construct()
	{
		parent::__construct();
		if (!$this->is_logged_in()){
			redirect('admin/login');
		}
		$this->load->library('my_pagination');

		$this->load->library('form_validation');
		
		$this->data['sel']='user';
		$this->orderFields=array('first_name','last_name','active','email');
		$this->pageTitle[]="Admin User";
	}

	function index()
	{
		$this->page(1);
		
	
	}
	function page($page=1,$orderBy="first_name",$order="asc"){
		$page=max(1,$page);
		if(!in_array($order,$this->orders)){
			$order=$this->orders[0];
		}
		$this->data['order']=$order;
		if(!in_array($orderBy,$this->orderFields)){
			$orderBy=$this->orderFields[0];
			
		}
		$this->data['page']=$page;
		$this->data['orderBy']=$orderBy;
		$this->data['users']=$this->Admin_users_model->get(array(),$this->data['orderBy'],$this->data['order'],$this->perPage,($page-1)*$this->perPage);
		$this->data['total']=$this->Admin_users_model->getTotal();
		$this->my_pagination->Items($this->data['total']);
		$this->my_pagination->limit($this->perPage);
		$this->my_pagination->urlFriendly();
		$this->my_pagination->target(site_url('admin/users/page') . '/%/' . $this->data['orderBy'] . "/" . $this->data['order']);
		$this->my_pagination->currentPage($this->data['page']);
		$this->my_pagination->className = "pagination pagination-centered ";
		$this->my_pagination->adjacents(1);


		$this->data['body']='admin/users/list';
		$this->pageTitle[]="Page ".$page;
		$this->pageTitle[]="Users List";
		$this->load->view('admin/structure',$this->data);
		
		
		
		
	}

	function add(){
		if($this->input->post('do_add_user')){
			$this->session->set_flashdata('message-title', 'Add User');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|xss_clean|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|xss_clean|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
			$this->form_validation->set_rules('password_confirm', 'Repeat Password', 'trim|required|matches[password]');
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
						if ($this->form_validation->run() != FALSE) {
							if(!$this->Admin_users_model->fromName($this->input->post('email'))){
								$db=array();
								$db['first_name']=$this->input->post('first_name');
								$db['last_name']=$this->input->post('last_name');
								$db['email']=$this->input->post('email');
								$db['password']=$this->input->post('password');
								$db['active']=1;
								$user_id=$this->Admin_users_model->insert($db);
								$this->session->set_flashdata('success','New User added successfully');
								redirect('admin/users');
							}else{
								$this->session->set_flashdata('error','User already exists');
								}
							
						}else{
							$this->session->set_flashdata('error','User already exists');
						}
		}
		
		$this->data['body']='admin/users/add';
                    
		$this->pageTitle[]="Add New";
		$this->load->view('admin/structure',$this->data);
		}
			function edit($user_id=0){
				$user=$this->data['user']=$this->Admin_users_model->fromID($user_id);
				if(!$user){
					redirect('admin/users');
					}
		if($this->input->post('do_edit_user')){
			$this->session->set_flashdata('message-title', 'Edit User');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|xss_clean|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|xss_clean|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email');
			$changePassword=false;
			if($this->input->post('password')!=""){
				$changePassword=true;
				$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
				$this->form_validation->set_rules('password_confirm', 'Repeat Password', 'trim|required|matches[password]');
			}
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
						if ($this->form_validation->run() != FALSE) {
								$db=array();
								$db['first_name']=$this->input->post('first_name');
								$db['last_name']=$this->input->post('last_name');
								$db['email']=$this->input->post('email');
								if($changePassword){
								$db['password']=$this->input->post('password');
								}
								$db['active']=1;
								$user_id=$this->Admin_users_model->update($db,$user->user_id);
								$this->session->set_flashdata('success','User Updated Successfully');
								redirect('admin/users');
							}else{
								$this->session->set_flashdata('error','User already exists');
								}
							
		}
		
		$this->data['body']='admin/users/edit';
                    
		$this->pageTitle[]="Edit";
		$this->load->view('admin/structure',$this->data);
		}
		function delete($id){
			$user=$this->Admin_users_model->fromID($id);
			if($user){
				$this->Admin_users_model->delete($id);
				redirect('admin/users');
				}
			
			}

}
?>
