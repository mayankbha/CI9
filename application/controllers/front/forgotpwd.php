<?php
class Forgotpwd extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		// Your own constructor code

		$this->data = array();	

		$this->data['sel'] = 'forgotpwd';
	}

	function index()
	{ 
		$this->data['meta']  = getMetaContent('forgotpwd');
		
		$this->data['forget_content'] = $this->data['meta']['data'];

		$confirmation  = getMetaContent('forgotpwd_confirmation','data');
		
		$this->data['content'] = $confirmation['data'];
		
		$this->data['body']='front/forgotpwd';

		$this->load->view('front/common/structure',$this->data);
	}
       
  
        
}

?>
