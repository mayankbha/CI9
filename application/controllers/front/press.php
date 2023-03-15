<?php
class Press extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		// Your own constructor code

		$this->data = array();	

		$this->data['sel'] = 'press';
	}

	function index()
	{ 
		 $this->data['meta']  = getMetaContent('press');
		 
		$this->data['content'] = $this->data['meta']['data'];
		
		$press_image  = getMetaContent('press_image','data');
		 
		$this->data['image'] = $press_image['data'];
		
		$press_new_title_1  = getMetaContent('press_new_title_1','data');
		 
		$this->data['press_new_title_1'] = $press_new_title_1['data'];
		
		$press_new_date_1  = getMetaContent('press_new_date_1','data');
		 
		$this->data['press_new_date_1'] = $press_new_date_1['data'];
		
		$press_new_content_1  = getMetaContent('press_new_content_1','data');
		 
		$this->data['press_new_content_1'] = $press_new_content_1['data'];
		
		$press_new_title_2  = getMetaContent('press_new_title_2','data');
		 
		$this->data['press_new_title_2'] = $press_new_title_2['data'];
		
		$press_new_date_2  = getMetaContent('press_new_date_2','data');
		 
		$this->data['press_new_date_2'] = $press_new_date_2['data'];
		
		$press_new_content_2  = getMetaContent('press_new_content_2','data');
		 
		$this->data['press_new_content_2'] = $press_new_content_2['data'];
		
		$press_new_title_3  = getMetaContent('press_new_title_3','data');
		 
		$this->data['press_new_title_3'] = $press_new_title_3['data'];
		
		$press_new_date_3  = getMetaContent('press_new_date_3','data');
		 
		$this->data['press_new_date_3'] = $press_new_date_3['data'];
		
		$press_new_content_3  = getMetaContent('press_new_content_3','data');
		 
		$this->data['press_new_content_3'] = $press_new_content_3['data'];
		
		$this->data['body']='front/press';
		
		$this->load->view('front/common/structure',$this->data);
	}
    
    function confirmation()
	{ 
		$this->data['meta']  = getMetaContent('press_confirmation','data');

		$this->data['content'] = $this->data['meta']['data']; 

		$this->load->view('front/press_confirmation',$this->data);
	} 
        
        
}

?>
