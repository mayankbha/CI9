<?php

class Lesson_model extends MY_Model
{
    var $primary_key = "id";
    var $primary_name = "stage";
    var $tbl = "lesson_categories";
    var $tbl1 = "recommendations";
	var $lesson_slide = "lesson_slides";
	var $lesson_todo = "lesson_todo_items";
	var $lesson_checklist = "lesson_checklists";
	var $lesson = "lessons";
	var $survey ="surveys";
  
    public function __construct()
    {
        parent::__construct();
    }

    
	function thumbnail_box($img, $box_w, $box_h) {
    //create the image, of the required size
    $new = imagecreatetruecolor($box_w, $box_h);
    if($new === false) {
        //creation failed -- probably not enough memory
        return null;
    }


    //Fill the image with a light grey color
    //(this will be visible in the padding around the image,
    //if the aspect ratios of the image and the thumbnail do not match)
    //Replace this with any color you want, or comment it out for black.
    //I used grey for testing =)
    $fill = imagecolorallocate($new, 255, 255, 255);
    imagefill($new, 0, 0, $fill);

    //compute resize ratio
    $hratio = $box_h / imagesy($img);
    $wratio = $box_w / imagesx($img);
    $ratio = min($hratio, $wratio);

    //if the source is smaller than the thumbnail size, 
    //don't resize -- add a margin instead
    //(that is, dont magnify images)
    if($ratio > 1.0)
        $ratio = 1.0;

    //compute sizes
    $sy = floor(imagesy($img) * $ratio);
    $sx = floor(imagesx($img) * $ratio);

    //compute margins
    //Using these margins centers the image in the thumbnail.
    //If you always want the image to the top left, 
    //set both of these to 0
    $m_y = floor(($box_h - $sy) / 2);
    $m_x = floor(($box_w - $sx) / 2);

    //Copy the image data, and resample
    //
    //If you want a fast and ugly thumbnail,
    //replace imagecopyresampled with imagecopyresized
    if(!imagecopyresampled($new, $img,
        $m_x, $m_y, //dest x, y (margins)
        0, 0, //src x, y (0,0 means top left)
        $sx, $sy,//dest w, h (resample to this size (computed above)
        imagesx($img), imagesy($img)) //src w, h (the full size of the original)
    ) {
        //copy failed
        imagedestroy($new);
        return null;
    }
    //copy successful
    return $new;
}
	
	
	public function get_stage_name(){
      		
		$this->db->group_by('stage');
		$result = $this->db->get($this->tbl);
		if($result->num_rows()){
			return $result->result();
		} else {
			return false;
		}
	}
	
	public function get_overall_name(){
		
		$this->db->group_by('overall');
		$result = $this->db->get($this->tbl);
		if($result->num_rows()){
			return $result->result();
		} else {
			return false;
		}
	}
	
	public function get_sub1_name(){
		
	            
	              $this->db->group_by('sub1');
		$result = $this->db->get($this->tbl);
		if($result->num_rows()){
			return $result->result();
		} else {
			return false;
		}
	}
	
	public function get_sub2_name(){
		
	    $this->db->group_by('sub2');
		$result = $this->db->get($this->tbl);
		if($result->num_rows()){
			return $result->result();
		} else {
			return false;
		}
	}
	
	
	public function get_lesson_categories_list()
    {            $this->db->group_by("stage");
        $query = $this->db->get('lesson_categories', 20);
        return $query->result();
    }
	
	function  display_all_lesson_categories($arr,$orderby,$order) {
	 
	 $this->db->select('*,numerical_order.number');
	 $this->db->from($this->lesson);
	 $this->db->where('numerical_order.is_lesson','1');
	 $this->db->order_by($this->lesson.'.'.$orderby,$order);
	 $this->db->join('numerical_order', $this->lesson.'.id = numerical_order.id');
		
	 $cat = $this->db->get();
	 if($cat->num_rows()>0){
	    return   $cat->result();
	 }else{
	    return false;
	 }
	
    }
	
	public function get_recommendation_data($searchBy='',$search='')
    {
		  if($searchBy!='' && $search!=''){
		  /* if($searchBy=="title" || $searchBy=="description"){
		   	$this->db->like($searchBy,$search);
		   } else {
		   	$this->db->where("`".$searchBy."` IN(SELECT `id` FROM `lesson_categories` WHERE `".$searchBy."` LIKE '%".$search."%')");
		   }*/
		   $this->db->like($searchBy,$search);
		  } elseif($search){
		   $this->db->like('title',$search);
        }
			$result = $this->db->get($this->tbl1);
			return $result;
   }
	
	// add lesson ,TODO,checklist and slide  table 
 
