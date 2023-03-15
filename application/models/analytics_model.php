<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Analytics_model extends MY_Model
{
    var $primary_key = "id";
    var $primary_name = "title";
    var $tbl = "member";
	var $tbl1 = "users_login";
    function __construct( )
    {
        parent::__construct();
    }
	
  //get no: of users
	
	public function get_no_of_users($startdate,$enddate) {
	$this->db->where('created >=', $startdate);
    $this->db->where('created <=', $enddate);
    return  $this->db->get($this->tbl)->num_rows();
	 
	}
	
	//get daily total no: login users
	public function get_daily_user_login_percentage($day){
	          $this->db->distinct(); 
			  $this->db->select('*');
			  $this->db->from($this->tbl);
	          $this->db->where('DAYOFWEEK(users_login.created)',$day);
			  $this->db->join($this->tbl1,'member.member_id=users_login.login_id');
	 $res=    $this->db->get();
              return $res->num_rows();
	}
	
  //get weekly total no: of login users	
	public function get_weekly_user_login_percentage($startdate,$enddate) {
	
			 $this->db->distinct();
			 $this->db->select('*');
			 $this->db->from($this->tbl); 
			 $this->db->where('users_login.created >=', $startdate);
			 $this->db->where('users_login.created <=', $enddate);
			 $this->db->join($this->tbl1,'member.member_id=users_login.login_id');
			 return  $this->db->get()->num_rows();
	 
	}
	
 //get monthly total no: of login users		
   public function get_monthly_user_login_percentage($month){
   
	          $this->db->distinct(); 
			  $this->db->select('*');
			  $this->db->from($this->tbl); 
	          $this->db->where('MONTH(users_login.created)',$month);
			  $this->db->join($this->tbl1,'member.member_id=users_login.login_id');
	 $res=    $this->db->get();
              return $res->num_rows();
	}	
	
	
	//get users information that visit site
	
	public function visitor_users($startdate,$enddate) {
	         $this->db->distinct();
			 $this->db->select('*');
			 $this->db->from($this->tbl1); 
			 $this->db->where('login_id','visit');
			 $this->db->where('created >=', $startdate);
			 $this->db->where('created <=', $enddate);
			 return  $this->db->get()->num_rows();
	}	
	
	//get users visit information  
	public function total_visit_users() {
	         $this->db->distinct();
			 $this->db->where('login_id','visit');
			 return  $this->db->get($this->tbl1)->num_rows();
	}	
	
//get total users from member table	
	public function total_users() {
	
	 $res=$this->db->get($this->tbl);
	 return $res->num_rows();
	}
	
 //get total  login users 	
	public function total_login_users() {
		  $this->db->select('distinct(login_id)');
		  $this->db->from($this->tbl1);
		  $this->db->where('login_id !=','visit');
	 return $this->db->get()->num_rows();
	
	}
	
//get daily users 

 public function get_daily_users() {

          $this->db->select('count(users_login.login_id) as id , member.*');
		  $this->db->from($this->tbl);
          $this->db->where('users_login.created <=',date('Y-m-d')); 
		  $this->db->join($this->tbl1,'users_login.login_id=member.member_id');
		  $this->db->group_by('users_login.login_id');
 return   $this->db->get()->result();
 }		
	
//get weekly users 

 public function get_weekly_users() {
          $this->db->select('count(users_login.login_id) as id , member.*');
		  $this->db->from($this->tbl);
		  $this->db->join($this->tbl1,'users_login.login_id=member.member_id');
          $this->db->where('users_login.created >=',date('Y-m-d')); 
		  $this->db->where('users_login.created <=',date("Y-m-d",strtotime("+7 days")));
		  $this->db->group_by('users_login.login_id');
 return   $this->db->get()->result();
 }		
 
 //get monthly users 

 public function get_monthly_users() {
          $this->db->select('count(users_login.login_id) as id , member.*');
		  $this->db->from($this->tbl);
		  $this->db->join($this->tbl1,'users_login.login_id=member.member_id');
          //$this->db->where('users_login.created >=',date('Y-m-d')); 
		  $this->db->where('month(users_login.created)',date("m",strtotime("+1 month")));
 return   $this->db->get()->result();
 }			
	
//get email  virality 
	
 public function email_virality() {
          $this->db->select('count(email) as eid');
		  $this->db->from($this->tbl);
		  $this->db->where('email !=','');
 return   $this->db->get()->row();
 }		

//get fb  virality 
	
 public function fb_virality() {
          $this->db->select('count(facebook_id) as fbid');
		  $this->db->from($this->tbl);
		  $this->db->where('facebook_id !=','');
 return   $this->db->get()->row();
 }		
 
 //get twitter  virality 
	
 public function twitter_virality() {
          $this->db->select('count(twitter_id) as tid');
		  $this->db->from($this->tbl);
		  $this->db->where('twitter_id !=','');
 return   $this->db->get()->row();
 }			
	
//get mail through open rate

 public function  get_mail_through_open_rate() {
    $this->db->select('*');
	$this->db->from('mail_statistics');
	$this->db->where('mail_title','open_rate');
	return $this->db->get()->num_rows();
 }	
 
 //get mail through through click rate

 public function  get_mail_through_click_rate() {
    $this->db->select('*');
	$this->db->from('mail_statistics');
	$this->db->where('mail_title','click_through_rate');
	return $this->db->get()->num_rows();
 }	
 
 //get mail through through  unsubscribe rate

 public function  get_mail_through_unsubscribe_rate() {
    $this->db->select('*');
	$this->db->from('mail_statistics');
	$this->db->where('mail_title','unsubscribe');
	return $this->db->get()->num_rows();
 }	
	
	public function get_new_users() {
	
	$this->db->select('*');
	$this->db->from($this->tbl);
	$this->db->where('created <=',date('m',strtotime('+1 month')));
	return $this->db->get()->num_rows();
	
	}	
}