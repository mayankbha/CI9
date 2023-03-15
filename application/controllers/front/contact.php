<?php
class Contact extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		// Your own constructor code

		$this->data = array();	

		$this->data['sel'] = 'contactus';
	}

	function index()
	{ 
		$this->data['meta']  = getMetaContent('contactus');
		
		$this->data['content'] = $this->data['meta']['data'];
		
		$contactus_address = getMetaContent('contactus_address','data');
		
		$this->data['address'] = $contactus_address['data'];
		
		$contactus_email = getMetaContent('contactus_email','data');
		
		$this->data['email'] = $contactus_email['data'];
		
		$contactus_phone = getMetaContent('contactus_phone','data');
		
		$this->data['phone'] = $contactus_phone['data'];
		
		$contactus_confirmtion = getMetaContent('contactus_confirmtion','data');
		
		$this->data['confirmtion'] = $contactus_confirmtion['data'];
		
		$this->data['body']='front/contactus';
		
		$this->load->view('front/common/structure',$this->data);
	}        
}

?>
