<?php

class Member extends CI_Controller {

   function __construct()
   {
		parent::__construct();
		if ($this->session->userdata('admin_id') == FALSE)
			redirect('admin/login');
			
		$this->header_data = array('system_message' => $this->session->flashdata('message'));
		
		$this->load->model('members_model');
		
		$this->load->library('form_validation');
		
		$this->load->model('outbound_email_model');	
		
		$this->data = array();
		
		$this->data['sel']='member';
		
		$this->data['display_menu']='yes';
	}
	
	function index()
	{		
		$this->data['members'] = $this->members_model->GetAllMembers();
		
		$this->data['body']='admin/members/list';	
		
		$this->load->view('admin/structure',$this->data);
	}

	function edit($member_id=0)
	{
		if ($member_id!=0){			
			$this->data['member'] = $this->members_model->GetMember($member_id);
			$this->data['edit']='edit';  
			$this->session->set_userdata('edit_member_id', $member_id);
		}
	  	else
			$this->data['edit']='new';
				
	   $this->data['member_id']=$member_id;
	   
	   $this->data['body']='admin/members/edit';
	   
	   $this->load->view('admin/structure',$this->data);	  
	}
	
	function save($member_id=0)
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|xss_clean|required');		
	  	$this->form_validation->set_rules('last_name', 'Last Name', 'trim|xss_clean|required');	
	  	$this->form_validation->set_rules('email', 'Email Address', 'trim|xss_clean|required|valid_email|callback_username_check');
		if($this->input->post('password', TRUE)!='' || $this->input->post('confirm', TRUE)!='')	
		{
			$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required');
			$this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|xss_clean|required|callback_same');
		}
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

