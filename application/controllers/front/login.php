<?php
class Login extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();

    // Your own constructor code

    $this->data = array();  

    $this->data['sel'] = 'signin';
    $this->load->model('members_model');
  }

  function index($load_errors = "false", $email = NULL)
  { 
    if($load_errors === 'true' AND $email)
    {
      $this->data['errors'] = 'Invalid Username or Password';
      $this->data['email'] = $email;
    }
    
    $this->data['meta']  = getMetaContent('signin','meta');

    $this->data['body']='front/signin';

    $this->load->view('front/common/structure',$this->data);
  }

  function check()
  {
    $invalid = $this->input->get('invalid');
    $email = $this->input->get('email');

    $this->index($invalid, $email);
  }

  function process()
  {
      $this->load->library('encrypt');

      $data =array();

      $this->session->set_flashdata('message-title', 'Login');
      
      $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|valid_email|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required');
      $this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

      if ($this->form_validation->run() != FALSE) {
        $user = $this->members_model->fromName($this->input->post('username'));
        
        if($this->input->post('login_page'))
        {
          $data['login_page'] = '1';
        }
        else
        {
          $data['login_page'] = '0';
        }

        if ($user) {

          if ($this->encrypt->sha1($this->input->post('password')) == $user->password) {

            $this->session->set_userdata('user_id', $user->member_id);
            $this->session->set_userdata('username', $user->first_name);
            $this->session->set_userdata('useremail', $user->email);
			
			if($this->input->post('confirm')){
				$confirm=base64_decode($this->input->post('confirm'));
				$this->outbound_email_model->add_friends($user->member_id,$this->input->post('confirm'));
			}

            $data['redirect'] = site_url('myaccount');

          } else {
            $data['errors'] = 'Invalid Username or Password';
            
          }
        } else {

          $data['errors'] = 'Invalid Username or Password';
        }
      } else {

        $data['errors'] = 'please Invalid Username or Password';
      }

      if(isset($data['errors']) AND $data['login_page'] === '0')
      {
        $data['redirect'] = site_url('login/check?invalid=true&email='.$this->input->post('username'));
        $data['errors'] = 'Invalid Username or Password';
      }

      $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
  
  }

  function logout()
  {
    $this->session->unset_userdata(array('admin_id'=>''));

    $this->session->sess_destroy();

    redirect('home');
  }
        
}

?>