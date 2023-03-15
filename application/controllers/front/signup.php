<?php
class Signup extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		// Your own constructor code

		$this->data = array();	

		$this->data['sel'] = 'signup';

    $this->load->model('members_model');
	$this->load->model('outbound_email_model');
	}

  /**
     * This method is used to Register user
     * @method register
     * @example
     *       site_url/home
     * 
     */
    function index()
    {
      $this->load->library('encrypt');

      $data =array();

      $this->session->set_flashdata('message-title', 'Registration');

      $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|required');
      $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|valid_email|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required');

      if ($this->form_validation->run() != FALSE) 
      {
        $user = $this->members_model->fromName($this->input->post('email'));

        if ($user) 
        {
         
		   $this->session->set_flashdata('signuperror','This email is already taken');
		   redirect(site_url('home'));
		  
        }
        else 
        {
         
	    //friend confirmation 
		
	  $insert_data = array(
							'first_name'  => $this->input->post('username'),
							'email'   => $this->input->post('email'),
							'password'  => $this->encrypt->sha1($this->input->post('password')),
					  );
					  
		   if($this->input->post('confirmf')){
		
					   $decode=base64_decode($this->input->post('confirmf'));
					  
					   $data['status']=1;
				  
					  $this->db->where('id',$decode);
					  $num=$this->db->get('emails');
				  
				   if($num->num_rows()){
				   
				      $insert_data['is_email_id']=$num->row()->from;
					   
				    }
			        $this->outbound_email_model->confirm_friend($data,$num->row()->from);	
				
			 }
			  else {
				$decode = false;
			  }
			 //end email confirmation
			 
	      $insert_id = $this->members_model->insert($insert_data);
		  if($decode){
			$f1 = $this->outbound_email_model->get_friends($decode);
			if($f1){
				$f1 = $f1.",".$insert_id;
			} else {
				$f1 = $insert_id;
			}
			$this->outbound_email_model->update_friends($decode,$f1);
			$this->outbound_email_model->update_friends($insert_id,$decode);
		  }
          //$data['success'] = '1';
		  //$data['redirect'] = site_url('login');
		  redirect(site_url('login'));
        }
      } 
      else
      {
       redirect(site_url('home'));
      }

      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($data));
    }

	  function email_confirmation()
  { 
    $meta  = getMetaContent('signup_email_confirmation','data');

    $this->data['content'] = $meta['data'];

    $this->load->view('front/email_confirmation',$this->data);
  }
        
    function facebook_confirmation()
  { 
    $meta  = getMetaContent('signup_facebook_confirmation','data');

    $this->data['content'] = $meta['data'];

    $this->load->view('front/facebook_confirmation',$this->data);
  }
  
  function twitter_confirmation()
  { 
    $meta  = getMetaContent('signup_twitter_confirmation','data');

    $this->data['content'] = $meta['data'];

    $this->load->view('front/twitter_confirmation',$this->data);
  }
        
}

?>
