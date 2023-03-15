<?php

class faq extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('admin_id')=='')

			redirect('admin/login');

		$this->load->library('form_validation');											//load form validation library		 

		$this->load->model('faq_model');													//load admin user model

		$this->data = array();

		$this->data['sel']='faq';

		$this->data['display_menu']='yes';
	}

	function index() //Function is used fo show the listing page
	{
		$this->data['faqs_items'] = $this->faq_model->get();

		$this->data['body'] = 'admin/faq/home';
		
		$this->load->view('admin/structure', $this->data);
	}

	function edit($faq_id = 0) //Function is used fo display the add/edit page
	{
		if ($faq_id != 0)
		{
			$this->data['faq']= $this->faq_model->get_record_by_id($faq_id);
			$this->data['edit'] = 'edit';
		}
		else
		{
			$this->data['edit'] = 'new';
		}
		$this->data['faq_id'] = $faq_id;

		$this->data['body'] = 'admin/faq/edit';
		
		$this->load->view('admin/structure', $this->data);
	}

	function save($faq_id) //Function is used for display the save FAQ details
	{
		$this->faq_model->Save($faq_id);

		$this->session->set_flashdata('message', 'Faq item saved.');
		
		redirect('admin/faq');
	}
	
	function delete_pp($faq_id) 	   
	{
		$this->data['faq_id'] = $faq_id;

		$this->load->view('admin/faq/remove',$this->data);
	}

	function delete($faq_id) //Function is used for delete FQA
	{
		$this->faq_model->delete($faq_id);	//calling model for deleted

		$this->session->set_flashdata('message', 'Faq item has been deleted.');
		
		redirect('admin/faq');
	}
	
	function view($faq_id) //Function is used for delete FQA
	{
		$this->data['faq'] = $this->faq_model->get_record_by_id($faq_id);

		$this->data['body'] = 'admin/faq/view';
		
		$this->load->view('admin/structure', $this->data);
	}
}
