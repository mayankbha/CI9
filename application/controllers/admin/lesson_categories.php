<?php

class Lesson_categories extends Admin_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('my_pagination');
        
        $this->load->model('lesson_cat_model');
        $this->data['sel'] = 'learning';
        $this->data['sub_sel'] = 'lesson_categories';
        
        $this->orderFields=array('stage', 'overall', 'sub1', 'sub2');
    }

    function index()
    {
        $this->session->set_userdata(array('search_category'=>0, 'search_term' => ''));
      $this->page(1);
    }
    
    function page($page=1, $orderBy="stage", $order="asc")
    {
        $page = max(1,$page);
    
        if(!in_array($order,$this->orders)){
            $order=$this->orders[0];
        }
        
        $this->data['order']=$order;
        if(!in_array($orderBy,$this->orderFields)){
            $orderBy=$this->orderFields[0];
        }
        
      
        
        $search_term = $this->session->userdata('search_term');
        if ($search_term === FALSE)
            $search_term='';
        
        $search_category = $this->session->userdata('search_category');
        if ($search_category === FALSE)
            $search_category=0;
        $search_category = intval($search_category);
        
        $where_array = array();
        // $where_array['where'] = array('lesson_categories.id'=>1);
        
        if ($search_term !='')
        {
            switch ($search_category)
            {
                case 1:
                    $where_array['like'] = array('lesson_categories.stage'=>$search_term);
                    break;
                case 2:
                    $where_array['like'] = array('overall'=>$search_term);
                    break;
                case 3:
                    $where_array['like'] = array('sub1'=>$search_term);
                    break;
                case 4:
                    $where_array['like'] = array('sub2'=>$search_term);
                    break;
            }
        }
        
        $select = "lesson_categories.id, lesson_categories.stage as stage, lesson_categories.overall as overall, lesson_categories.sub1, lesson_categories.sub2";
		
		$joins = array();
	
        $this->data['page'] = $page;
        $this->data['orderBy'] = $orderBy;
        $this->data['lesson_categories'] = $this->lesson_cat_model->get($where_array, $orderBy, $order, $this->perPage, ($page-1)*$this->perPage,$joins,$select);
		
	
        
        $this->data['total']=$this->lesson_cat_model->getTotal($where_array, $joins);
        $this->my_pagination->Items($this->data['total']);
        $this->my_pagination->limit($this->perPage);
        $this->my_pagination->urlFriendly();
        $this->my_pagination->target(site_url('admin/lesson_categories/page') . '/%/' . $this->data['orderBy'] . "/" . $this->data['order']);
        $this->my_pagination->currentPage($this->data['page']);
        $this->my_pagination->className = "pagination pagination-centered pagination_padding";
        $this->my_pagination->adjacents(1);
        
        //load category level 1
        //$this->data['level1_blog_categories'] = $this->blog_categories_model->get(array('parent_id'=>0),'name');
	    $groupBy="lesson_categories.stage";
        $all_categories = $this->lesson_cat_model->get_lesson_category($groupBy);
        
        foreach ($all_categories as $category) {
            $stages[] = $category->stage;
            $overalls[] = $category->overall;
            $sub1s[] = $category->sub1;
        }
		
        $this->data['stages']   = $stages;
        $this->data['overalls'] = $overalls;
        $this->data['sub1s']    = $sub1s;

        $this->data['search_category'] = $search_category;
        $this->data['search_term'] = $search_term;
        $this->data['body']='admin/lesson_categories/list';
        $this->load->view('admin/common/structure',$this->data);
    }
    
    function search()
    {
        if ($_POST)
        {
            $search_category = $this->input->post('search_category');
            $search_term = $this->input->post('search_term');
            $this->session->set_userdata(array('search_category'=>$search_category, 'search_term' => $search_term));
        }
        $this->page(1);
    }
    
    function add()
    {
        $this->session->set_flashdata('message-title', 'Add Lesson Category');
        $this->form_validation->set_rules('stage', 'Stage', 'trim|xss_clean|required');
        $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
        $response = array();

        if ($this->form_validation->run() != FALSE) 
        {
            $stage = $this->input->post('stage_check') ? $this->input->post('stage_text') : $this->input->post('stage');
            $overall = $this->input->post('overall_check') ? $this->input->post('overall_text') : $this->input->post('overall');
            $sub1 = $this->input->post('sub1_check') ? $this->input->post('sub1_text') : $this->input->post('sub1');
            
            $lesson_category_data = array(
                'stage'   => $stage,
                'overall' => $overall != '' ? $overall : '',
                'sub1'    => $sub1 != '' ? $sub1 : '',
                'sub2'    => $this->input->post('sub2') !='' ? $this->input->post('sub2') : ''
            );
            
            $where_array['where'] = $lesson_category_data;
            $check_record_exist = $this->lesson_cat_model->get($where_array);

            if($check_record_exist)
            {
                $response['errors'] = 'This record is already exist';
            }
            else
            {
                $lesson_category_id = $this->lesson_cat_model->insert($lesson_category_data);
                $this->session->set_flashdata('success','New Lesson category added successfully');
                $response['redirect'] = site_url('admin/lesson_categories');    
            }
            
        }
        else
        {
            $this->session->set_flashdata('error','Error in adding Lesson category.');
            $response['redirect'] = site_url('admin/lesson_categories');
        }

        $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($response));
    }
    
    function edit($id)
    {
        if(is_numeric($id))
        {
            $blog_categories = $this->lesson_cat_model->fromID($id);
            $response = array();
            if($blog_categories)
            {
                $this->session->set_flashdata('message-title', 'Edit Lesson Category');
                $this->form_validation->set_rules('stage'.$id, 'Stage', 'trim|xss_clean|required');
                $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
                if ($this->form_validation->run() != FALSE) 
                {
                    $lesson_category_data = array(
                        'stage'   => $this->input->post('stage'.$id),
                        'overall' => $this->input->post('overall'.$id) != '' ? $this->input->post('overall'.$id) : '',
                        'sub1'    => $this->input->post('sub1'.$id) != '' ? $this->input->post('sub1'.$id) : '',
                        'sub2'    => $this->input->post('sub2'.$id) !='' ? $this->input->post('sub2'.$id) : ''
                        );
                    $lesson_category_id=$this->lesson_cat_model->update($lesson_category_data,$id);
                    $this->session->set_flashdata('success','Lesson category updated successfully');
                    $response['redirect'] = site_url('admin/lesson_categories');
                }
                else
                {
                    $this->session->set_flashdata('error','Error in updating Lesson category.');
                    $response['redirect'] = site_url('admin/lesson_categories');
                }
            }
        }
        
        $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($response));
    }
    
    function delete($id)
    {
        if(is_numeric($id))
        {
            $lesson_categories = $this->lesson_cat_model->fromID($id);
            if($lesson_categories)
            {
                $this->lesson_cat_model->delete($id);
                $this->session->set_flashdata('message-title', 'Delete Lesson Category');
                $this->session->set_flashdata('success', 'Lesson category has been deleted');
            }
        }
        redirect('admin/lesson_categories');
    }
    
    /////

  function delete_pp($user_id)     
  {

    $this->data['user_id'] = $user_id;

    $this->load->view('admin/users/remove',$this->data);
  }

  

  

  function view($user_id)
  {     

    $this->data['user'] = $this->admin_users->get_user_by_id($user_id);

      $this->data['user_id']=$user_id;

      $this->data['body']='admin/users/view';

      $this->load->view('admin/common/structure',$this->data);    

  }

  function save($user_id)
  {
    //Set Form validation rules

      $this->form_validation->set_rules('first_name', 'First Name', 'trim|xss_clean|required|alpha|callback_name_check');

    $this->form_validation->set_rules('last_name', 'Last Name', 'trim|xss_clean|required|alpha|callback_name_check');

      $this->form_validation->set_rules('email', 'Email Address', 'trim|xss_clean|required|valid_email|callback_username_check');

    if($user_id==0)
    {
      $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required');
      $this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|xss_clean|required|callback_same');
    } else {

      if($this->input->post('password',TRUE) != '' || $this->input->post('confirm',TRUE)!='') 
      { 
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required');

        $this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|xss_clean|required|callback_same');
      }
    } 

    $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

      if ($this->form_validation->run() != FALSE)
    {

        $first_name=$this->input->post('first_name',true);

      $last_name=$this->input->post('last_name',true);

      $email=$this->input->post('email',true);

      $password=$this->input->post('password',true);

        $active = $this->input->post('active',true); 
                       
      $this->admin_users->SaveAdminUser($first_name, $last_name, $email, $password, $user_id, $active);   //Calling model function for save admin user details

      if ($user_id==0){     

        $this->data['edit']='new';

        $this->session->set_flashdata('message', 'User added successfully');

      redirect('admin/users');

        }else 

        $this->session->set_flashdata('message', 'User updated successfully');

      redirect('admin/users');
      } else {

      $this->edit($user_id);

    }
  }

  function same($confirm)
  {
    $pass=$this->input->post('password');

    if ($confirm!=$pass)
    {

      $this->form_validation->set_message('same', "The two passwords do not match");

      return FALSE;
    } else {

      return TRUE;

    }
  }

  function name_check($name)
  {
    if ($name=='First Name' || $name=='Last Name')
    {
      $this->form_validation->set_message('name_check', "The ".$name." is required");
      return FALSE;
    } else {

      return TRUE;
    }
  }

  function username_check($email) 
  { 

    $result=$this->admin_users->CheckAdminUser($email, $this->session->userdata('edit_user_id'));

    if(count($result)>0){

      $this->form_validation->set_message('username_check', 'This email address already exist in our database.');

      return FALSE;
    } else {

      return TRUE;

    }
  }
  
  function  get_overall() {
 
    $stage=$this->input->post('stage');
   
    if($stage!=''){
     $result=$this->lesson_cat_model->get_overall($stage);
	       echo '<option value="">select</option>';
    foreach($result as $res){
           echo '<option>'.$res->overall.'</option>';
         }

    }
 }  
  
function  get_sub1() {
 
  $overall=$this->input->post('overall');
   
   if($overall!=''){
     $result=$this->lesson_cat_model->get_sub1($overall);
	   echo '<option value="">select</option>';
  foreach($result as $res){
  
   echo '<option>'.$res->sub1.'</option>';
  
  }
   }
   
 }  
  
  
}
?>