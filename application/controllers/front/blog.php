<?php
class Blog extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		// Your own constructor code

		$this->data = array();	

		$this->data['sel'] = 'blog';
	}

	function index()
	{ 
		$this->data['meta']  = getMetaContent('blog');

		$this->data['content'] = $this->data['meta']['data'];
		
		$blog_not_member  = getMetaContent('blog_not_member','data');

		$this->data['not_member'] = $blog_not_member['data'];
		
		$this->data['body']='front/blog/home';

		$this->load->view('front/common/structure',$this->data);
	}
	
	function detail()
	{ 
		$this->data['meta']  = getMetaContent('blog_detail','meta');
		
		$confirmation  = getMetaContent('blog_comment_confirmation','data');

		$this->data['confirmation'] = $confirmation['data'];
		
		$this->data['body']='front/blog/blog_detail';

		$this->load->view('front/common/structure',$this->data);
	}

	function not_member()
	{ 
		$this->data['meta']  = getMetaContent('comment_not_member','data');

		$this->data['content'] = $this->data['meta']['data']; 

		$this->load->view('front/comment_not_member',$this->data);
	} 
	
	function facebook()
	{
		$this->load->view('front/blog/facebook',$this->data);
	}
	
	function facebook_confirmation()
	{
		$confirmation  = getMetaContent('blog_facebook_confirmation','data');

		$this->data['confirmation'] = $confirmation['data'];
		
		$this->load->view('front/blog/facebook_confirmation',$this->data);
	}
	
	function twitter()
	{
		$this->load->view('front/blog/twitter',$this->data);
	}
	
	function twitter_confirmation()
	{
		$confirmation  = getMetaContent('blog_twitter_confirmation','data');

		$this->data['confirmation'] = $confirmation['data'];
		
		$this->load->view('front/blog/twitter_confirmation',$this->data);
	}
	
	function linkedin()
	{
		$this->load->view('front/blog/linkedin',$this->data);
	}
	
	function linkedin_confirmation()
	{
		$confirmation  = getMetaContent('blog_linkedin_confirmation','data');

		$this->data['confirmation'] = $confirmation['data'];
		
		$this->load->view('front/blog/linkedin_confirmation',$this->data);
	}
 }
?>