    public  function add_lesson_categories($db,$db_lesson_slides,$db_to_do,$db_check_list) {
	
			 
			  $flag=0;	 
			    
                         $this->db->insert($this->lesson,$db);
			   $lessonid=$this->db->insert_id();
               
			   
			   $lesno = $this->db->get('numerical_order');
			   if($lesno->num_rows()>0){
			     $result=$lesno->result();
			   }else{
			     $result=array();
			   }
			   
			  if($result) {
			   foreach($result as $res){
					$err[]=$res->number;	
					$lessnono[]=$res->id;
				
			   }
			  
			  $pno=$db['number'];
			
			  if(in_array($db['number'],$err)){
			     $flag=1;
			   }
			 
			  }
				 
			
				 
			if($flag!=0){	
			 
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
			   
		
			  for($k=0 ; $k<count($lessnono); $k++){
			  
						 $this->db->where('id',$lessnono[$k]);
						 $lessondata['number']=$err[$k];
						 $this->db->update('numerical_order',$lessondata);
			  
			        } 
				
			   }
			   
			    $lesnodata['number']=$db['number'];
			    $lesnodata['is_lesson']=1;
			    $lesnodata['is_survey']=0;
			    $lesnodata['id']=$lessonid;
				$this->db->insert('numerical_order',$lesnodata);
			   
		 for($i=0;  $i<intval($db_lesson_slides['noofslide']); $i++){
		 
			    $db_lesson_slides_item['lesson_id']  = $lessonid;
                $db_lesson_slides_item['content']    = $db_lesson_slides['content'][$i];
				
				$breaks = array("\r\n", "\n", "\r");
                $newtext = str_replace($breaks, ",", $db_lesson_slides['points'][$i]);
				
			
				
                $db_lesson_slides_item['points']     =  $newtext;
                $db_lesson_slides_item['image_link'] = $db_lesson_slides['image_link'][$i];
                $db_lesson_slides_item['video_link'] =$db_lesson_slides['video_link'][$i];
				$db_lesson_slides_item['position'] = $db_lesson_slides['position'];
				$this->db->insert($this->lesson_slide,$db_lesson_slides_item);
				
			  }	
			  
	    for($i=0;  $i<intval($db_to_do['nooftodo']); $i++){
		
		        $db_to_do_items['lesson_id']  = $lessonid;
		        $db_to_do_items['item'] = $db_to_do['item'][$i];
				$db_to_do_items['action'] = $db_to_do['action'][$i];
				$db_to_do_items['position'] =$db_to_do['position'];
				$this->db->insert($this->lesson_todo,$db_to_do_items);
			  }
			
		 for($i=0;  $i<intval($db_check_list['noofchecklist']); $i++){
		 
		        $db_check_list_item['lesson_id'] =  $lessonid;
		        $db_check_list_item['title'] =  $db_check_list['title'][$i];
				$db_check_list_item['instructions1'] = $db_check_list['instructions1'][$i];
				$db_check_list_item['item'] =$db_check_list['item'][$i];;
				$db_check_list_item['instructions2'] = $db_check_list['instructions2'][$i];
				$db_check_list_item['position'] =  $db_check_list['position'];
				$this->db->insert($this->lesson_checklist,$db_check_list_item);
			  }	  													 	   
			   
	}
	
   public function 	get_only_lesson($id) {
   
                 $this->db->where('id',$id); 
        $query = $this->db->get($this->lesson, 20);
        return $query->row();
   }
	
   public function 	get_lesson_slide($id) {
                 $this->db->order_by('id','asc');
                 $this->db->where('lesson_id',$id);
        $query = $this->db->get($this->lesson_slide, 20);
        return $query->result();
   }
   
   public function 	get_lesson_todo($id) {
                $this->db->order_by('id','asc');
                 $this->db->where('lesson_id',$id);
        $query = $this->db->get($this->lesson_todo, 20);
        return $query->result();
   }
   
   public function 	get_lesson_checklist($id) {
                 $this->db->order_by('id','asc');
                 $this->db->where('lesson_id',$id);
        $query = $this->db->get($this->lesson_checklist, 20);
        return $query->result();
   }	
   
