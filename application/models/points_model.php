<?php

class Points_model extends MY_Model
{
    var $primary_key = "id";
    var $primary_name = "stage";
    var $tbl = "point";

    public function __construct()
    {
        parent::__construct();
    }

    public function get_lesson_categories_list()
    {
        $query = $this->db->get('lesson_categories', 20);
        return $query->result();
    }
	
   
   public function add_point_value($data) {
   if($this->db->get($this->tbl)->num_rows()>0){
		$this->db->where('id',1);
		$this->db->update($this->tbl,$data);
	}else{
	    $this->db->insert($this->tbl,$data);
	}
   }
   	
   public function get_point_value() {
     $query=$this->db->get($this->tbl);
	if($query->num_rows()>0){
	  $result=$query->row();
	  }else{
	  $result='0';
	  }
	  
	  return $result;
   }
	
  
	
	
	

}