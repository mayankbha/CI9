<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Shibly
 * Date: 7/18/13
 * Time: 10:11 PM
 * To change this template use File | Settings | File Templates.
 */

class Survey_model extends MY_Model
{
    var $primary_key = "id";
    var $primary_name = "stage";
    var $tbl = "surveys";
    var $tbl1 = "survey_categories";
	var $lesson_category 	= "lesson_categories";
	var $questions 	= "questions";
	var $answers 	= "answers";
	var $lesson  = "lessons";

    public function __construct()
    {
        parent::__construct();

    }


      	public function get_stage_name(){
      		
		$this->db->group_by('stage');
		$result = $this->db->get($this->lesson_category);
		if($result->num_rows()){
			return $result->result();
		} else {
			return false;
		}
	}
	
	public function get_overall_name(){
		
		$this->db->group_by('overall');
		$result = $this->db->get($this->lesson_category);
		if($result->num_rows()){
			return $result->result();
		} else {
			return false;
		}
	}
	
	public function get_sub1_name(){
		
	            
	              $this->db->group_by('sub1');
		$result = $this->db->get($this->lesson_category);
		if($result->num_rows()){
			return $result->result();
		} else {
			return false;
		}
	}
	
	public function get_sub2_name(){
		
	    $this->db->group_by('sub2');
		$result = $this->db->get($this->lesson_category);
		if($result->num_rows()){
			return $result->result();
		} else {
			return false;
		}
	}
    public function get_survey_list()
    {
        $query = $this->db->get('surveys', 20);
        return $query->result();
    }
	
	
	public function get_question($sid) {
	             $this->db->where('survey_id',$sid); 
	    $query = $this->db->get('questions', 20);
		if($query->num_rows()>0){
         return $query->row();
		}else{
		 return false;
		}
	}
	
	public function get_answer($qid) {
	             
				 $this->db->group_by('id','asc');
	             $this->db->where('question_id',$qid);
	    $query = $this->db->get('answers', 20);
		if($query->num_rows()>0){
         return $query->result();
		}else{
		 return false;
		}
	}
	
	
	//get all categories

    function  display_all_survey_categories($arr,$orderby,$order,$limit,$offset) {
	 
	
	 $this->db->select('*');
	 $this->db->from($this->tbl);
	 $this->db->where('numerical_order.is_survey','1');
	 $this->db->where('surveys.is_deleted',0);
	 $this->db->order_by('numerical_order.'.$orderby,$order);
	 $this->db->join('numerical_order', $this->tbl.'.id = numerical_order.id');
	 $cat = $this->db->get();
	 
	 if($cat->num_rows()>0){
	    return   $cat->result();
	 }else{
	    return false;
	 }
	
    }

	 // update survey categories 
	 
		function update_survey_categories($data,$id,$qeustion,$ans,$noofans) {
		
		
		
		   $err=array();
		   $flag=0;
		   
			   $lesno = $this->db->get('numerical_order');
			   
			   if($lesno->num_rows()>0){
			     $result=$lesno->result();
			   }else{
			     $result=array();
			   }
			   
			  if($result) {
			   foreach($result as $res){
					$err[]=$res->number;	
					$surveyid[]=$res->id;
				
			   }
			  
			  $pno=$data['position'];
			 
			  if(in_array($data['position'],$err)){
			     $flag=1;
			   }
			
			}
			
		$flag1=0;
		
		
			        $this->db->where('id',$id);
		$result=	$this->db->get('numerical_order');
			
			if($result->num_rows()){
			
			  if($result->row()->number!=$data['position']){
			  
			      $flag1=1;
			  
			  }
			
			 }
			
			if($flag!=0)
			{  
		
		     if($flag1!=0) {
			 
			  $j=0;
		
			  while(TRUE) {
			  
			    if(in_array($pno,$err)){
				
				   $lno=array_search($pno,$err);
				   $keys[]=$lno;
				   $pno=$pno+1;
				   $replacements[$lno] = $pno;
				 
			     }else{ 
				   $j=1;
				 }
				 
				if($j!=0) {
			          break;
					}
					
			   } 
			   
			  
			  for($m=0; $m<count($replacements); $m++){
			    $err[array_search($replacements[$keys[$m]],$replacements)]=$replacements[$keys[$m]];
			  }  
			
		      //$err=array_replace($err,$replacements); 
				  
			  for($k=0 ; $k<count($surveyid); $k++){
			  
			     $this->db->where('id',$surveyid[$k]);
				 $surveydata['number']=$err[$k];
				 $this->db->update('numerical_order',$surveydata);
			  
			   } 
			   }	  
			   }
			  
			    $this->db->where('id',$id);
			    $this->db->where('is_survey','1');
				$surveydata['number']=$data['position'];
		        $this->db->update('numerical_order',$surveydata);
			   
		  
		
		   $this->db->where('id',$id);
		   $this->db->update($this->tbl,$data);
		   
		   $this->db->where('survey_id',$id);
		   $this->db->update($this->questions,$qeustion);
		   
		   $this->db->where('survey_id',$id);
	$qid=  $this->db->get($this->questions)->row()->id;
	
		   $this->db->where('question_id',$qid);
	$aid=  $this->db->delete($this->answers);
     
    
										
		 for($i=0;  $i<intval($noofans['noofans']); $i++){
		 
															$ansno['name']=$ans['name'][$i];
															$ansno['position']=$ans['position'];
															$ansno['action1']=$ans['action1'][$i];
															$ansno['action2']=$ans['action2'][$i];
															$ansno['question_id']=$qid;
															$ansno['survey_id']=$id;
															$this->db->insert($this->answers,$ansno);
												
								                         }
		return $id;
		  
		}
	 
