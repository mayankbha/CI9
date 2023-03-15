<?php
class Reading extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();

    // Your own constructor code

    $this->data = array();  

    $this->data['sel'] = 'reading';
	
	$this->data['headerConfition'] = 'yes';			//Removable when functional programming and set navigation of login session
  }

  function index()
  { 
    $this->data['meta']  = getMetaContent('reading','meta');

    $this->data['body']='front/reading';

    $this->load->view('front/common/structure',$this->data);
  }
        
}

?>