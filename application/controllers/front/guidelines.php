<?php
class Guidelines extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		// Your own constructor code

		$this->data = array();	

		$this->data['sel'] = 'guidelines';
	}

	function index()
	{ 
		 $this->data['meta']  = getMetaContent('guidelines');
		 
		$this->data['content'] = $this->data['meta']['data'];
		
		$this->data['body']='front/guidlines';
		
		$this->load->view('front/common/structure',$this->data);
	}
       
        
        
}

?>
