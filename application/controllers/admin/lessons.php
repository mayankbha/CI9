<?php

/*
 * @author WebSiteDesignz Team
 * @package controller.Lessons
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * The Lessons Controller is used to handle All Lessons Requests.
 * @class Lessons
 */

class Lessons extends CI_Controller
{

    /**
     * The Constructor is used to Load All Libraries, Helpers and Models
     * used by Lessons Methods.
     * @constructor
     */
	var $perPage = 15;
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin_id') == FALSE){
            redirect('admin/login');
			
		}	
		
       $this->header_data = array('system_message' => $this->session->flashdata('message'));

        $this->load->model('lesson_model');
		
	    $this->load->model('Lesson_cat_model');
		
	    $this->load->library('form_validation');
        $this->load->library('my_pagination');
        $this->data = array();
       
        $this->data['sel']='lessons';
        $this->data['display_menu']='yes';
		
		$config['upload_path'] = 'upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size']  = '500000';
		$this->load->library('upload',$config);
		
		//$this->output->enable_profiler(TRUE); 
      
    }

    /**
     * This method is used to List all Lessons
     * @method index
     * @param fields {String=''} order by field
     * @param order_type {String=asc} order asc
     * @example
     *       site_url/admin/lessons
     * 
     */
    function index($order='',$orderBy="id",$page=1)
    {
        // $this->data['emails'] = $this->outbound_email_model->getEmailList($fields, $order_type);
		$this->data['page']=$page;
        $this->data['orderBy']=$orderBy;
	  	$this->data['order'] = $order=='asc'?'desc':'asc';
     
        $this->data['lesson']=$this->lesson_model->display_all_lesson_categories(array(),$this->data['orderBy'],$this->data['order'],$this->perPage,($page-1)*$this->perPage);

        $this->data['number'] = $this->lesson_model->get_numerical_order($id='');

        $this->data['body']='admin/lessons/list';

        $this->data['message']=$this->session->flashdata('message');

        $this->load->view('admin/common/structure',$this->data);
    }

    /**
     * This method is used to List all Lessons feedbacks
     * @method feedbacks
     * @param fields {String=''} order by field
     * @param order_type {String=asc} order asc
     * @example
     *       site_url/admin/lessons/feedbacks
     * 
     */
    function feedbacks($fields='' , $order_type='asc')
    {
        // $this->data['emails'] = $this->outbound_email_model->getEmailList($fields, $order_type);

        $this->data['order_type'] = ($order_type=='asc') ? 'desc' : 'asc';

        $this->data['body']='admin/lessons/feedbacks_list';

        $this->data['message']=$this->session->flashdata('message');

        $this->load->view('admin/common/structure',$this->data);
    }

    /**
     * This method is used to List all Lessons' recommendations
     * @method recommendations
     * @param fields {String=''} order by field
     * @param order_type {String=asc} order asc
     * @example
     *       site_url/admin/lessons/recommendations
     * 
     */
    function recommendations($fields='' , $order_type='asc')
    {
        // $this->data['emails'] = $this->outbound_email_model->getEmailList($fields, $order_type);
         $searchBy  = isset($_POST['searchBy']) ? $_POST['searchBy'] : '' ;
  $search  = isset($_POST['search']) ? $_POST['search']   : '' ;
   $this->data['recommendation']=$this->lesson_model->get_recommendation_data($searchBy,$search);
        // $this->data['emails'] = $this->outbound_email_model->getEmailList($fields, $order_type);
  $this->data['searchBy'] = $searchBy;
        $this->data['order_type'] = ($order_type=='asc') ? 'desc' : 'asc';

        $this->data['body']='admin/lessons/recommendations_list';

        $this->data['message']=$this->session->flashdata('message');

        $this->load->view('admin/common/structure',$this->data);
    }

    /**
     * This method is used to List all Lessons' categories
     * @method categories
     * @param fields {String=''} order by field
     * @param order_type {String=asc} order asc
     * @example
     *       site_url/admin/lessons/categories
     * 
     */
    function categories($fields='' , $order_type='asc')
    {
        // $this->data['emails'] = $this->outbound_email_model->getEmailList($fields, $order_type);

        $this->data['order_type'] = ($order_type=='asc') ? 'desc' : 'asc';

        $this->data['body']='admin/lessons/categories_list';

        $this->data['message']=$this->session->flashdata('message');

        $this->load->view('admin/common/structure',$this->data);
    }

    /**
     * This method is used to view Lesson
     * @method view
     * @example
     *       site_url/admin/lessons/view
     * 
     */
    function view($id=0)
    {
        // $this->data['emails'] = $this->outbound_email_model->getEmailList($fields, $order_type);
        //$this->data['lessons'] = $this->lesson_model->get_lesson_categories_list();
		
		$this->data['only_lesson'] =$this->lesson_model->get_only_lesson($id);
		$this->data['lesson_slide'] = $lesson= $this->lesson_model->get_lesson_slide($id);
		$this->data['lesson_todo'] = $this->lesson_model->get_lesson_todo($id);
		$this->data['lesson_checklist'] = $this->lesson_model->get_lesson_checklist($id);
		$this->data['recommendation'] = $this->lesson_model->get_recommendation();
		$this->data['number'] = $this->lesson_model->get_numerical_order($id);
        $this->data['body']='admin/lessons/view';
       
	   foreach($lesson as $ls){
		 $i = imagecreatefromjpeg(base_url()."upload/".$ls->image_link);
		 $thumb = $this->lesson_model->thumbnail_box($i, 422, 317);
		 imagejpeg($thumb,"upload/".$ls->image_link);
        }   

        $this->data['message']=$this->session->flashdata('message');

        $this->load->view('admin/common/structure',$this->data);
    }

    /**
     * This method is used to add/edit Lesson
     * @method edit
     * @example
     *       site_url/admin/lessons/edit
     * 
     */
    function edit($id=0)
    {
	
		

		$this->data['lessons'] = $this->lesson_model->get_lesson_categories_list();
		$this->data['number'] = $this->lesson_model->get_numerical_order($id);
		$this->data['only_lesson'] = $this->lesson_model->get_only_lesson($id);
		$this->data['lesson_slide'] = $this->lesson_model->get_lesson_slide($id);
		$this->data['lesson_todo'] = $this->lesson_model->get_lesson_todo($id);
		$this->data['lesson_checklist'] = $this->lesson_model->get_lesson_checklist($id);
	    $this->data['stage']   = $this->lesson_model->get_stage_name();
	    $this->data['overall'] = $this->lesson_model->get_overall_name();
		$this->data['sub1']    = $this->lesson_model->get_sub1_name();
		$this->data['sub2']    = $this->lesson_model->get_sub2_name();
	
	
        $this->data['edited']=$id;
		$this->data['recommendation'] = $this->lesson_model->get_recommendation();
		  if ($this->input->post('do_edit_lesson')) {
		
		        $this->session->set_flashdata('message-title', 'Edit Lesson');
                $db = array();
				
				//insert lesson  data
				
                $db['title'] = $this->input->post('r_title');
                $db['stage'] = $this->input->post('r_stage');
                $db['overall'] = $this->input->post('r_overall');
                $db['sub1'] = $this->input->post('r_sub1');
                $db['sub2'] = $this->input->post('r_sub2');
			    $db['author'] = $this->input->post('r_name');
                $db['position'] = $this->input->post('r_position');
                $db['social_link'] = $this->input->post('r_social_link');
                $db['url'] = $this->input->post('r_url');
				$db['recommendation'] = $this->input->post('r_recommendation');
				
				$db_number['number']=$this->input->post('r_lesson_no');;
				//insert slide data
				
                $db_lesson_slides['content']   = $this->input->post('slide_content');
                $db_lesson_slides['points'] = $this->input->post('slide_points');
                $db_lesson_slides['video_link'] = $this->input->post('slide_video_link');
				$db_lesson_slides['image_link'] = $this->input->post('slide_image_link');
				$db_lesson_slides['position'] = $this->input->post('r_position');
				$db_lesson_slides['noofslide'] = $this->input->post('noofslide');
			
			
		    for($i = 0;$i<count($_FILES['filename']['name']); $i++){
			    if(isset($_FILES['filename']['name'][$i])){
			
		           move_uploaded_file($_FILES["filename"]["tmp_name"][$i],
      "upload/" .$_FILES["filename"]["name"][$i]);
	  
			    }
				 //$db_lesson_slides[] = md5($_FILES["filename"]["name"][$i]);
			   } 
				
		   	
				
			
				//insert TODO items 
				
				$db_to_do['item'] = $this->input->post('todo_item');
				$db_to_do['position'] = $this->input->post('r_position');
				$db_to_do['action'] = $this->input->post('action');
				$db_to_do['nooftodo'] = $this->input->post('nooftodo');
				
				
				//add checklist data
				
				$db_check_list['title'] = $this->input->post('check_list_title');
				$db_check_list['instructions1'] = $this->input->post('check_list_instructions1');
				$db_check_list['item'] = $this->input->post('check_list_item');
				$db_check_list['instructions2'] = $this->input->post('check_list_instructions2');
				$db_check_list['position'] = $this->input->post('r_position');
				$db_check_list['noofchecklist'] = $this->input->post('noofchecklist');
				
			
				//var_dump($db_to_do['nooftodo']);
			
				
			    $id = $this->lesson_model->update($id,$db,$db_number,$db_lesson_slides,$db_to_do,$db_check_list);
                $this->session->set_flashdata('success', 'Lesson updated successfully ');
                redirect('admin/lessons');
		 }
		
		
		
        $this->data['body']='admin/lessons/edit';

        $this->data['message']=$this->session->flashdata('message');

        $this->load->view('admin/common/structure',$this->data);
    }
	
   function add()
    {
		
        // $this->data['emails'] = $this->outbound_email_model->getEmailList($fields, $order_type);
		 $this->data['lessons'] = $this->lesson_model->get_lesson_categories_list();
		 $this->data['recommendation'] = $this->lesson_model->get_recommendation();
		 
		 $this->data['edited']=0;
        if ($this->input->post('do_save_lesson')=='save') {
		
		        $this->session->set_flashdata('message-title', 'Add Lesson');
                $db = array();
				//insert lesson  data
				
                $db['title'] = $this->input->post('r_title');
                $db['stage'] = $this->input->post('r_stage');
                $db['overall'] = $this->input->post('r_overall');
                $db['sub1'] = $this->input->post('r_sub1');
                $db['sub2'] = $this->input->post('r_sub2');
			    $db['author'] = $this->input->post('r_name');
                $db['position'] = $this->input->post('r_position');
                $db['social_link'] = $this->input->post('r_social_link');
                $db['url'] = $this->input->post('r_url');
				$db['number'] = $this->input->post('r_lesson_no');
				$db['recommendation'] = $this->input->post('r_recommendation');
				
				//insert slide data
				
                $db_lesson_slides['content']   = $this->input->post('slide_content');
                $db_lesson_slides['points'] = $this->input->post('slide_points');
                $db_lesson_slides['video_link'] = $this->input->post('slide_video_link');
			    $db_lesson_slides['image_link'] = $this->input->post('slide_image_link');
				$db_lesson_slides['position'] = $this->input->post('r_position');
				$db_lesson_slides['noofslide'] = $this->input->post('noofslide');
			
		
			for($i = 0;$i<count($_FILES['filename']['name']); $i++){
			 				
			if(isset($_FILES['filename']['name'][$i])){
			
		       move_uploaded_file($_FILES["filename"]["tmp_name"][$i],
      "upload/" . $_FILES["filename"]["name"][$i]);
	  
			    }
			   } 
			 
			 
				//insert TODO items 
				
				$db_to_do['item'] = $this->input->post('todo_item');
				$db_to_do['position'] = $this->input->post('r_position');
				$db_to_do['action'] = $this->input->post('action');
				$db_to_do['nooftodo'] = $this->input->post('nooftodo');
				
				//add checklist data
				
				$db_check_list['title'] = $this->input->post('check_list_title');
				$db_check_list['instructions1'] = $this->input->post('check_list_instructions1');
				$db_check_list['item'] = $this->input->post('check_list_item');
				$db_check_list['instructions2'] = $this->input->post('check_list_instructions2');
				$db_check_list['position'] = $this->input->post('r_position');
				$db_check_list['noofchecklist'] = $this->input->post('noofchecklist');
				
				
				
			    $id = $this->lesson_model->add_lesson_categories($db,$db_lesson_slides,$db_to_do,$db_check_list);
			   
                $this->session->set_flashdata('success', 'Lesson Added successfully ');
                redirect('admin/lessons');
		 }

     $this->data['body']='admin/lessons/edit';

     $this->data['message']=$this->session->flashdata('message');

     $this->load->view('admin/common/structure',$this->data);
    } 
	
	function delete($id) {
	
	$this->lesson_model->delete_lesson($id);
	  redirect('admin/lessons');
	}
	
   function  get_overall() {
 
    $stage=$this->input->post('stage');
   
    if($stage!=''){
     $result=$this->lesson_model->get_overall($stage);
	       echo '<option value="">select</option>';
    foreach($result as $res){
           echo '<option>'.$res->overall.'</option>';
         }

    }
 }  
  