	 // add survey categories 
	 
		function add_survey_categories($data,$qeustion,$ans,$noofans) {
		
		
		
		  
		                                     $this->db->insert($this->tbl,$data);
		$qeustion['survey_id']= $survey_id=  $this->db->insert_id();
		
		
		
		
			   $err=array();
			   $flag1=0;
		//for numerical order	   
			   
			   $surno = $this->db->get('numerical_order');
			   
			   if($surno->num_rows()>0){
			     $result1=$surno->result();
			   }else{
			     $result1=array();
			   }
			   
			  if($result1) {
			   foreach($result1 as $res1){
					$err1[]=$res1->number;	
					$lessonid[]=$res1->id;
				
			   }
			  
			  
			
			
			 }else {
			   
			            $surveydata['number']=$db['number'];
						$surveydata['is_lesson']=0;
						$surveydata['is_survey']=1;
						$surveydata['id']=$lessonid;
						$this->db->insert('numerical_order',$surveydata);
					   
			        }	  
		
			  $pno1=$data['position'];
			
			  if(in_array($data['position'],$err1)){
			     $flag1=1;
			   }
			   
			if($flag1!=0)
		    {   
			  $j1=0;
		
			  while(TRUE) {
			  
			    if(in_array($pno1,$err1)){
				
				   $lno1=array_search($pno1,$err1);
				   $keys1[]=$lno1;
				   $pno1=$pno1+1;
				   $replacements1[$lno1] = $pno1;
				 
			     }else{ 
				   $j1=1;
				 }
				 
				if($j1!=0) {
			          break;
					}
					
			   } 
			  
		
			   
			 for($m1=0; $m1<count($replacements1); $m1++){
			    $err1[array_search($replacements1[$keys1[$m1]],$replacements1)]=$replacements1[$keys1[$m1]];
			  }  
			   
		
			  for($k1=0 ; $k1<count($lessonid); $k1++){
			  
			     $this->db->where('id',$lessonid[$k1]);
				 $lessondata['number']=$err1[$k1];
				 $this->db->update('numerical_order',$lessondata);
			  
			     } 
				
			   
			   }
				  
			
		        $surveydata['number']=$data['position'];
			    $surveydata['is_lesson']=0;
			    $surveydata['is_survey']=1;
			    $surveydata['id']=$survey_id;
				$this->db->insert('numerical_order',$surveydata);	
				  	 
			
		 
		                          $this->db->insert($this->questions,$qeustion);
        $ans['question_id']   =   $this->db->insert_id();								
		
		 for($i=0;  $i<intval($noofans['noofans']); $i++){
		
		                                $ansno['name']=$ans['name'][$i];
										$ansno['position']=$ans['position'];
									    $ansno['action1']=$ans['action1'][$i];
									    $ansno['action2']=$ans['action2'][$i];
									    $ansno['question_id']=$ans['question_id'];
										$ansno['survey_id']=$survey_id;
		                                $this->db->insert($this->answers,$ansno);
								      }
		}
	 
	 //get data for edit 
	 
	  function  get_category_data_for_edit($id) {
	   
		 $this->db->select('*');
		 $this->db->from($this->tbl);
		 $this->db->where('resource_categories.cat_id',$id);
		 $this->db->join($this->tbl1,'resources.cat_id=resource_categories.id');
		 $cat = $this->db->get();
		 return $cat;
	   
	   }

//remove category 

	  function remove_survey_category($catid) {
	  
	 /*  $catdata=array('is_deleted'=>1);
	   $this->db->where('id',$catid);
	   $this->db->update($this->tbl,$catdata);*/
	   $this->db->where('id',$catid);
	   $this->db->delete($this->tbl);
	   
	   $this->db->where('id',$catid);
	   $this->db->delete('numerical_order');
	  }

    public function get_survey_category_list()
    {
        $query = $this->db->get($this->tbl1);
        return $query->result();
    }
	
	public function get_lesson_category($id) {  
	   $this->db->where('id',$id);
	   $query  = $this->db->get('lessons');
       if($query->num_rows>0){
	   $result = $query->result();
	   return $result[0]->title;
	   } else {
	   	return "N/A";
	   }
	
	}

   public function get_overall($stage) {
  
    $this->db->where('stage',$stage);
    $this->db->group_by('overall');
    $res= $this->db->get($this->lesson_category);
  
    if($res->num_rows()){
	  return $res->result();
	}else{
	  return false;
	}
  }

 public function get_sub1($overall) {
  
         $this->db->where('overall',$overall);
  $res= $this->db->get($this->lesson_category);
  
    if($res->num_rows()){
	  return $res->result();
	}else{
	  return false;
	}
  }
  
   public function get_sub2($sub2) {
  
         $this->db->where('sub1',$sub2);
  $res= $this->db->get($this->lesson_category);
  
    if($res->num_rows()){
	  return $res->result();
	}else{
	  return false;
	}
  }
  
  public function check_lesson_number($val) {
 
	    $this->db->where('number',$val);
  $res= $this->db->get('numerical_order');
    if($res->num_rows()>0){
	  return  "1";
	}else{
	  return false;
	}
  }	
 public function get_numerical_order($id=false) {
 
        $this->db->where('id',$id);
		$this->db->where('is_survey','1');
  $res= $this->db->get('numerical_order');
    if($res->num_rows()>0){
	  return  $res->row()->number;
	}else{
	  return false;
	}
 
 }

}