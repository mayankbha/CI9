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

class Recommendations extends CI_Controller
{

    /**
     * The Constructor is used to Load All Libraries, Helpers and Models
     * used by Lessons Methods.
     * @constructor
     */
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin_id') == FALSE)
            redirect('admin/login');
        $this->header_data = array('system_message' => $this->session->flashdata('message'));

        $this->load->model('lesson_model');
	    $this->load->model('Lesson_cat_model');
		$this->load->model('Recommendation_model');
	    $this->load->library('form_validation');

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
	
	public function index($order='',$orderby='id',$searchBy='',$search=''){
	
		$this->data['body']='admin/recommendation/recommendations_list';
		
		$this->data['searchBy'] = $searchBy=='asc'?'desc':'asc';
		
		$this->data['order'] = $order=='asc'?'desc':'asc';
		$this->data['orderby'] = $orderby;
		
		$this->data['search'] = $search;
		
		$this->data['recommendations'] = $this->Recommendation_model->get_recommendations($this->data);

        $this->data['message']=$this->session->flashdata('message');

        $this->load->view('admin/common/structure',$this->data);
	}

    public function add()
    {

		if(!empty($_POST)){
			$d['title'] 				= isset($_POST['title']) 			? $_POST['title'] 			: '' ;
			$d['description'] 			= isset($_POST['description']) 		? $_POST['description'] 	: '' ;
			$d['video'] 				= isset($_POST['video']) 			? $_POST['video'] 			: '' ;
			$d['affiliate_link'] 		= isset($_POST['affiliate_link']) 	? $_POST['affiliate_link'] 	: '' ;
			$d['stage'] 				= isset($_POST['stage']) 			? $_POST['stage'] 			: '' ;
			$d['overall'] 				= isset($_POST['overall']) 			? $_POST['overall'] 		: '' ;
			$d['sub1'] 					= isset($_POST['sub1']) 			? $_POST['sub1'] 			: '' ;
			$d['sub2'] 					= isset($_POST['sub2']) 			? $_POST['sub2'] 			: '' ;
			$d['lesson_id'] 			= isset($_POST['lessons']) 			? $_POST['lessons'] 		: '' ;
			$d['survey_id'] 			= isset($_POST['survey']) 			? $_POST['survey'] 			: '' ;
			
            foreach($_FILES as $field => $file)
            {
                // No problems with the file
                if($file['error'] == 0)
                {
				   
                    // So lets upload
                    if ($this->upload->do_upload($field))
                    {
                        $data = $this->upload->data();
						$d['image'] = $data['file_name'];
                    }
                    else
                    {
                        $errors = $this->upload->display_errors();
                    }
                
            }
			}
		
			$this->Recommendation_model->insert($d);
			redirect(site_url('admin/recommendations'));
		}
		
		$this->data['lessons'] 	= $this->Recommendation_model->get_lessonss();
		
		$this->data['surveys'] 	= $this->Recommendation_model->get_surveyss();
		
		$this->data['lcs'] 	= $this->Recommendation_model->get_lesson_categories();
		
        $this->data['body']='admin/recommendation/add';

        $this->data['message']=$this->session->flashdata('message');

        $this->load->view('admin/common/structure',$this->data);
    }
	
	public function edit($id){
		if(!empty($_POST)){
			$d['title'] 				= isset($_POST['title']) 			? $_POST['title'] 			: '' ;
			$d['description'] 			= isset($_POST['description']) 		? $_POST['description'] 	: '' ;
			$d['video'] 				= isset($_POST['video']) 			? $_POST['video'] 			: '' ;
			$d['affiliate_link'] 		= isset($_POST['affiliate_link']) 	? $_POST['affiliate_link'] 	: '' ;
			$d['stage'] 				= isset($_POST['stage']) 			? $_POST['stage'] 			: '' ;
			$d['overall'] 				= isset($_POST['overall']) 			? $_POST['overall'] 		: '' ;
			$d['sub1'] 					= isset($_POST['sub1']) 			? $_POST['sub1'] 			: '' ;
			$d['sub2'] 					= isset($_POST['sub2']) 			? $_POST['sub2'] 			: '' ;
			$d['lesson_id'] 			= isset($_POST['lessons']) 			? $_POST['lessons'] 		: '' ;
			$d['survey_id'] 			= isset($_POST['survey']) 			? $_POST['survey'] 			: '' ;
			
			foreach($_FILES as $field => $file)
            {
                // No problems with the file
                if($file['error'] == 0)
                {
				   
                    // So lets upload
                    if ($this->upload->do_upload($field))
                    {
                        $data = $this->upload->data();
						$d['image'] = $data['file_name'];
                    }
                    else
                    {
                        $errors = $this->upload->display_errors();
                    }
                
            }
			}
			
			$this->Recommendation_model->update($id,$d);
			redirect(site_url('admin/recommendations'));
		}
		
		
		
		$this->data['lcs'] 	= $this->Recommendation_model->get_lesson_categories();
		
        $this->data['body']='admin/recommendation/edit';

        $this->data['message']=$this->session->flashdata('message');
		
		$this->data['recommendation'] = $this->Recommendation_model->get_recommendation($id);
		
		$this->data['lessons'] 	= $this->Recommendation_model->get_lessons($this->Recommendation_model->get_recommendation($id)->sub2);
		
		//var_dump($this->data['recommendation']);die;
		
		$this->data['surveys'] 	= $this->Recommendation_model->get_surveys($this->Recommendation_model->get_recommendation($id)->sub2);

   //var_dump($this->data['recommendation']); var_dump($this->data['lcs']);die;
        $this->load->view('admin/common/structure',$this->data);
	}
	
