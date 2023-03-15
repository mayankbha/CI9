<?php  
class myaccount extends CI_Model
 {

  
   var $lesson="lesson";

	 function __construct() {
	
	 parent::__construct();
	
	}


  public function get_lesson() {
  
  return $this->db->get($this->lesson);
  }


}

?>