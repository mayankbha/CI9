<?php
class Myaccount extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();

    // Your own constructor code

    $this->data = array();  

    $this->data['sel'] = 'myaccount';
	
	$this->data['headerConfition'] = 'yes';			//Removable when functional programming and set navigation of login session
	$this->load->model('resource_model');
	$this->load->model('myaccounts');
  }

  function index()
  { 
    $this->data['meta']  = getMetaContent('myaccount','meta');
    $this->data['body']='front/myaccount';
	$this->data['lesson']=$this->myaccounts->get_lesson();
    $this->data['checklist']=$this->resource_model->get_checklist();
    $this->data['learning_stage']=$this->myaccounts->get_lesson_category();
    $numberorder=$this->myaccounts->show_all_lesson_at_home();
	if($numberorder)
	 {
	   foreach($numberorder as $n){
	   
	     $this->data['ids'][]=$n->id;
	     $this->data['is_lesson'][]=$n->is_lesson;
		 $this->data['is_survey'][]=$n->is_survey;
	   }
	}
	
    $this->load->view('front/common/structure',$this->data);
  }
  
  function edit()
  {
  	$this->data['meta']  = getMetaContent('myaccount_edit','meta');
	
	$confirmation = getMetaContent('myaccount_edit_confirmation','data');
	
	$this->data['content'] = $confirmation['data'];

    $this->data['body']='front/myaccount_edit';

    $this->load->view('front/common/structure',$this->data);
  }
  
  function lesson_detail($id=0) {
  
   $this->data['lesson']=$this->myaccounts->get_lesson_view($id);
   $this->data['body'] ="front/lesson_detail";
   $this->load->view('front/common/structure',$this->data);  
  }
 
  
        
}

?>