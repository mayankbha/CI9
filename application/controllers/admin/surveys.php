<?php
class Surveys extends Admin_Controller {
  
  function __construct()
  {
    parent::__construct();
    if (!$this->is_logged_in()){
      redirect('admin/login');
    }

    $this->load->model('Survey_model');
        $this->load->model('Lesson_cat_model');
    $this->load->library('my_pagination');
    $this->data['sel']='lessons';
    $this->orderFields=array('stage');
    $this->pageTitle[]="Surveys User";
  }

  function index()
  {
    $this->page(1);
  }

  function page($page=1,$orderBy="number",$order="asc"){
  
    $page=max(1,$page);
    if(!in_array($order,$this->orders)){
      //$order=$this->orders[0];
    }
    
    $order=$order=='asc'?'DESC':'asc';
    
    $this->data['order']=$order;
  /*if(!in_array($orderBy,$this->orderFields)){
      $orderBy=$this->orderFields[0];
      
    }*/
    $this->data['page']=$page;
    $this->data['orderBy']=$orderBy;
    
    $this->data['surveys']=$this->Survey_model->display_all_survey_categories(array(),$this->data['orderBy'],$this->data['order'],$this->perPage,($page-1)*$this->perPage);
    $this->data['total']=$this->Survey_model->getTotal();
    $this->my_pagination->Items($this->data['total']);
    $this->my_pagination->limit($this->perPage);
    $this->my_pagination->urlFriendly();
    $this->my_pagination->target(site_url('admin/surveys/page') . '/%/' . $this->data['orderBy'] . "/" . $this->data['order']);
    $this->my_pagination->currentPage($this->data['page']);
    $this->my_pagination->className = "pagination pagination-centered ";
    $this->my_pagination->adjacents(1);

    $this->data['body']='admin/surveys/list';
    $this->pageTitle[]="Page ".$page;
    $this->load->view('admin/common/structure',$this->data);
    
  }

    
    /**
     * @Definition : Add the survey information to the database.
     */

    function add()
    {
          $gby="stage";
          $this->data['lessons'] = $this->Lesson_cat_model->get_lesson_category($gby);
       // $this->data['surveys'] = $this->Survey_model->get_survey_list();
     // $this->data['category'] = $this->Survey_model->get_survey_category_list();
        if ($this->input->post('do_save_survey')) {
    
              $this->session->set_flashdata('message-title', 'Add Survey');
                $db = array();
                $db['stage'] = $this->input->post('s_stage');
                $db['overall'] = $this->input->post('s_overall');
                $db['sub1'] = $this->input->post('s_sub1');
                $db['sub2'] = $this->input->post('s_sub2');
                $db['position'] = $this->input->post('s_num');
                $db['title'] = $this->input->post('s_title');
				
        
                $db_ques['position'] = $this->input->post('s_num');
                $db_ques['name']     = $this->input->post('question1');
        
                $db_ans['name']      = $this->input->post('ans1');
				$db_ans['position']  = $this->input->post('s_num');
				
				$db_ans['action1']   = $this->input->post('action1');
				$db_ans['action2']   = $this->input->post('next_action_for_q1');
         
          //print_r($this->input->post('action1'));die;
         
          $noofans['noofans']   = $this->input->post('no_of_ans');
         
                $id = $this->Survey_model->add_survey_categories($db,$db_ques,$db_ans,$noofans);
                $this->session->set_flashdata('success', 'Survey Added successfully ');
        
          redirect('admin/surveys');
        
        }
    $this->data['edited'] = 0;
    
        $this->pageTitle[] = "Add New Content";
        $this->data['body'] = 'admin/surveys/edit';
        $this->load->view('admin/common/structure', $this->data);
    }




  /**
     * This method is used to view surveys
     * @method view
     * @example
     *       site_url/admin/surveys/view
     * 
     */
    function view($id=0)
    {
        // $this->data['emails'] = $this->outbound_email_model->getEmailList($fields, $order_type);
      $survey   = $this->data['survey']   = $this->Survey_model->fromID($id);
      $question = $this->data['question'] = $this->Survey_model->get_question($survey->id);
	              $this->data['number']   = $this->Survey_model->get_numerical_order($id);
	  
            $this->data['answer']   = $this->Survey_model->get_answer($question->id);
        if (!$survey) {
            redirect('admin/surveys');
        }

        $this->data['body']='admin/surveys/view';

        $this->data['message']=$this->session->flashdata('message');

        $this->load->view('admin/common/structure',$this->data);
    }

    /**
     * This method is used to add/edit surveys
     * @method edit
     * @example
     *       site_url/admin/surveys/edit
     * 
     */
   
