<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Shibly
 * Date: 7/18/13
 * Time: 3:38 PM
 * To change this template use File | Settings | File Templates.
 */

class Resource_model extends MY_Model
{
    var $primary_key = "id";
    var $primary_name = "name";
    var $tbl = "resources";
    var $tbl1 = "resource_categories";
    var $comment ="comment_lists";
    var $thump_up_down ="thump_up_downs";
	var $checklist="lesson_checklists";
    function __construct()
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
	
	
/*	public function resize_image($dir, $image, $width, $height)
		{
		$img_cfg_thumb['image_library'] = 'gd2';
		$img_cfg_thumb['source_image'] = "./" . $dir . "/" . $image;
		$img_cfg_thumb['maintain_ratio'] = FALSE;
		//$img_cfg_thumb['new_image'] = $new_name;
		$img_cfg_thumb['width'] = $width;
		$img_cfg_thumb['height'] = $height;
		$this->load->library('image_lib');
		$this->image_lib->initialize($img_cfg_thumb);
		$this->image_lib->resize();
		}
	*/
	
	function search_user($search) {
  
 
     $this->db->select('*');
	 $this->db->from($this->tbl);
if($search!='') {
	   $this->db->or_like('name', $search);
	 }
	 return $this->db->get()->result();
  
  
    }	
	
	//get resopources comments
	public function show_comment() {
	          $this->db->order_by('id','DESC');
			  $this->db->where('userid',$this->session->userdata('user_id'));
	         return $this->db->get($this->comment);
	}
	
	
  //get all categories

    function  display_all_categories($arr,$orderby,$order,$limit,$offset) {
	 
	 $this->db->select('*');
	 $this->db->from($this->tbl);
	 $this->db->order_by($orderby,$order);
	 $cat = $this->db->get();
	 return $cat;
	
    }
	
	 function  display_all_categories1($arr,$orderby,$order,$limit,$offset) {
	 
	 $this->db->group_by('lesson_id');
	 $this->db->select('*');
	 $this->db->from($this->tbl);
	 $this->db->order_by($orderby,$order);
	 $cat = $this->db->get();
	 return $cat;
	
    }

 // update resource categories 
 
    function update_resource_categories($catdata,$id) {
	  $this->db->where('id',$id);
	  $this->db->update($this->tbl,$catdata);
	  return $id;
	  
	}
 
 // add resource categories 
 
    function add_resource_categories($catdata) {
	  $this->db->insert($this->tbl,$catdata);
	}
 
 //get data for edit 
 
   function  get_category_data_for_edit($id) {
   
	 $this->db->where('lesson_id',$id);
	 $cat=$this->db->get($this->tbl);
	 if($cat->num_rows()>0){
	 	 return $cat->result();
     }else{
	   return false;
	 }
   }
   
    //get data for edit 
 
   function  get_category_data_for_edit_1($id) {
   
	 $this->db->where('id',$id);
	 $cat=$this->db->get($this->tbl);
	 if($cat->num_rows()>0){
	 	 return $cat->row();
     }else{
	   return false;
	 }
   }


//remove category 

  function remove_category($catid) {
   $this->db->where('id',$catid);
   $this->db->delete($this->tbl);
  }

 function get_file_name($id){
	$this->db->where('id',$id);
    $result = $this->db->get('resources');
	$result = $result->result();
	return $result[0];
 }

  public function get_lesson_categories_by_id($id)
    {     
	      $this->db->select('*');
          $this->db->from('lesson_categories');
	      $this->db->where('id',$id); 
          $query = $this->db->get();
          return $query->row();
    }

// add resource comment categories 
 
    function add_comment($commentdata) {
	  $this->db->insert($this->comment,$commentdata);
	}
 
 // add down vote 
 
    function save_down($data) {
	
	 $arr=array();
	 $check =$this->db->get($this->thump_up_down);  
	 if($check->num_rows()>0){  
	  foreach($check->result_array() as $value)
				{
				  $arr[]=$value['r_id'];	
				}
		if(!in_array($data['r_id'],$arr))
					{
					    $data['thump_down']=intval($check->row()->thump_down)+1;
	                    $this->db->insert($this->thump_up_down,$data);		
				
					}		
	  }else{
	         
	         $data['thump_down']=1;
	         $this->db->insert($this->thump_up_down,$data);
	  }
		 $this->db->select_max('thump_down');
		 $this->db->where('r_id',$data['r_id']);
	     $this->db->where('Userid',$data['userid']);
         $id=$this->db->get($this->thump_up_down)->row()->thump_down;  
	     return $id;
	}

// add up vote 
 
    function save_up($data) {
	
	 $arr1=array();
	        
	 $check =$this->db->get($this->thump_up_down);  
	 if($check->num_rows()>0){  
		 foreach($check->result_array() as $value)
				{
					 $arr1[]=$value['r_id'];
				} 		
				
		 if(!in_array($data['r_id'],$arr1) )
					{
					   
						  $data['thump_up']=intval($check->row()->thump_up)+1;
	                      $this->db->insert($this->thump_up_down,$data);
						  	
					}
				
	  }else{
	         $data['thump_up']=1;
	         $this->db->insert($this->thump_up_down,$data);
	  }
	  
	 $this->db->where('r_id',$data['r_id']);
	 $this->db->where('Userid',$data['userid']);
	 $this->db->select_max('thump_up');
     $id=$this->db->get($this->thump_up_down)->row()->thump_up;  
	 return $id;
	}
	
	function get_thump_up_down($rid,$uid){
			 $this->db->where('r_id',$rid);
			 $this->db->where('Userid',$uid);
	         $this->db->select_max('thump_up');
		     $this->db->select_max('thump_down');
	         $id=$this->db->get($this->thump_up_down);
	         return $id;
	}
	
  function get_checklist() {
		   $this->db->select('*');
		   $this->db->from($this->checklist);
   return  $this->db->get()->result();
  
  }
  
  
	 
}