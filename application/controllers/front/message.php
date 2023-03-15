<?php
class Message extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();

    // Your own constructor code

    $this->data = array();  

    $this->data['sel'] = 'message';
	
	$this->data['headerConfition'] = 'yes';			//Removable when functional programming and set navigation of login session
  }

  function index()
  { 
    $this->data['meta']  = getMetaContent('message','meta');

    $this->data['body']='front/message';

    $this->load->view('front/common/structure',$this->data);
  }
  
  function send($name=0)
  {
  	$this->data['meta']  = getMetaContent('message_send','meta');
    $this->data['name']=$name;
    $this->data['body']='front/message_send';

    $this->load->view('front/common/structure',$this->data);
  }
  
  function reply()
  {
  	$this->data['meta']  = getMetaContent('message_reply','meta');

    $this->data['body']='front/message_reply';

    $this->load->view('front/common/structure',$this->data);
  }
  
  function view()
  {
  	$this->data['meta']  = getMetaContent('message_view','meta');

    $this->data['body']='front/message_view';

    $this->load->view('front/common/structure',$this->data);
  }  
  
  function remove()
  {
  	$this->data['meta']  = getMetaContent('message_remove','data');

	$this->data['content']	= $this->data['meta']['data'];
	
    $this->load->view('front/message_remove',$this->data);
  }    
}

?>