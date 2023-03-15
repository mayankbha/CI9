<?php
class Terms extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		// Your own constructor code

		$this->data = array();	

		$this->data['sel'] = 'terms';
	}

	function index()
	{ 
		 $this->data['meta']  = getMetaContent('terms');
		 
		$this->data['content'] = $this->data['meta']['data'];
		
		$this->data['body']='front/terms';
		
		$this->load->view('front/common/structure',$this->data);
	}
       
        
        
}

?>
