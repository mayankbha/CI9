<?php

class Resource extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->is_logged_in()) {
            redirect('admin/login');
        }
		
		$img_cfg_thumb['image_library'] = 'gd2';
		$img_cfg_thumb['maintain_ratio'] = TRUE;
		$this->load->library('image_lib');
		$this->image_lib->initialize($img_cfg_thumb);
		
        $this->orderFields = array();
        $this->load->library('form_validation');
        $this->load->library('my_pagination');
        $this->load->model('Resource_model');
        $this->load->model('Lesson_cat_model');
        $this->load->model('Survey_model');
        $this->data = array();
        $this->data['sel'] = 'resource';
        $this->data['display_menu'] = 'yes';
	
        $config['upload_path'] = 'upload/';
		$config['allowed_types'] = 'gif|jpg|png|mov|mpeg|mp4|avi';
		$config['encrypt_name'] = TRUE;
		$config['max_size']  = '500000';
		$this->load->library('upload',$config);
    }


    function index()
    {
        $this->page(1);
    }

    /**
     * @param int $page
     * @param string $orderBy
     * @param string $order
     */

    function page($page = 1, $orderBy = "id", $order='')
    {
        $page = max(1, $page);
        if (!in_array($order, $this->orders)) {
           // $order = $this->orders[0];
        }
	  
	    $order=$order=='asc'?'DESC':'asc';
        $this->data['order'] = $order;
		
        if (!in_array($orderBy, $this->orderFields)) {
            // $orderBy = $this->orderFields[0];
        }
		
        $this->data['page'] = $page;
        $this->data['orderBy'] = $orderBy;
        $this->data['contents'] = $this->Resource_model->display_all_categories(array(), $this->data['orderBy'], $this->data['order'], $this->perPage, ($page - 1) * $this->perPage);
        $this->data['total'] = $this->Resource_model->getTotal();
        $this->my_pagination->Items($this->data['total']);
        $this->my_pagination->limit($this->perPage);
        $this->my_pagination->urlFriendly();
        $this->my_pagination->target(site_url('admin/resource/page') . '/%/' . $this->data['orderBy'] . "/" . $this->data['order']);
        $this->my_pagination->currentPage($this->data['page']);
        $this->my_pagination->className = "pagination pagination-centered ";
        $this->my_pagination->adjacents(1);
        $this->pageTitle[] = "Page " . $page;
        $this->pageTitle[] = "Resource List";
        $this->data['body'] = 'admin/resource/list';
        $this->load->view('admin/common/structure', $this->data);
    }

    /**
     * @Definition : Add the resource information to the database.
     */

    function add()
    {
        $this->data['lessons'] = $this->Lesson_cat_model->get_lesson_categories();
        $this->data['surveys'] = $this->Survey_model->get_survey_list();
        if ($this->input->post('do_save_resource')) {
        
                $db = array();
                $db['name'] = $this->input->post('r_name');
			    $db['video'] = $this->input->post('r_video');
                $db['text'] = $this->input->post('r_text');
                $db['url'] = $this->input->post('r_url');
                $db['lesson_id'] = $this->input->post('r_cat');
         
		    //uploading a file
		 
            foreach($_FILES as $field => $file)
            {
                // No problems with the file
                if($file['error'] == 0)
                {
				   
                    // So lets upload
                    if ($this->upload->do_upload($field))
                    {
                        $data = $this->upload->data();
						$db['image'] = $data['file_name'];
						
                    }
                    else
                    {
                        $errors = $this->upload->display_errors();
                    }
                
            }
       
             }  

                $id = $this->Resource_model->add_resource_categories($db);
                $this->session->set_flashdata('success', 'Resource Added successfully ');
				
           
			 redirect('admin/resource');
        }
        $this->pageTitle[] = "Add New Content";
        $this->data['body'] = 'admin/resource/add';
        $this->load->view('admin/common/structure', $this->data);
    }


    function edit($id = 0)
    {
        $resource = $this->data['resource'] = $this->Resource_model->fromID($id);
        if (!$resource) {
            redirect('admin/resource');
        }
		
	    $this->data['lessons'] = $this->Lesson_cat_model->get_lesson_categories();
        $this->data['surveys'] = $this->Survey_model->get_survey_list();
		
		
        if ($this->input->post('do_edit_resource')) {
            $this->session->set_flashdata('message-title', 'Edit Resource');
            $db = array();
            $db['name'] = $this->input->post('r_name');
			$db['video'] = $this->input->post('r_video');
            $db['text'] = $this->input->post('r_text');
		    $db['url'] = $this->input->post('r_url');
            $db['lesson_id'] = $this->input->post('r_cat');
			
			$i=1;
            foreach($_FILES as $field => $file)
            {
                // No problems with the file
                if($file['error'] == 0)
                {
				   
                    // So lets upload
                    if ($this->upload->do_upload($field))
                    {
					   $data = $this->upload->data();
					   $db['image'] = $data['file_name'];
									
                    }
                  
                }  else
                    {
                        $errors = $this->upload->display_errors();
						
                    }
				$i++;
             }
       
         
            $id = $this->Resource_model->update_resource_categories($db, $resource->id);
            $this->session->set_flashdata('success', 'Resource Edited successfully ');
            redirect('admin/resource');
        } else {
            $this->data['formError'] = "There was an error editing the selected";
        }

        $this->data['body'] = 'admin/resource/edit';
        $this->pageTitle[] = "Resource Edit";
        $this->load->view('admin/common/structure', $this->data);


    }


    public
    function view_resource($id=0)
    {
	
	 // echo $this->Resource_model->fromID($id)->image;die;
	    $resource = $this->data['resource'] = $this->Resource_model->fromID($id);
        if (!$resource) {
            redirect('admin/resource');
        }
		
		

		  $i = imagecreatefromjpeg(base_url()."upload/".$this->Resource_model->fromID($id)->image);
		  $thumb = $this->Resource_model->thumbnail_box($i, 422, 317);
	
		   imagejpeg($thumb,base_url()."upload/".$this->Resource_model->fromID($id)->image);
			
	
        $this->pageTitle[] = "View Resource";
        $this->data['body'] = 'admin/resource/resource_view';
        $this->load->view('admin/common/structure', $this->data);

    }


    public
    function delete($id = 0)
    {
       
	    $res=$this->Resource_model->get_file_name($id);
		  @unlink('upload/'.$res->image);
		  @unlink('upload/'.$res->video);
	    $member = $this->Resource_model->fromID($id);
        $this->session->set_flashdata('message-title', 'Delete Resource');
        if ($member) {
            $this->Resource_model->remove_category($id);
            $this->session->set_flashdata('success', 'Resource Deleted Successfully');
        } else {
            $this->session->set_flashdata('error', 'Invalid Resource ID');
        }
        redirect('admin/resource');

    }

  

}