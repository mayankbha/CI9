<?php

/*
 * @author WebSiteDesignz Team
 * @package controller.Analytics
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * The Analytics Controller is used to handle All Analytics Requests.
 * @class Analytics
 */

class Analytics extends CI_Controller
{

    /**
     * The Constructor is used to Load All Libraries, Helpers and Models
     * used by Analytics Methods.
     * @constructor
     */
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin_id') == FALSE)
            redirect('admin/login');
        $this->header_data = array('system_message' => $this->session->flashdata('message'));

        $this->load->model('analytics_model');

        $this->data = array();

        $this->data['sel']='analytics';
        $this->data['display_menu']='yes';

    }

    /**
     * This method is used to View all analytic fields for Admin
     * @method analytics
     * @example
     *       site_url/admin/analytics
     * 
     */
    function index()
    {
	    //calculate total chrun rate
	
	    $ttl= $this->analytics_model->total_users();
	    $ttlloginusers= $this->analytics_model->total_login_users();
		$per=(($ttl-$ttlloginusers)/$ttl*100);
		if($per!=0){$this->data['ttlchurnrate']=number_format($per,2);}
		
		//calculate total visitor
		$ttlvisit=$this->analytics_model->total_visit_users();
		$ttlsignupu=$this->analytics_model->total_users();
		$visitper=($ttlvisit/$ttlsignupu*100);
		if($visitper!=0){$this->data['ttlsingupusers']= number_format($visitper,2)."%";}
		
		
		//get daily ,weekly and monthly users
		
		$this->data['daily']=$this->analytics_model->get_daily_users();
		$this->data['weekly']=$this->analytics_model->get_weekly_users();
	    $this->data['monthly']=$this->analytics_model->get_monthly_users();
		
		//get virality
		
		
	    $email_virality= $this->analytics_model->email_virality($sdate='',$edate='');
		
		if($ttl!=0)
		$emailper=($email_virality->eid/$ttl*100);
		
		$fb_virality= $this->analytics_model->fb_virality($sdate='',$edate='');
		
		if($ttl!=0)
		$fbper=($fb_virality->fbid/$ttl*100);
		
		$twitter_virality= $this->analytics_model->twitter_virality($sdate='',$edate='');
		  
		if($ttl!=0)
		$twitterper=($twitter_virality->tid/$ttl*100);
		  
		$this->data['ttlvirality']=number_format($emailper+$fbper+$twitterper,2)."%"; 
		$this->data['ttlnewusers']=($email_virality->eid+$fb_virality->fbid+$twitter_virality->tid);
		$this->data['email_login']=$email_virality->eid;
		$this->data['fb_login']=$fb_virality->fbid;
	    $this->data['twitter_login']=$twitter_virality->tid;
		  
		  
	//mailing effectiveness
	
	   $this->data['open_mail_rate']= $this->analytics_model->get_mail_through_open_rate();
	   $this->data['click_mail_rate']= $this->analytics_model->get_mail_through_click_rate();
	   $this->data['unsubscribe_mail_rate']= $this->analytics_model->get_mail_through_unsubscribe_rate();
	   	  
	//get new users over time
	
	  $this->data['newusers']=$this->analytics_model->get_new_users();	
		  
        $this->data['body']='admin/analytics/index';
        $this->load->view('admin/common/structure',$this->data);
    }
	
	
	function get_no_of_users($sdate='',$edate='') {
	 $result= $this->analytics_model->get_no_of_users($sdate,$edate);
	 echo $result;
	}
//get daily login users
  function get_daily_users_login_percentage($day='') {
  $ttl= $this->analytics_model->total_users();
  $result= $this->analytics_model->get_daily_user_login_percentage($day);
  if($ttl!=0)
  $per =($result/$ttl*100);
  if($per!=0)
  echo number_format($per,2)."%";
  }

//get weekly login users  
  function get_weekly_users_login_percentage($sdate='',$edate='') {
     $ttl= $this->analytics_model->total_users();
	 $result= $this->analytics_model->get_weekly_user_login_percentage($sdate,$edate);
	 if($ttl!=0)
	  $per =($result/$ttl*100);
	  if($per!=0)
	  echo number_format($per,2)."%";
	}
  
//get monthly login users
 function get_monthly_users_login_percentage($month='') {
  $ttl= $this->analytics_model->total_users();
  $result= $this->analytics_model->get_monthly_user_login_percentage($month);
  if($ttl!=0)
  $per =($result/$ttl*100);
  if($per!=0)
  echo number_format($per,2)."%";
  }

//get churn rate

 function get_churn_rate($sdate='',$edate='') {
 
  $ttl= $this->analytics_model->total_users();
  $result= $this->analytics_model->get_weekly_user_login_percentage($sdate,$edate);
  $ttlloginusers= $this->analytics_model->total_login_users();
  
  $churnrate=$ttl-$ttlloginusers;
  $perchurnrate= ($result/$churnrate*100);
  if($perchurnrate!=0)
  echo number_format($perchurnrate,2)."%";
  
 }

//get users that visit a site

 function get_sing_up_users($sdate='',$edate='') {
 
  $ttl= $this->analytics_model->total_users();
  $result= $this->analytics_model->visitor_users($sdate,$edate);
  $persignup= ($result/$ttl*100);
  if($persignup!=0)
  echo number_format($persignup,2)."%";

 }

 function get_email_virality($sdate='',$edate='') {
 
  $email_virality= $this->analytics_model->email_virality($sdate,$edate);
  $fb_virality= $this->analytics_model->fb_virality($sdate,$edate);
  $twitter_virality= $this->analytics_model->twitter_virality($sdate,$edate);
 
  echo $email_virality->eid.','.$fb_virality->fbid.','.$twitter_virality->tid;

 }


  


}
?>