	public function view($id){
		
		$this->data['body']='admin/recommendation/view';
		
		$this->data['recommendation'] = $this->Recommendation_model->get_recommendation_name($id);
		
		$i = imagecreatefromjpeg(base_url()."upload/".$this->Recommendation_model->get_recommendation_name($id)->image);
		$thumb = $this->Recommendation_model->thumbnail_box($i, 422, 317);
		imagejpeg($thumb,"upload/".$this->Recommendation_model->get_recommendation_name($id)->image);
			
		//$this->data['recommendation'] = $this->Recommendation_model->get_lesson_name($this->data['recommendation']->lesson_id);
		
		//$this->data['recommendation'] = $this->Recommendation_model->get_survey_name($this->data['recommendation']->survey_id);

        $this->data['message']=$this->session->flashdata('message');
		
		$this->load->view('admin/common/structure',$this->data);
	}
	
	public function delete($id){
		$this->Recommendation_model->delete($id);
		redirect(site_url('admin/recommendations'));
	}
	
  public function search($order='') {
  
    $searchBy=$this->input->post('searchBy');
	
	$searchword=$this->input->post('search');
	
	$this->data['searchBy'] = $searchBy;
	
	$this->data['order'] = $order=='asc'?'desc':'asc';
	
	$this->data['search'] = $searchword;
	
	$this->data['body']='admin/recommendation/recommendations_list';
		
	$this->data['recommendations'] = $this->Recommendation_model->search($searchBy,$searchword);

	$this->data['message']=$this->session->flashdata('message');

	$this->load->view('admin/common/structure',$this->data);
	
	
  
  }	
	
 function  get_overall() {
 
  $stage=$this->input->post('stage');
   
   if($stage!=''){
     $result=$this->Recommendation_model->get_overall($stage);
   }
    echo '<option value="">Select</option>';
  foreach($result as $res){
  
   echo '<option>'.$res->overall.'</option>';
  
  }
 }	
	
function  get_sub1() {
 
  $overall=$this->input->post('overall');
   
   if($overall!=''){
     $result=$this->Recommendation_model->get_sub1($overall);
   }
    echo '<option value="">Select</option>';
  foreach($result as $res){
  
   echo '<option>'.$res->sub1.'</option>';
  
  }
 }	
 
 function  get_sub2() {
 
  $sub1=$this->input->post('sub1');
   
   if($sub1!=''){
     $result=$this->Recommendation_model->get_sub2($sub1);
   }
    echo '<option  value="">Select</option>';
  foreach($result as $res){
  
   echo '<option>'.$res->sub2.'</option>';
  
  }
 }		

 function  get_lesson() {
 
  $lesson=$this->input->post('lesson');
   
   if($lesson!=''){
     $result=$this->Recommendation_model->get_les($lesson);
   }
    echo '<option value="">Select</option>';
  foreach($result as $res){
  
   echo '<option>'.$res->title.'</option>';
  
  }
 }		

 function  get_survey() {
 
  $sur=$this->input->post('survey');
   
   if($sur!=''){
     $result=$this->Recommendation_model->get_sur($sur);
   }

   echo '<option value="">Select</option>';
  foreach($result as $res){
  
   echo '<option>'.$res->title.'</option>';
  
  }
 }				
	
}
?>