    function edit($id = 0)
      {
        $this->data['edited'] = $id;
        $survey   = $this->data['survey']   = $this->Survey_model->fromID($id);
        $question = $this->data['question'] = $this->Survey_model->get_question($survey->id);
        $this->data['stage']   = $this->Survey_model->get_stage_name();
	    $this->data['overall'] = $this->Survey_model->get_overall_name();
		$this->data['sub1']    = $this->Survey_model->get_sub1_name();
		$this->data['sub2']    = $this->Survey_model->get_sub2_name();
        $this->data['answer']   = $this->Survey_model->get_answer($question->id);
	    $this->data['number']   = $this->Survey_model->get_numerical_order($id);
        if (!$survey) {
            redirect('admin/surveys');
        }
    
       $this->data['lessons'] = $this->Lesson_cat_model->get_lesson_categories();
         $this->data['surveys'] = $this->Survey_model->get_survey_list();
    
        if ($this->input->post('do_save_survey')) {
            $this->session->set_flashdata('message-title', 'Edit Resource');
      
                $db = array();
        
                $db['stage'] = $this->input->post('s_stage');
                $db['overall'] = $this->input->post('s_overall');
                $db['sub1'] = $this->input->post('s_sub1');
                $db['sub2'] = $this->input->post('s_sub2');
                $db['position'] = $this->input->post('s_num');
        $db['title'] = $this->input->post('s_title');
        
        
        $db_ques['position'] = $this->input->post('s_num');
                $db_ques['name']     = $this->input->post('question1');
        
                $db_ans['name']      = $this->input->post('ans1');
        $db_ans['position']  = $this->input->post('s_num');
        
        $db_ans['action1']   = $this->input->post('action1');
        $db_ans['action2']   = $this->input->post('next_action_for_q1');
        
          $noofans['noofans']   = $this->input->post('no_of_ans');
         
        
        $id = $this->Survey_model->update_survey_categories($db, $survey->id,$db_ques,$db_ans,$noofans);
        $this->session->set_flashdata('success', 'Survey Edited successfully ');
        redirect('admin/surveys');
        
        } else {
            $this->data['formError'] = "There was an error editing the selected";
        }

        $this->data['body'] = 'admin/surveys/edit';

        $this->pageTitle[] = "Survey Edit";
        $this->load->view('admin/common/structure', $this->data);


    }

   
   
   /* function edit()
    {
        $this->data['emails'] = $this->outbound_email_model->getEmailList($fields, $order_type);

        $this->data['body']='admin/surveys/edit';

        $this->data['message']=$this->session->flashdata('message');

        $this->load->view('admin/common/structure',$this->data);
    }*/
  
  
   /**
     * This method is used to delete surveys
     * @method edit
     * @example
     *       site_url/admin/surveys/delete
     * 
     */
  
   public
    function delete($id = 0)
    {
     
      $member = $this->Survey_model->fromID($id);
        $this->session->set_flashdata('message-title', 'Delete Survey');
        if ($member) {
            $this->Survey_model->remove_survey_category($id);
            $this->session->set_flashdata('success', 'Survey Deleted Successfully');
        } else {
            $this->session->set_flashdata('error', 'Invalid Survey ID');
        }
        redirect('admin/surveys');

    }
  
  function  get_overall() {
 
    $stage=$this->input->post('stage');
   
    if($stage!=''){
     $result=$this->Survey_model->get_overall($stage);
	       echo '<option value="">select</option>';
    foreach($result as $res){
           echo '<option>'.$res->overall.'</option>';
         }

    }
 }  
  
function  get_sub1() {
 
  $overall=$this->input->post('overall');
   
   if($overall!=''){
     $result=$this->Survey_model->get_sub1($overall);
	     echo '<option value="">select</option>';
	    foreach($result as $res){
          echo '<option>'.$res->sub1.'</option>';
        }
   }
 
 }  
 
 function  get_sub2() {
 
  $sub1=$this->input->post('sub1');
   
   if($sub1!=''){
     $result=$this->Survey_model->get_sub2($sub1);
	  echo '<option value="">select</option>';
	  foreach($result as $res){
       echo '<option>'.$res->sub2.'</option>';
      }
	 
   }
 
 }    

 function  check_lesson_number() {
 
  $val=$this->input->post('val');
   
   if($val!=''){
     $result=$this->Survey_model->check_lesson_number($val);
	 
	 if($result!=0){
         echo 'This Numberical Order Already Exist! Do You Want to Continue';
	   }
    }
 
 }    	

}
?>