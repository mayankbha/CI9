<?php
class About extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		// Your own constructor code

		$this->data = array();	

		$this->data['sel'] = 'aboutus';
	}

	function index()
	{ 
		 $this->data['meta']  = getMetaContent('aboutus');
		 
		$this->data['content'] = $this->data['meta']['data'];
		
		$this->data['body']='front/about';
		
		$this->load->view('front/common/structure',$this->data);
	}
       
        
        
}

?>