	  	if ($this->form_validation->run() != FALSE)
		{			
			$this->members_model->AdminSaveMember($member_id);
			
			if($member_id==0)
				$this->session->set_flashdata('message', 'Public user added successfully');
	  		else
				$this->session->set_flashdata('message', 'Public user updated successfully');
			redirect('admin/member');				
				
		}	
		else
			$this->edit($member_id);
	}
	function same($confirm)
	{
	
		$pass=$this->input->post('password');
		
		if ($confirm!=$pass)
		{
			$this->form_validation->set_message('same', "Passwords do not match");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	  
	function username_check($email) 
	{ 
		$result=$this->members_model->check_email($email,$this->session->userdata('edit_member_id'));
		
		if(count($result)>0)
		{
			$this->form_validation->set_message('username_check', 'This email address already exist in our database.');
			return FALSE;
		}
		else
			return TRUE;

	} 	 
	
	function view($member_id=0)
	{
			
		$this->data['member'] = $this->members_model->GetMember($member_id);

	    $this->data['member_id']=$member_id;		

	    $this->data['body']='admin/members/view';
	   
	    $this->load->view('admin/structure',$this->data);	  
	} 
	
	function delete_pp($member_id) 	   
	{
		$this->data['member_id'] = $member_id;
		
		$this->load->view('admin/members/remove',$this->data);
	} 
	
	function delete($member_id)
	{
		if(is_numeric($member_id))
		{
			$this->members_model->delete($member_id);
			$this->session->set_flashdata('message', 'Admin public user has been deleted');
			redirect('admin/member');
		}
	} 
	
	function delpicture($image_id)
	{
		$member_id = $this->uri->segment(5,0);
		//$this->members_model->DeleteImage($image_id);
		if($this->session->userdata('admin_image_id')== TRUE)
		{
			$image_id_arr = $this->session->userdata('admin_image_id');
			$image_id_arr[] = $image_id;
			$this->session->unset_userdata('admin_image_id','');
			$this->session->set_userdata('admin_image_id',$image_id_arr);
		}
		else
		{
			$image_id_arr = array();
			$image_id_arr[] = $image_id;
			$this->session->set_userdata('admin_image_id',$image_id_arr);
		}	
		redirect('admin/member/edit/'.$member_id);
	}
	
	function export($field='')
	{
		if($field!='')
		{
			if($this->session->userdata('sorttype')=='')
				$this->session->set_userdata(array('sorttype'=>'asc'));
			else
			{ 
				if($this->session->userdata('sorttype')=='asc') {
					$this->session->unset_userdata(array('sorttype'=>''));
					$this->session->set_userdata(array('sorttype'=>'desc'));
				} else 	{
					$this->session->unset_userdata(array('sorttype'=>''));
					$this->session->set_userdata(array('sorttype'=>'asc'));
				}	
			}
		}
		
		$this->data['members'] = $this->members_model->GetAllMembers('',$field);
		
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['body']='admin/members/export';	
		
		$this->load->view('admin/structure',$this->data);
	}
	
	function export_list()
	{
		
		$csv = fopen('php://temp/maxmemory:'. (5*1024*1024), 'r+');

		$fields = $this->db->list_fields('members');
		
		fputcsv($csv, $fields);
		$member_id='';
		if(isset($_POST['member_id'][0]))
		{
			for($i=0;$i<count($_POST['member_id']);$i++)
				$member_id .= $_POST['member_id'][$i].",";
		}
		
		$members = $this->members_model->GetExportMembers($member_id);	
        
		foreach ($members as $member)
		{
			fputcsv($csv, $member);
		}

		rewind($csv);
		$data = stream_get_contents($csv);
        fclose($csv);

		$file = 'tex777_members_' . date('Y_m_d') . '.csv';

		header('Content-Length: ' . strlen($data));
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="' . $file . '";');
		exit($data);
	}
	
	
	function ban($member_id)
	{
		$this->members_model->BanMember($member_id);
		$this->session->set_flashdata('message', 'Admin public user has been banned');
		redirect('admin/member/view/'.$member_id);
	}
	
	function allow($member_id)
	{
		$this->members_model->AllowMember($member_id);
		$this->session->set_flashdata('message', 'Admin public user has been allowed');
		redirect('admin/member/view/'.$member_id);
	}
	
	function FetchCities($state)
	{
		$cities = $this->members_model->FetchCities($state);
		$returnvalue = '<option value=""> Select City </option>';
		
		foreach($cities as $city)
			$returnvalue .= '<option value="'.$city['city'].'"> '.$city['city'].'</option>';
		
		echo $returnvalue; exit();
	}
    function Ajax()
    { 
		$result=$this->members_model->check_email($this->input->post('fieldValue'), $this->session->userdata('edit_member_id'));
		
		if(count($result)>0)
			echo '[["email",false,"This email address already exists in our database."]]';
		else
			echo '[["email"],[true]]';
		die;
	}
	
	function active_pp($member_id)
	{
		$this->data['active'] = $this->uri->segment(5,0);
		$this->data['member_id'] = $member_id;
		
		$this->load->view('admin/members/active',$this->data);
	}
	
	function active($member_id)
	{
		$this->load->library('email');
		$this->members_model->UpdateSubscriptionStatus($member_id,$this->input->post('status',TRUE));
		$member = $this->members_model->GetMember($member_id);
		$result = $this->outbound_email_model->get('account_activation_notification');
		$this->email->from($result['from'], $result['from_name']);
		$this->email->to($member['email']);
		$message= $result['content'];
		$this->email->subject($result['subject']);
		
		$message = str_replace('{STATUS}',$this->input->post('status',TRUE),$message);
		
		$this->email->message(nl2br($message));
		
		$this->email->send();
		
		
		if($this->input->post('status',TRUE)=='Active')
			$this->session->set_flashdata('message', 'Admin public user has been Actived');
		else
			$this->session->set_flashdata('message', 'Admin public user has been Suspended');
				
		redirect('admin/member');
	}
}

/* End of file home.php */
/* Location: ./system/application/controllers/admin/home.php */
?>
