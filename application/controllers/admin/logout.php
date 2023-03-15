<?php
class Logout extends Admin_Controller {

   function __construct()
   {
		parent::__construct();

   }

   function index(){
	   $this->pageTitle[]="Logout";
	   $this->data['contentTitle']="Logout";

		$this->session->unset_userdata(array('admin_id'=>''));

		$this->session->sess_destroy();

		$this->data['body']='admin/logout';

		$this->load->view('admin/structure-nomenu',$this->data);
   }


}
?>
