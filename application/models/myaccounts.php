<?php  
class myaccounts extends CI_Model
 {

  
   var $lesson="lessons";
   var $surveys="surveys";
   var $lesson_categories="lesson_categories";
   var $numricalorder="numerical_order";

	 function __construct() {
	
	 parent::__construct();
	
	}


  public function get_lesson() {
  
  return $this->db->get($this->lesson)->result();
  }

   public function get_lesson_view($id) {
          $this->db->where('id',$id);
   return $this->db->get($this->lesson)->row();
  }

  public function show_all_lesson_at_home() {
  
           $this->db->order_by('number','asc');
	 $res= $this->db->get($this->numricalorder);
     if($res->num_rows()>0) {
	   return $res->result();
	 } else {
	   return false;
	 }
  }
  
   public function get_survey($sub2) {
   
          $this->db->select('*');
		  $this->db->from($this->surveys);
          $this->db->where('surveys.sub2',$sub2);
		  $this->db->order_by('numerical_order.number','ASC');
		  $this->db->join('numerical_order','numerical_order.id=surveys.id');
   $res = $this->db->get();
     if($res->num_rows()>0) {
	     return  $res->result();
	   }else {
	     return false;
	   }
   
  }
  public function get_lesson_by_sub2($sub2) {
              
			   $this->db->select('*');
			   $this->db->from($this->lesson);
               $this->db->where('lessons.sub2',$sub2);
			   $this->db->order_by('numerical_order.number','ASC');
			   $this->db->join('numerical_order','numerical_order.id=lessons.id');
       $res=   $this->db->get();
	   if($res->num_rows()>0) {
	   
	     return  $res->result();
	   }else {
	     return false;
	   }
   
  }
  
  public function get_lesson_category() {
  
    $result= $this->db->get($this->lesson_categories);
     if($result->num_rows()>0) {
	   return $result->result();
	 } else {
	   return false;
	 }
  }

}

?>