<?php

/*
 * @author WebSiteDesignz Team
 * @package controller.Points
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * The Points Controller is used to handle All Points Requests.
 * @class Points
 */

class Points extends CI_Controller
{

    /**
     * The Constructor is used to Load All Libraries, Helpers and Models
     * used by Points Methods.
     * @constructor
     */
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin_id') == FALSE)
            redirect('admin/login');
        $this->header_data = array('system_message' => $this->session->flashdata('message'));

        $this->load->model('points_model');
		 //$this->load->library('form_validation');

        $this->data = array();

        $this->data['sel']='points';
        $this->data['display_menu']='yes';
		//$this->output->enable_profiler();

    }

    /**
     * This method is used to List all lessons Points
     * @method index
     * @param fields {String=''} order by field
     * @param order_type {String=asc} order asc
     * @example
     *       site_url/admin/points
     * 
     */
    function index($fields='' , $order_type='asc')
    {
        // $this->data['emails'] = $this->outbound_email_model->getEmailList($fields, $order_type);

        $this->data['points']=$this->points_model->get_point_value();
        $this->data['order_type'] = ($order_type=='asc') ? 'desc' : 'asc';

        $this->data['body']='admin/points/list';

        $this->data['message']=$this->session->flashdata('message');

        $this->load->view('admin/structure',$this->data);
    }
	
	function add($id=0) {
	
	 if($this->input->post('do_save_points')=="save"){
		 	  
	 if($id==1){ 
	                 $db['lesson']=$this->input->post('points');
	                 $this->points_model->add_point_value($db);
	  }else if($id==2)	{
	                 $db['stage']=$this->input->post('stage_points');
	                 $this->points_model->add_point_value($db);
	  
	  }else if($id==3) {
	                 $db['todo']=$this->input->post('todo_points');
	                 $this->points_model->add_point_value($db);
	  
	  }else if($id==4) {
	                 $db['recommendation']=$this->input->post('recommenpoints');
	                 $this->points_model->add_point_value($db);
	  
	  }else if($id==5) {
	                 $db['survey']=$this->input->post('surveypoints');
	                 $this->points_model->add_point_value($db);
	  
	  }else {
	                 $db['blog_comment']=$this->input->post('blogpoints');
	                 $this->points_model->add_point_value($db);
	  
	  }
	  
	  
	  redirect('admin/points');
	 }
	 
	 $this->data['body']='admin/points/list';
	 $this->data['message']=$this->session->flashdata('message');
	 $this->load->view('admin/structure',$this->data);
	
	}
	
   	
}
?>
