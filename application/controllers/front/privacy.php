<?php
class Privacy extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		// Your own constructor code

		$this->data = array();	

		$this->data['sel'] = 'privacy';
	}

	function index()
	{ 
		$this->data['meta']  = getMetaContent('privacy');
		
		$this->data['content'] = $this->data['meta']['data'];
		
		$this->data['body']='front/privacy';

		$this->load->view('front/common/structure',$this->data);
	}
       
        
        
}

?>
