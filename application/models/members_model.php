<?php 
class Members_model extends MY_Model
{
	var $primary_key = "member_id";
	var $primary_name = "email";
	var $tbl = "members";
	function __construct( )
	{
		parent::__construct();
	}
}