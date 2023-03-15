<?php 
class outbound_email_model extends CI_Model
{

   var $member="memberss";
   var $email="emails";
   

	function __construct()
    {
        parent::__construct();
    }
	
	function getEmailList($fields='', $order_type)
	{
		if($fields!='')
			$this->db->order_by($fields, $order_type);
			
		return $this->db->from('emails')->get()->result_array();
	}
	
	function getEmailById($email_id)
	{
		if($email_id==0)
			$email = array_fill_keys($this->db->list_fields('emails'), '');
		else
			$email = $this->db->where('email_id', $email_id)->get('emails')->row_array();
			
		return $email;
	}
	
	function save_email($email_id)
	{
		//$this->form_validation->set_rules('from', 'From', 'trim|required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('content', 'Message', 'trim|required');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('message', validation_errors());
			return false;
		}
		else
		{
			if ($email_id == 0)
			{
				$this->db->set('email_id', '');
				$this->db->insert('emails');
				$email_id = $this->db->insert_id();
			}
			
			//$this->db->set('from', $this->input->post('from'));
			$this->db->set('subject', $this->input->post('subject'));
			$this->db->set('content', $this->input->post('content'));
			
			$this->db->where('email_id', $email_id);
			$this->db->update('emails');
			
			$this->session->set_flashdata('message', 'Email saved.');
			return true;
		}	
	}
	
	function get($name){
		return $this->db->where('name',$name)->get('emails')->row_array();
	}	
	
    function get_member_info($id=0) {
	
	         if($id!=0){
	                    $this->db->select('*');
						$this->db->from('emails');
						$this->db->join('memberss', 'memberss.member_id = emails.from');
			            $this->db->where('emails.status',1);
					    $this->db->where('emails.from',$id);
			    return  $this->db->get()->row();
			   }else{
			   
			            $this->db->select('*');
						$this->db->from('emails');
						$this->db->join('memberss', 'memberss.member_id = emails.from');
			            $this->db->where('emails.status',1);
			    return  $this->db->get()->result();
			   }
	 
	  }	
	
	function add_friends($id1,$id2){
		$f1 = $this->get_friends($id1);
		$f2 = $this->get_friends($id2);
		if($f1){
			$f1 = explode(",",$f1);
			$f1[count($f1)] = $id2;
			$f1 = implode(",",$f1);
		} else {
			$f1 = $id2;
		}
		if($f2){
			$f2 = explode(",",$f2);
			$f2[count($f2)] = $id1;
			$f2 = implode(",",$f2);
		} else {
			$f2 = $id1;
		}
		$this->update_friends($id1,$f1);
		$this->update_friends($id2,$f2);
	  }	
	
	function get_member_details($id=false){
		if($id){
			$this->db->where('member_id',$id);
			$result = $this->db->get('memberss');
			if($result->num_rows()){
				$result = $result->result();
				return $result[0];
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	function get_friends($id){
		$this->db->where('member_id',$id);
		$result = $this->db->get('memberss');
		if($result->num_rows()){
			$result = $result->result();
			return $result[0]->friends;
		} else {
			return false;
		}
	}
	
	function update_friends($id,$friends){
		$this->db->where('member_id',$id);
		$this->db->update('memberss',array('friends'=>$friends));
	}
	
  function search_user($search) {
  
 
     $this->db->select('*');
	 $this->db->from($this->member);
if($search!='') {
	 $this->db->or_like('member_id', $search);
	 $this->db->or_like('first_name', $search);
	 $this->db->or_like('last_name', $search);
	 $this->db->or_like('company_name', $search); 
	 }
	 return $this->db->get()->result();
  
  
  }	

  function search_details_user($search){
  
     $this->db->select('*');
	 $this->db->from($this->member);
if($search!='') {
	 $this->db->or_like('member_id', $search);
	 $this->db->or_like('first_name', $search);
	 $this->db->or_like('last_name', $search);
	 $this->db->or_like('company_name', $search); 
	 }
	$result = $this->db->get();
	return $result;

  }
  
    function search_email_invitation_user($search){
	
	
     $this->db->select('*');
	 $this->db->from($this->member);
	
	if($search!='') {
	 $this->db->or_like('member_id', $search);
	 $this->db->or_like('first_name', $search);
	 $this->db->or_like('last_name', $search);
	 $this->db->or_like('company_name', $search); 
	 }
	 
	 $res=$this->db->get();
	 
	if($res->num_rows()>0){
	 
	  return $result = $res->row();
	}else{
	  return false;
	}
	
  }
  
  function add_mail($data) {
  
    $this->db->insert('emails',$data);
    $nuid=$this->db->insert_id();
    return $nuid; 
  }	
  
  function confirm_friend($data,$id) {
    $this->db->where('from',$id);
    $this->db->update($this->email,$data);
  
  }
 
  
}
?>
