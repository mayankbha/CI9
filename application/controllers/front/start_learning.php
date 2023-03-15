<?php
class Start_Learning extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();

    // Your own constructor code

    $this->data = array();  

    $this->data['sel'] = 'start_learning';
	
	$this->data['headerConfition'] = 'yes';			//Removable when functional programming and set navigation of login session
  }

  function index()
  { 
    $this->data['meta']  = getMetaContent('start_learning','meta');

    $this->data['body']='front/start_learning';

    $this->load->view('front/common/structure',$this->data);
  }
  
  function lession_detail()
  { 
    $this->data['meta']  = getMetaContent('lession_detail','meta');

    $this->data['body']='front/lession_detail';

    $this->load->view('front/common/structure',$this->data);
  }
  
  
  function lession_irrelevent()
  { 
    $this->data['meta']  = getMetaContent('lession_irrelevent','data');
	
	$this->data['content'] = $this->data['meta']['data']; 

    $this->load->view('front/lession_irrelevent',$this->data);
  }
  
  function lession_completed()
  { 
    $this->data['meta']  = getMetaContent('lession_completed','data');
	
	$this->data['content'] = $this->data['meta']['data']; 

    $this->load->view('front/lession_completed',$this->data);
  } 
  
  function lession_detail_last()
  { 
    $this->data['meta']  = getMetaContent('lession_detail_last','meta');

    $this->data['body']='front/lession_detail_last';

    $this->load->view('front/common/structure',$this->data);
  }
  
  function todo_completed()
  { 
    $this->data['meta']  = getMetaContent('todo_item_completed','data');
	
	$this->data['content'] = $this->data['meta']['data']; 

    $this->load->view('front/todo_completed',$this->data);
  }
  
  function todo_removed()
  { 
    $this->data['meta']  = getMetaContent('todo_item_removed','data');
	
	$this->data['content'] = $this->data['meta']['data']; 

    $this->load->view('front/todo_removed',$this->data);
  } 
  
  function todo_remove_confirmation()
  { 
    $this->data['meta']  = getMetaContent('todo_item_remove_confirmation','data');

   	$this->data['content'] = $this->data['meta']['data']; 

    $this->load->view('front/todo_remove_confirmation',$this->data);
	
  }   
  
  function progress()
  {
  	$this->data['meta']  = getMetaContent('lession_checklist','meta');

   	$this->data['content'] = $this->data['meta']['data']; 

    $this->load->view('front/lession_checklist',$this->data);
  }
  
  function survey()
  { 
    $this->data['meta']  = getMetaContent('survey','meta');

    $this->data['body']='front/survey';

    $this->load->view('front/common/structure',$this->data);
  }
  
  function view_surveys_detail()
  { 
    $this->data['meta']  = getMetaContent('view_surveys_detail','meta');

    $this->data['body']='front/view_surveys_detail';

    $this->load->view('front/common/structure',$this->data);
  }
 
}

?>