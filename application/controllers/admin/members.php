<?php
class Members extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->is_logged_in()) {
			redirect('admin/login');
		}
		$this->load->model('Members_model');
		$this->load->library('my_pagination');
		$this->data                 = array();
		$this->data['sel']          = 'user';
		$this->data['display_menu'] = 'yes';
		$this->orderFields          = array(
			'first_name',
			'last_name',
			'email',
			'created'
		);
		$this->pageTitle[]          = "Public User";
	}
	function index()
	{
		$this->page(1);
	}
	function page($page = 1, $orderBy = "first_name", $order = "asc")
	{
		$page = max(1, $page);
		if (!in_array($order, $this->orders)) {
			$order = $this->orders[0];
		}
		$this->data['order'] = $order;
		if (!in_array($orderBy, $this->orderFields)) {
			$orderBy = $this->orderFields[0];
		}
		$this->data['page']    = $page;
		$this->data['orderBy'] = $orderBy;
		$this->data['members'] = $this->Members_model->get(array(), $this->data['orderBy'], $this->data['order'], $this->perPage, ($page - 1) * $this->perPage);
		$this->data['total']   = $this->Members_model->getTotal();
		$this->my_pagination->Items($this->data['total']);
		$this->my_pagination->limit($this->perPage);
		$this->my_pagination->urlFriendly();
		$this->my_pagination->target(site_url('admin/members/page') . '/%/' . $this->data['orderBy'] . "/" . $this->data['order']);
		$this->my_pagination->currentPage($this->data['page']);
		$this->my_pagination->className = "pagination pagination-centered ";
		$this->my_pagination->adjacents(1);
		$this->data['body'] = 'admin/members/list';
		$this->pageTitle[]  = "Page " . $page;
		$this->pageTitle[]  = "Member List";
		$this->load->view('admin/structure', $this->data);
	}
	function delete($member_id = 0)
	{
		$member = $this->Members_model->fromID($member_id);
		$this->session->set_flashdata('message-title', 'Delete Member');
		if ($member) {
			$this->Members_model->delete($member_id);
			$this->session->set_flashdata('success', 'Member Deleted Successfully');
		} else {
			$this->session->set_flashdata('error', 'Invalid Member ID');
		}
		redirect('admin/members');
	}
	function search($keyword = "", $page = 1, $orderBy = "", $order = "")
	{
		if ($this->input->post('do_search')) {
			redirect('admin/members/search/' . $this->input->post('keyword'));
		}
		if (trim($keyword == "")) {
			redirect('admin/members');
		}
		$this->data['search_keyword'] = $keyword = trim($keyword);
		$page                         = max(1, $page);
		if (!in_array($order, $this->orders)) {
			$order = $this->orders[0];
		}
		$this->data['order'] = $order;
		if (!in_array($orderBy, $this->orderFields)) {
			$orderBy = $this->orderFields[0];
		}
		$q                     = array();
		$q['or_like']          = array(
			'first_name' => $keyword,
			'last_name' => $keyword,
			'email' => $keyword
		);
		$this->data['page']    = $page;
		$this->data['orderBy'] = $orderBy;
		$this->data['members'] = $this->Members_model->get($q, $this->data['orderBy'], $this->data['order'], $this->perPage, ($page - 1) * $this->perPage);
		$this->data['total'] = $this->Members_model->getTotal($q);
		$this->my_pagination->Items($this->data['total']);
		$this->my_pagination->limit($this->perPage);
		$this->my_pagination->urlFriendly();
		$this->my_pagination->target(site_url('admin/members/search/' . $keyword) . '/%/' . $this->data['orderBy'] . "/" . $this->data['order']);
		$this->my_pagination->currentPage($this->data['page']);
		$this->my_pagination->className = "pagination pagination-centered ";
		$this->my_pagination->adjacents(1);
		$this->data['body'] = 'admin/members/search';
		$this->pageTitle[]  = "Page " . $page;
		$this->pageTitle[]  = "Members Search";
		$this->load->view('admin/structure', $this->data);
	}
	function view($member_id = 0)
	{
		$this->data['member']=$member = $this->Members_model->fromID($member_id);
		if (!$member) {
			redirect('admin/members');
		}
		$this->data['body'] = 'admin/members/view';
		$this->pageTitle[]  = "Member ID # " . $member->member_id;
		$this->load->view('admin/structure', $this->data);
	}
	function export($page=1,$orderBy="first_name",$order="asc",$signedup="all",$active="all",$connected="all",$download="no")
	{
		$page                         = max(1, $page);
		if (!in_array($order, $this->orders)) {
			$order = $this->orders[0];
		}
		$this->data['order'] = $order;
		if (!in_array($orderBy, $this->orderFields)) {
			$orderBy = $this->orderFields[0];
		}
		$this->data['dateRange']=array();
		$this->data['dateRange']['all']='Start of Time';
		$this->data['dateRange']['1wk']='1 Week ago';
		$this->data['dateRange']['15d']='15 days ago';
		$this->data['dateRange']['1m']='30 days ago';
		$this->data['dateRange']['3m']='3 months ago';
		$this->data['dateRange']['6m']='6 months ago';
		$this->data['dateRange']['1y']='1 year ago';
		$where=array();
		if($signedup!="all" && array_key_exists($signedup,$this->data['dateRange'])){
			$where['created >']=date('Y-m-d h:t:s',strtotime($this->data['dateRange'][$signedup]));
		}
		if($active!="all" && ($active==0 || $active==1)){
			$where['isactive']=$active;
		}
		if($connected!="all" && $connected=="facebook"){
			$where['facebook_id >']="0";
		}
		if($connected!="all" && $connected=="twitter"){
			$where['twitter_id >']="0";
		}

		$this->data['signedup']=$signedup;
		$this->data['active']=$active;
		$this->data['connected']=$connected;
		$this->data['page']    = $page;
		$this->data['orderBy'] = $orderBy;
		if($download=="download"){
		$members = $this->Members_model->get($where,$this->data['orderBy'], $this->data['order'], false, false);
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header('Content-Description: File Transfer');
		header("Content-type: text/csv");
		header("Content-Disposition: attachment; filename=public-users-export.csv");
		header("Expires: 0");
		header("Pragma: public");
		$fp = fopen("php://output", 'w');
			// in the format 
			// firstname, lastname, email,isactive, company_name, phone, addreess, city, zip, facebook_id, twitter_id, banned
			$row=array();
			$row[]="first_name";
			$row[]="last_name";
			$row[]="email";
			$row[]="isactive";
			$row[]="company_name";
			$row[]="phone";
			$row[]="address";
			$row[]="city";
			$row[]="zip";
			$row[]="facebook_id";
			$row[]="twitter_id";
			$row[]="banned";
			fputcsv($fp,$row);
		foreach($members as $member){
			$row=array();
			$row[]=$member->first_name;
			$row[]=$member->last_name;
			$row[]=$member->email;
			$row[]=$member->isactive;
			$row[]=$member->company_name;
			$row[]=$member->phone;
			$row[]=$member->address;
			$row[]=$member->city;
			$row[]=$member->zip;
			$row[]=$member->facebook_id;
			$row[]=$member->twitter_id;
			$row[]=$member->ban;
			fputcsv($fp,$row);
			}
			fclose($fp);
			exit();
		}
		$this->data['members']=$members = $this->Members_model->get($where,$this->data['orderBy'], $this->data['order'], $this->perPage, ($page - 1) * $this->perPage);
		$this->data['total'] = $this->Members_model->getTotal($where);
		$this->my_pagination->Items($this->data['total']);
		$this->my_pagination->limit($this->perPage);
		$this->my_pagination->urlFriendly();
		$this->my_pagination->target(site_url('admin/members/export') . '/%/' . $this->data['orderBy'] . "/" . $this->data['order']."/{$signedup}/{$active}/{$connected}");
		$this->my_pagination->currentPage($this->data['page']);
		$this->my_pagination->className = "pagination pagination-centered ";
		$this->my_pagination->adjacents(1);
		$this->data['body'] = 'admin/members/export';
		$this->pageTitle[]  = "Export Public Users";
		$this->load->view('admin/structure', $this->data);
	}
	function activate($member_id=0){
		$this->data['member']=$member = $this->Members_model->fromID($member_id);
		if (!$member) {
			redirect('admin/members');
		}
		$this->Members_model->update(array('isactive'=>1),$member_id);
		$this->session->set_flashdata('message-title', 'Activate Member');
		$this->session->set_flashdata('success', 'Member Activated Successfully');
			redirect('admin/members/view/'.$member_id);
		}
	function deactivate($member_id=0){
		$this->data['member']=$member = $this->Members_model->fromID($member_id);
		if (!$member) {
			redirect('admin/members');
		}
		$this->Members_model->update(array('isactive'=>0),$member_id);
		$this->session->set_flashdata('message-title', 'Deactivate Member');
		$this->session->set_flashdata('success', 'Member Deactivated Successfully');
			redirect('admin/members/view/'.$member_id);
	}
}