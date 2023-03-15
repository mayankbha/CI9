<?php
class Custom_404 extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();

    // Your own constructor code

    $this->data = array();  

    $this->data['sel'] = 'custom_404';
  }

  function index()
  { 
    $this->data['body']='custome_404';
    
    $check_admin_404 = $this->uri->segment(1);

    if ($check_admin_404 === 'admin') 
    {
      $this->data['meta']  = getMetaContent('admin_custome_404');
      $this->data['content'] = $this->data['meta']['data'];

      $this->data['admin']='1';
      $this->load->view('admin/common/structure',$this->data);
    }
    else
    {
      $this->data['meta']  = getMetaContent('admin_custome_404');
      $this->data['content'] = $this->data['meta']['data'];
      
      $this->load->view('front/common/structure',$this->data);
    }
  }
}

?>