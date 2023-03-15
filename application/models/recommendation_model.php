<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Shibly
 * Date: 7/18/13
 * Time: 10:11 PM
 * To change this template use File | Settings | File Templates.
 */

class Recommendation_model extends MY_Model
{
    var $primary_key 		= "id";
    var $primary_name 		= "stage";
    var $recommendations 	= "recommendations";
	var $lessons 			= "lessons";
	var $survey 			= "surveys";
	var $lesson_category 	= "lesson_categories";

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
	
	
	
	public function get_lessons($sub2){
	               
				   $this->db->group_by('title');
				   $this->db->where('sub2',$sub2);
		$lessons = $this->db->get($this->lessons);
		if($lessons->num_rows()){
			return $lessons->result();
		} else {
			return false;
		}
	}
	
	public function get_lessonss(){
	               
				   $this->db->group_by('title');
		$lessons = $this->db->get($this->lessons);
		if($lessons->num_rows()){
			return $lessons->result();
		} else {
			return false;
		}
	}
	
	public function get_lesson_categories(){
	
	               $this->db->group_by("stage");
		$lessons = $this->db->get($this->lesson_category);
		if($lessons->num_rows()){
			return $lessons->result();
		} else {
			return false;
		}
	}
	
	public function get_surveys($sub2){
	               
	               $this->db->group_by('title');
				   $this->db->where('is_deleted','0');
				   $this->db->where('sub2',$sub2);
		$lessons = $this->db->get($this->survey);
		if($lessons->num_rows()){
			return $lessons->result();
		} else {
			return false;
		}
	}
	
	public function get_surveyss(){
	               
	               $this->db->group_by('title');
				   $this->db->where('is_deleted','0');
		$lessons = $this->db->get($this->survey);
		if($lessons->num_rows()){
			return $lessons->result();
		} else {
			return false;
		}
	}
	
	public function insert($data){
		$this->db->insert($this->recommendations,$data);
	}
	
	public function get_recommendations($data){
	
	              $this->db->order_by($data['orderby'],$data['order']);
		$result = $this->db->get($this->recommendations);
		if($result->num_rows()){
			return $result->result();
		} else {
			return false;
		}
	}
		
	public function get_recommendation_name($id){
	
		$this->db->where('id',$id);
		$result = $this->db->get($this->recommendations);
		if($result->num_rows()){
			return $result->row();
		} else {
			return false;
		}
	}
	
	public function get_overall_name($id){
		$this->db->where('id',$id);
		$result = $this->db->get($this->lesson_category);
		if($result->num_rows()){
			$result = $result->result();
			return $result[0]->overall;
		} else {
			return false;
		}
	}
	
	public function get_sub1_name($id){
		$this->db->where('id',$id);
		$result = $this->db->get($this->lesson_category);
		if($result->num_rows()){
			$result = $result->result();
			return $result[0]->sub1;
		} else {
			return false;
		}
	}
	
	public function get_sub2_name($id){
		$this->db->where('id',$id);
		$result = $this->db->get($this->lesson_category);
		if($result->num_rows()){
			$result = $result->result();
			return $result[0]->sub2;
		} else {
			return false;
		}
	}
	
	public function get_lesson_name($id){
		$this->db->where('id',$id);
		$result = $this->db->get($this->lessons);
		if($result->num_rows()){
			$result = $result->result();
			return $result[0]->title;
		} else {
			return false;
		}
	}
	
	public function get_survey_name($id){
		$this->db->where('id',$id);
		$result = $this->db->get($this->survey);
		if($result->num_rows()){
			$result = $result->result();
			return $result[0]->title;
		} else {
			return false;
		}
	}
	
	public function update($id,$data){
		$this->db->where('id',$id);
		$this->db->update($this->recommendations,$data);
	}
	
	public function get_recommendation($id){
		$this->db->where('id',$id);
		$recommendation = $this->db->get($this->recommendations);
		if($recommendation->num_rows()){
			$result = $recommendation->result();
			return $result[0];
		} else {
			return false;
		}
	}
	
	public function delete($id){
		$this->db->delete($this->recommendations,array('id'=>$id));
	}


  public function search($searchBy,$searchword){
       
	   /*if($searchBy=='title') {
		$this->db->like($searchBy,$searchword);
		}else{
	    $que=$searchBy.' in(select id from lesson_categories where ' .$searchBy. ' like ' .'\'%'.$searchword.'%\''.')';
		$this->db->where($que);
		}*/
		
        $this->db->like($searchBy,$searchword);
    	$result = $this->db->get($this->recommendations);
		if($result->num_rows()){
			return $result->result();
		} else {
			return false;
		}
  }		

  public function get_overall($stage) {
  
         $this->db->where('stage',$stage);
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
 
  public function get_les($les) {
  
        $this->db->group_by('title'); 
        $this->db->where('sub2',$les);
  $res= $this->db->get($this->lessons);
  
    if($res->num_rows()){
	  return $res->result();
	}else{
	  return false;
	}
  }

  public function get_sur($sur) {
  
        $this->db->group_by('title'); 
        $this->db->where('sub2',$sur);
  $res= $this->db->get($this->survey);
  
    if($res->num_rows()){
	  return $res->result();
	}else{
	  return false;
	}
  }



}