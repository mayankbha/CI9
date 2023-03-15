<?php
/*
 * @author WebSiteDesignz Team
 * @package controller.Home
 */

if (!defined('BASEPATH'))exit('No direct script access allowed');

/**
 * The Home Controller is used to handle All Home Requests.
 * @class Home
 */
class Home extends CI_Controller 
{
	/**
     * The Constructor is used to Load All Libraries, Helpers and Models
     * used by Home Methods.
     * @constructor
     */
	function __construct()
	{
		parent::__construct();

		$this->data = array();	

		$this->data['sel'] = 'home';
	}

	/**
     * This method is used to View HomePage
     * @method index
     * @example
     *       site_url/home
     * 
     */
	function index()
	{ 
		$this->data['meta']  = getMetaContent('home');

		$this->data['content'] = $this->data['meta']['data'];
		
 		 $meow_teaches  = getMetaContent('home_meow_teaches_left','data');

		$this->data['meow_teaches_left'] = $meow_teaches['data'];
		
		$meow_teaches_right  = getMetaContent('home_meow_teaches_right','data');
	
		$this->data['meow_teaches_right'] = $meow_teaches_right['data'];
		
		$free_for_all  = getMetaContent('home_free_for_all','data');
	
		$this->data['free_for_all'] = $free_for_all['data'];
		
		$home_best  = getMetaContent('home_best','data');
	
		$this->data['best'] = $home_best['data'];
		
		$home_interactive  = getMetaContent('home_interactive','data');
	
		$this->data['interactive'] = $home_interactive['data'];
		
		$community_based  = getMetaContent('home_community_based','data');
	
		$this->data['community_based'] = $community_based['data'];
		
		 if($this->input->get('confirm')){
		  $this->data['confirm']=$this->input->get('confirm');
		 } else {
			$this->data['confirm'] = '';
		 }
		
		$this->data['body']='front/home';

		$this->load->view('front/common/structure',$this->data);
	}

 }
