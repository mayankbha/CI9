<?php
class Friends extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();

     if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    // Your own constructor code
    $this->data = array();  
    $this->data['sel'] = 'friends';
	$this->data['headerConfition'] = 'yes';			//Removable when functional programming and set navigation of login session
	$this->load->model('outbound_email_model');
	$this->load->helper('email');
	
	$config['protocol'] = 'sendmail';
	$config['charset'] = 'iso-8859-1';
	$config['mailtype'] = 'text/html';
	$config['wordwrap'] = TRUE;

    $this->email->initialize($config);
  }

  function index($search='')
  { 
	$current_id = $this->session->userdata('user_id');
    $this->data['meta']  = getMetaContent('friends','meta');
    $this->data['meta']  = getMetaContent('friends_remove');
	
	$this->data['content']  = $this->data['meta']['data'];

    $this->data['body']='front/friends';
	$this->data['memberdetail']=$this->outbound_email_model->get_friends($current_id);
	if($this->data['memberdetail']){
		$this->data['memberdetail'] = explode(",",$this->data['memberdetail']);
	}
	
	$this->data['searchuser']=$this->outbound_email_model->search_user($search);
    $this->load->view('front/common/structure',$this->data);
  }
  
  function detail($id='')
  { 
	$current_id = $this->session->userdata('user_id');
	$friends = $this->outbound_email_model->get_friends($current_id);
	$friends = explode(",",$friends);
	$this->data['is_friend'] = false;
	if(in_array($id,$friends)){
		$this->data['is_friend'] = true;
	}
    $this->data['meta']  = getMetaContent('friends_detail','meta');
    $this->data['body']='front/friends_detail';
    $this->data['member']=$this->outbound_email_model->get_member_details($id);
    $this->load->view('front/common/structure',$this->data);
  }
  
  function remove()
  {
  	$this->data['meta']  = getMetaContent('friends_remove');
	
	$this->data['content']  = $this->data['meta']['data'];

    $this->data['body']='front/friends_remove';

    $this->load->view('front/common/structure',$this->data);
  }
  
  function facebook()
  { 
    $this->data['meta']  = getMetaContent('friends_facebook_find','meta');

    $this->data['body']='front/friends_facebook_find';

    $this->load->view('front/common/structure',$this->data);
  }
  
 
  
  function email_invitiation()
  { 
    $this->data['meta']  = getMetaContent('friends_email_invitiation','meta');
	
    $this->data['body']='front/friends_email_invitiation';
	
	$this->load->view('front/common/structure',$this->data);
  }
  
  function search()
  { 
  	$search = $this->input->post('searchword');
  
	$this->data['meta']  = getMetaContent('friends_remove');
	
	$this->data['content']  = $this->data['meta']['data'];
		$seachrecord=$this->outbound_email_model->search_user($search);
	$this->data['searchuser']=$seachrecord;
	$this->load->view('front/friends_search',$this->data);
	
  } 
  
  function friend_details_search(){
  
  	$search = $this->input->post('searchword');
  
	$this->data['meta']  = getMetaContent('friends');
	
	$this->data['content']  = $this->data['meta']['data'];
	
	$seachrecord=$this->outbound_email_model->search_details_user($search);
	
	$this->data['member']=$seachrecord;
	$this->load->view('front/friend_details_search',$this->data);
	
  }
  
    function search_email_invitation_user(){
  
  	$search = $this->input->post('searchword');
  
	$this->data['meta']  = getMetaContent('friends_remove');
	
	$this->data['content']  = $this->data['meta']['data'];
	
	$seachrecord=$this->outbound_email_model->search_email_invitation_user($search);
	if($seachrecord){
						$fname=$seachrecord->first_name;
						$email=$seachrecord->email;
						echo $fname.",".$email;
	 }
  }
  
  function invite_friends()
  { 
    $this->data['meta']  = getMetaContent('friends_search','meta');
	
    if($this->input->post('do_save_friends'))
	{
	
						 $sub=  $this->input->post('subject');
						 $msg=  $this->input->post('msg');
						 $to=   $this->input->post('to');
						
					 if(valid_email($to)){
					 
					  
			 
						$db1['to_name']=$to;
						$db1['subject']=$sub;
						$db1['content']=$msg;
						$db1['from_name']=$this->session->userdata['username'];
						$db1['from']=$this->session->userdata['user_id'];
						
					    $lid=	$this->outbound_email_model->add_mail($db1);
						
					    $secret_flag =  base64_encode($lid);
						$body="<html>
								<div style=background-color:#CCCCCC;margin-left:10px;width:400px;height:200px;padding:10px 0 0 20px;>
								<h4>Dear friend Please click here to confirm friends request</h4>
								<span>".base_url()."index.php?confirm=".$secret_flag."</span>
								<h4>".$msg."</h4>
								</div>
								</html>";
								
					//			
//					    $body="Dear friend Please click here to confirm friends request . <br>
//								".base_url()."index.php?confirm=".$secret_flag.'<br>'.''.$msg.'';
								
					    send_email($to,$sub,$body);
					 
			             }
			
	}
	$this->session->set_flashdata('success', 'Message send Successfully ');
    redirect(site_url('friends'));
  }  
  
  function add($id){
	$current_user = $this->session->userdata('user_id');
	$friends = $this->outbound_email_model->get_friends($current_user);
	if($friends){
		$friends = explode(",",$friends);
		if(!in_array($id,$friends)){
			$friends[count($friends)] = $id;
			$friends = implode(",",$friends);
		}
	} else {
		$friends = $id;
	}
	$this->outbound_email_model->update_friends($current_user,$friends);
	redirect(site_url('friends/detail/')."/".$id);
  }
  
  function delete($id){
	$current_user = $this->session->userdata('user_id');
	$friends = $this->outbound_email_model->get_friends($current_user);
	if($friends){
		$friends = explode(",",$friends);
		$i=1;
		if(in_array($id,$friends)){
			$f = array();
			foreach($friends as $friend){
				if($friend==$id){
					continue;
				}
				$f[$i] = $friend;
				$i++;
			}
			$friends = implode(",",$f);
		}
	} else {
		$friends = '';
	}
	$this->outbound_email_model->update_friends($current_user,$friends);
	redirect(site_url('friends/detail/')."/".$id);
  }
  
  function  confirm() {
  
  
	
	
	
  }      
}

?>