<?php
class Recommendations extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();

    // Your own constructor code

    $this->data = array();  

    $this->data['sel'] = 'recommendations';
	
	$this->data['headerConfition'] = 'yes';			//Removable when functional programming and set navigation of login session
  }
  
  function index()
  {
  	 $this->data['meta']  = getMetaContent('recommendations','meta');

     $this->data['body']='front/recommendations';

     $this->load->view('front/common/structure',$this->data);
  } 
  
  function completed()
  { 
    $this->data['meta']  = getMetaContent('recommendations_completed','data');
	
	$this->data['content'] = $this->data['meta']['data']; 

    $this->load->view('front/recommendations_completed',$this->data);
  }
  
  function removed()
  { 
    $this->data['meta']  = getMetaContent('recommendations_removed','data');
	
	$this->data['content'] = $this->data['meta']['data']; 

    $this->load->view('front/recommendations_removed',$this->data);
  } 
  
  function remove_confirmation()
  { 
    $this->data['meta']  = getMetaContent('recommendations_remove_confirmation','data');

   	$this->data['content'] = $this->data['meta']['data']; 

    $this->load->view('front/recommendations_remove_confirmation',$this->data);
	
  }   
}

?>