function  get_sub1() {
 
  $overall=$this->input->post('overall');
   
   if($overall!=''){
     $result=$this->lesson_model->get_sub1($overall);
	     echo '<option value="">select</option>';
	    foreach($result as $res){
          echo '<option>'.$res->sub1.'</option>';
        }
   }
 
 }  
 
 function  get_sub2() {
 
  $sub1=$this->input->post('sub1');
   
   if($sub1!=''){
     $result=$this->lesson_model->get_sub2($sub1);
	   echo '<option value="">select</option>';
	  foreach($result as $res){
       echo '<option>'.$res->sub2.'</option>';
      }
	 
   }
 
 }    
	
function  check_lesson_number() {
 
  $val=$this->input->post('val');
   
   if($val!=''){
     $result=$this->lesson_model->check_lesson_number($val);
	 
	 if($result!=0){
         echo 'This Lesson Number Already Exist! Do You Want to Continue ?';
	   }
    }
 
 }    	
 
 function  remove_slide() {
  $val=$this->input->post('slideid');
   if($val!=''){
     $result=$this->lesson_model->remove_slide($val);
	}
 }
 
 function  remove_todo_item() {
  $val=$this->input->post('todoid');
   if($val!=''){
     $result=$this->lesson_model->remove_todo_item($val);
	}
 }    	    	
	
 function  remove_checklist_item() {
  $val=$this->input->post('checklistid');
   if($val!=''){
     $result=$this->lesson_model->remove_checklist_item($val);
	}
 }   
 	
}
?>
