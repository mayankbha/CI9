<?php
class Partners extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		// Your own constructor code

		$this->data = array();	

		$this->data['sel'] = 'partners';
	}

	function index()
	{ 
		 $this->data['meta']  = getMetaContent('partners');
		 
		$this->data['content'] = $this->data['meta']['data'];
		
		$partners_image  = getMetaContent('partners_image','data');
		 
		$this->data['image'] = $partners_image['data'];
		
		$this->data['body']='front/partners';
		
		$this->load->view('front/common/structure',$this->data);
	}

	function confirmation()
	{ 
		$this->data['meta']  = getMetaContent('partners_confirmation','data');

		$this->data['content'] = $this->data['meta']['data']; 

		$this->load->view('front/partners_confirmation',$this->data);
	} 
       
        
        
}

?>
