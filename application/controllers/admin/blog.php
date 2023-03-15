<?php
class Blog extends Admin_Controller {
	function __construct()
	{
		parent::__construct();
		if (!$this->is_logged_in()){
			redirect('admin/login');
		}
		$this->load->library('my_pagination');
		$this->load->model('Blog_model');
		
		$this->data['sel']='blogs';
		$this->data['sub_sel'] = 'blog_posts';

		$this->orderFields=array('title','category','author','date_added');
		$this->pageTitle[]="Blog Post";
	}

	function index()
	{
		$this->page(1);
		
	
	}
	function page($page=1,$orderBy="date_added",$order="asc"){
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
		$join=array();
		$join[]=array(
				"table"=>"blog_categories as bc",
				'joinOn'=>"bc.id = blogs.category_id",
				'select'=>"bc.name as category",
				"dir"=>"left",
				"groupBy"=>"blogs.id"
				);
		$this->data['blogs']=$this->Blog_model->get(array(),$this->data['orderBy'],$this->data['order'],$this->perPage,($page-1)*$this->perPage,$join);
		$this->data['total']=$this->Blog_model->getTotal();
		$this->my_pagination->Items($this->data['total']);
		$this->my_pagination->limit($this->perPage);
		$this->my_pagination->urlFriendly();
		$this->my_pagination->target(site_url('admin/blog/page') . '/%/' . $this->data['orderBy'] . "/" . $this->data['order']);
		$this->my_pagination->currentPage($this->data['page']);
		$this->my_pagination->className = "pagination pagination-centered ";
		$this->my_pagination->adjacents(1);


		$this->data['body']='admin/blog/list';
		$this->pageTitle[]="Page ".$page;
		$this->load->view('admin/structure',$this->data);
		
		
		
		
	}

	function add(){
		if($this->input->post('do_save_blog')){
			$this->session->set_flashdata('message-title', 'Add Blog Post');
			$this->form_validation->set_rules('title', 'Post Title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('author', 'Author Name', 'trim|xss_clean|required');
			$this->form_validation->set_rules('category_id', 'Post Category', 'trim|xss_clean|required');
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
						if ($this->form_validation->run() != FALSE) {
								$db=array();
								$db['title']=$this->input->post('title');
								$db['author']=$this->input->post('author');
								$db['category_id']=$this->input->post('category_id');
								$db['embed_link']=$this->input->post('embed_link');
								$db['date_added']=date('c',strtotime($this->input->post('date_added')));
								$db['image']=$this->uploadMedia('image');
								$db['meta_tags']=$this->input->post('meta_tags');
								$db['content']=$this->input->post('content');
								$this->Blog_model->insert($db);
								$this->session->set_flashdata('success','New Post added successfully');
								redirect('admin/blog');
							
						}else{
							$this->data['hasFormError']=true;
						}
		}
		
		$this->data['body']='admin/blog/add';
                    
		$this->pageTitle[]="Add New";
		$this->load->view('admin/structure',$this->data);
		}
			function edit($id=0){
				$blog=$this->data['blog']=$this->Blog_model->fromID($id);
				if(!$blog){
					redirect('admin/blog');
					}
		if($this->input->post('do_save_blog')){
			$this->session->set_flashdata('message-title', 'Edit Blog Post');
			$this->form_validation->set_rules('title', 'Post Title', 'trim|xss_clean|required');
			$this->form_validation->set_rules('author', 'Author Name', 'trim|xss_clean|required');
			$this->form_validation->set_rules('category_id', 'Post Category', 'trim|xss_clean|required');
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
						if ($this->form_validation->run() != FALSE) {
								$db=array();
								$db['title']=$this->input->post('title');
								$db['author']=$this->input->post('author');
								$db['category_id']=$this->input->post('category_id');
								$db['embed_link']=$this->input->post('embed_link');
								$db['date_added']=date('c',strtotime($this->input->post('date_added')));
								$newImage=$this->uploadMedia('image');
								$db['image']=$newImage!=""?$newImage:$blog->image;
								$db['meta_tags']=$this->input->post('meta_tags');
								$db['content']=$this->input->post('content');
								$this->Blog_model->update($db,$blog->id);
								$this->session->set_flashdata('success','Blog post updated successfully');
								redirect('admin/blog');
							}else{
							$this->data['hasFormError']=true;
								}
							
		}
		
		$this->data['body']='admin/blog/edit';
                    
		$this->pageTitle[]="Blog Edit";
		$this->load->view('admin/structure',$this->data);
		}
		function delete($id){
			$blog=$this->Blog_model->fromID($id);
		$this->session->set_flashdata('message-title', 'Delete Blog Post');
			if($blog){
				$this->Blog_model->delete($id);
				$this->session->set_flashdata('success','Blog Post Deleted Successfully');
				}else{
				$this->session->set_flashdata('error','Invalid Blog Post ID');
				}
				redirect('admin/blog');
			
			}

	function search($keyword="",$page=1,$orderBy="date_added",$order="asc"){
		if($this->input->post('keyword')){
			redirect('admin/blog/search/'.$this->input->post('keyword'));
		}
		if(trim($keyword)==""){
			redirect('admin/blog');
			}
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
		$join=array();
		$join[]=array(
				"table"=>"blog_categories as bc",
				'joinOn'=>"bc.id = blogs.category_id",
				'select'=>"bc.name as category",
				"dir"=>"left",
				"groupBy"=>"blogs.id"
				);
				$q=array();
				$q['or_like']=array('title'=>urldecode($keyword),'content'=>urldecode($keyword));
		$this->data['blogs']=$this->Blog_model->get($q,$this->data['orderBy'],$this->data['order'],$this->perPage,($page-1)*$this->perPage,$join);
		$this->data['total']=$this->Blog_model->getTotal($q);
		$this->data['search_keyword']=urldecode($keyword);
		$this->my_pagination->Items($this->data['total']);
		$this->my_pagination->limit($this->perPage);
		$this->my_pagination->urlFriendly();
		$this->my_pagination->target(site_url('admin/blog/page') . '/%/' . $this->data['orderBy'] . "/" . $this->data['order']);
		$this->my_pagination->currentPage($this->data['page']);
		$this->my_pagination->className = "pagination pagination-centered ";
		$this->my_pagination->adjacents(1);


		$this->data['body']='admin/blog/search';
		$this->pageTitle[]="Page ".$page;
		$this->load->view('admin/structure',$this->data);
		
		
		
		
	}}
?>
