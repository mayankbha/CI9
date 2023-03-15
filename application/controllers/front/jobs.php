<?php
class Jobs extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		// Your own constructor code

		$this->data = array();	

		$this->data['sel'] = 'jobs';
	}

	function index()
	{ 
		 $this->data['meta']  = getMetaContent('jobs', 'meta');
		 
		 $jobs_title_1  = getMetaContent('jobs_title_1', 'data');
		 
		 $this->data['jobs_title_1'] = $jobs_title_1['data'];
		 
		 $jobs_date_1  = getMetaContent('jobs_date_1', 'data');
		 
		 $this->data['jobs_date_1'] = $jobs_date_1['data'];
		 
		 $jobs_location_1  = getMetaContent('jobs_location_1', 'data');
		 
		 $this->data['jobs_location_1'] = $jobs_location_1['data'];
		 
		 $jobs_type_1  = getMetaContent('jobs_type_1', 'data');
		 
		 $this->data['jobs_type_1'] = $jobs_type_1['data'];
		 
		 $jobs_description_1  = getMetaContent('jobs_description_1', 'data');
		 
		 $this->data['jobs_description_1'] = $jobs_description_1['data'];
		
		 $jobs_specification_1  = getMetaContent('jobs_specification_1', 'data');
		 
		 $this->data['jobs_specification_1'] = $jobs_specification_1['data'];
		
		$jobs_title_2  = getMetaContent('jobs_title_2', 'data');
		 
		$this->data['jobs_title_2'] = $jobs_title_2['data'];
		 
		$jobs_date_2  = getMetaContent('jobs_date_2', 'data');
		 
		$this->data['jobs_date_2'] = $jobs_date_2['data'];
		 
		$jobs_location_2  = getMetaContent('jobs_location_2', 'data');
		 
		$this->data['jobs_location_2'] = $jobs_location_2['data'];
		 
		$jobs_type_2  = getMetaContent('jobs_type_2', 'data');
		 
		$this->data['jobs_type_2'] = $jobs_type_2['data'];
		
		 $jobs_description_2  = getMetaContent('jobs_description_2', 'data');
		 
		 $this->data['jobs_description_2'] = $jobs_description_2['data']; 
		 
		$jobs_specification_2  = getMetaContent('jobs_specification_2', 'data');
		 
		$this->data['jobs_specification_2'] = $jobs_specification_2['data'];
		
		$this->data['body']='front/jobs';
		
		$this->load->view('front/common/structure',$this->data);
	}
       
        
        
}

?>
