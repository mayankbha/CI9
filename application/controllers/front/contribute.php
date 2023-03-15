<?php
class Contribute extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		// Your own constructor code

		$this->data = array();	

		$this->data['sel'] = 'contribute';
	}

	function index()
	{ 
		 $this->data['meta']  = getMetaContent('contribute');
		 
		$this->data['content'] = $this->data['meta']['data'];
		
		$contribute_image  = getMetaContent('contribute_image','data');
		 
		$this->data['image'] = $contribute_image['data'];
		
		$this->data['body']='front/contribute';
		
		$this->load->view('front/common/structure',$this->data);
	}

	function confirmation()
	{ 
		$this->data['meta']  = getMetaContent('contribute_confirmation','data');

		$this->data['content'] = $this->data['meta']['data']; 

		$this->load->view('front/contribute_confirmation',$this->data);
	} 
       
        
        
}

?>