   public function get_recommendation(){
   
		$result = $this->db->get($this->tbl1);
		if($result->num_rows()>0){
			return $result->result();
		}else{
		    return false;
		}
   }
   
   
   public function get_recommendation_value(){
   
		$result = $this->db->get($this->tbl1);
		if($result->num_rows()>0){
			$result = $result->result();
			return $result[0];
		}
   }
   
   
   public function update($id,$db,$db_number,$db_lesson_slides,$db_to_do,$db_check_list){
   
		  $flag1=0;	 
		
			  $surno = $this->db->get('numerical_order');
			   
			   if($surno->num_rows()>0){
			     $result1=$surno->result();
			   }else{
			     $result1=array();
			   }
			   
			
			   
			  if($result1) {
			   foreach($result1 as $res1){
			   
					$err1[]=$res1->number;	
					$surveyno[]=$res1->id;
				
			   }
			  
			 
			  $pno1=$db_number['number'];
			
			  if(in_array($db_number['number'],$err1)){
			     $flag1=1;
			   }
		
		      }else {
			  
			   $lesnodata['number']=$db['number'];
			   $lesnodata['is_lesson']=1;
			   $lesnodata['is_survey']=0;
			   $lesnodata['id']=$id;
			   
			  } 
			  
		   $flag2=0;
		
			        $this->db->where('id',$id);
				    $this->db->where('is_lesson','1');
		$result2 =	$this->db->get('numerical_order');
			
			if($result2->num_rows()){
			
			  if(in_array($db_number['number'],$result2->result())){
			  
			     $flag2=1;
			    
			  }
			
			 }
			
		
		
			if($flag1!=0)
			{  
		
			 if($flag2!=0){
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
			
			
		      //$err=array_replace($err,$replacements); 
				  
			  for($k1=0 ; $k1<count($surveyno); $k1++){
			  
			     $this->db->where('id',$surveyno[$k1]);
				 $surveydata['number']=$err1[$k1];
				 $this->db->update('numerical_order',$surveydata);
			  
			     } 
				  
				 } 
			   }	  
				
			    $this->db->where('id',$id);
				$this->db->where('is_lesson','1');
				$lesnodata['number']=$db_number['number'];
                $this->db->update('numerical_order',$lesnodata); 
              
			 
			  
			   $db['number']=$db_number['number'];
			   $this->db->where('id',$id);
               $this->db->update($this->lesson,$db); 
			
			   $this->db->where('lesson_id',$id);
               $this->db->delete($this->lesson_slide); 
			 
			   $this->db->where('lesson_id',$id); 
               $this->db->delete($this->lesson_todo);  
			   
			   $this->db->where('lesson_id',$id);
               $this->db->delete($this->lesson_checklist);   
			   
			   
			   
		 for($i=0;  $i<count($db_lesson_slides['noofslide']); $i++){
		 
		       
			    $db_lesson_slides_item['lesson_id']  = $id;
                $db_lesson_slides_item['content']    = $db_lesson_slides['content'][$i];
				
				$breaks = array("\r\n", "\n", "\r");
                $newtext = str_replace($breaks, ",", $db_lesson_slides['points'][$i]);
			
                $db_lesson_slides_item['points']     =  $newtext;
                $db_lesson_slides_item['image_link'] = $db_lesson_slides['image_link'][$i];
                $db_lesson_slides_item['video_link'] =$db_lesson_slides['video_link'][$i];
				$db_lesson_slides_item['position'] = $db_lesson_slides['position'];
				$this->db->insert($this->lesson_slide,$db_lesson_slides_item);
				
			  }	
			  
	    for($i=0;  $i<count($db_to_do['nooftodo']); $i++){
		
		        $db_to_do_items['lesson_id']  = $id;
		        $db_to_do_items['item'] = $db_to_do['item'][$i];
				$db_to_do_items['action'] = $db_to_do['action'][$i];
				$db_to_do_items['position'] =$db_to_do['position'];
				$this->db->insert($this->lesson_todo,$db_to_do_items);
			  }
			
		 for($i=0;  $i<count($db_check_list['noofchecklist']); $i++){
		 
		        $db_check_list_item['lesson_id'] =  $id;
		        $db_check_list_item['title'] =  $db_check_list['title'][$i];
				$db_check_list_item['instructions1'] = $db_check_list['instructions1'][$i];
				$db_check_list_item['item'] =$db_check_list['item'][$i];;
				$db_check_list_item['instructions2'] = $db_check_list['instructions2'][$i];
				$db_check_list_item['position'] =  $db_check_list['position'];
				$this->db->insert($this->lesson_checklist,$db_check_list_item);
			  }	  													 	   
			   
		
	
   }
   
   function delete_lesson($id) {
   
    $this->db->where('id',$id);
	$this->db->delete($this->lesson);
	
	$this->db->where('id',$id);
	$this->db->delete('numerical_order');
	
	$this->db->where('lesson_id',$id);
	$this->db->delete($this->lesson_slide);
	
	
	$this->db->where('lesson_id',$id);
	$this->db->delete($this->lesson_todo);
	
	$this->db->where('lesson_id',$id);
	$this->db->delete($this->lesson_checklist);
   }
	
   public function get_overall($stage) {
  
          $this->db->where('stage',$stage);
		  $this->db->group_by("overall"); 
		  $this->db->distinct(); 
    $res= $this->db->get($this->tbl);
  
    if($res->num_rows()){
	  return $res->result();
	}else{
	  return false;
	}
  }

 public function get_sub1($overall) {
  
        $this->db->where('overall',$overall);
		$this->db->group_by("sub1"); 
  $res= $this->db->get($this->tbl);
  
    if($res->num_rows()){
	  return $res->result();
	}else{
	  return false;
	}
  }
  
   public function get_sub2($sub2) {
  
        $this->db->where('sub1',$sub2);
		$this->db->group_by("sub2"); 
  $res= $this->db->get($this->tbl);
  
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
    
public function remove_slide($id) {

     $this->db->where('id', $id);
     $this->db->delete($this->lesson_slide); 
  }					

public function remove_todo_item($id) {

     $this->db->where('id', $id);
     $this->db->delete($this->lesson_todo); 
  }	
  
 public function remove_checklist_item($id) {

     $this->db->where('id', $id);
     $this->db->delete($this->lesson_checklist); 
  }	 

  public function get_numerical_order($id) {
 
        $this->db->where('id',$id);
		$this->db->where('is_lesson','1');
  $res= $this->db->get('numerical_order');
    if($res->num_rows()>0){
	  return  $res->row()->number;
	}else{
	  return false;
	}
 
 }
 

}