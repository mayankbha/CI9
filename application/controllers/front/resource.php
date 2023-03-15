<?php

class Resource extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
       if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $this->orderFields = array();
        $this->load->library('form_validation');
        $this->load->library('my_pagination');
        $this->load->model('Resource_model');
        $this->load->model('Lesson_cat_model');
        $this->load->model('Survey_model');
        $this->data = array();
        $this->data['sel'] = 'resource';
        $this->data['display_menu'] = 'yes';
  //$this->output->enable_profiler(true);
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

    function page($page = 1)
    {
       
        $this->data['contents'] = $this->Resource_model->display_all_categories1(array(), 'id', 'DESC', $this->perPage, ($page - 1) * $this->perPage);
        $this->data['comments'] = $this->Resource_model->show_comment()->result();
        $this->pageTitle[] = "Resource List";
        $this->data['body'] = 'front/resources';
        $this->load->view('front/common/structure', $this->data);
    }

    /**
     * @Definition : Add the resource information to the database.
     */


   public function add_comment($id=0) {
    
   
 
    if($this->input->post('do_save_comment')){
    if($this->Resource_model->show_comment()->num_rows()>0){
       $this->data['comments'] = $this->Resource_model->show_comment()->result();
    }else{
     $this->data['comments']='';
    }
    $db['comment']=$this->input->post('comment');
    $db['cdate']   = date('Y-m-d H:i:s');
    $db['name'] =$this->session->userdata('username');
    $db['userid'] =$this->session->userdata('user_id');
    
    $this->Resource_model->add_comment($db);
    redirect('resource/resource_detail/'.$id);
  }
   
   }

  public function search()
  { 
  	$search = $this->input->post('searchword');
  
	$seachrecord=$this->Resource_model->search_user($search);
	$this->data['searchuser']=$seachrecord;
	$this->load->view('front/resource_search',$this->data);
	
  } 

    public
    function view_resource($id=0)
    {
  
        $this->data['resources']=$this->Resource_model->get_category_data_for_edit($id);
        $this->pageTitle[] = "View Resource";
        $this->data['body'] = 'front/resource_category';
        $this->load->view('front/common/structure', $this->data);

    }

     public
    function resource_detail($id=0)
    {
      
        $this->data['comments'] = $this->Resource_model->show_comment();
		$this->data['thump_up_down']= $this->Resource_model->get_thump_up_down($id,$this->session->userdata('user_id'))->row();
        $this->data['resources']=  $this->Resource_model->get_category_data_for_edit_1($id);
        $this->pageTitle[] = "Resource Detail";
		$this->data['rid']=$id;
        $this->data['body'] = 'front/resource_detail';
        $this->load->view('front/common/structure', $this->data);

    }

  public
    function resource_facebook($id=0)
    {
     
        $this->data['resources']=$this->Resource_model->get_category_data_for_edit($id);
        $this->pageTitle[] = "Resource Facebook";
        $this->data['body'] = 'front/resource_facebook';
        $this->load->view('front/common/structure', $this->data);

    }

  public
    function resource_twitter($id=0)
    {
  
        $this->data['resources']=$this->Resource_model->get_category_data_for_edit($id);
        $this->pageTitle[] = "Resource Twitter";
        $this->data['body'] = 'front/resource_twitter';
        $this->load->view('front/common/structure', $this->data);

    }
    
   public
    function resource_linkedin($id=0)
    {
  
        $this->data['resources']=$this->Resource_model->get_category_data_for_edit($id);
        $this->pageTitle[] = "Resource Twitter";
        $this->data['body'] = 'front/resource_linkedin';
        $this->load->view('front/common/structure', $this->data);

    }
    
  
  
     public
    function resource_email($id=0)
    {
  
        $this->data['resources']=$this->Resource_model->get_category_data_for_edit($id);
        $this->pageTitle[] = "Resource Email";
        $this->data['body'] = 'front/resource_email';
        $this->load->view('front/common/structure', $this->data);

    }

  public function save_down() {
   $db['r_id']=$this->input->post('rid');
   $db['userid'] =$this->session->userdata('user_id');
   $down=  $this->Resource_model->save_down($db);
   echo $down;
  }
  
   public function save_up() {
   
   $db['r_id']=$this->input->post('rid');
   $db['userid'] =$this->session->userdata('user_id');
   $up=  $this->Resource_model->save_up($db);
   echo $up;
  }

}