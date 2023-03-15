<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Admin_users_model extends MY_Model
{
	var $primary_key = "user_id";
	var $primary_name = "email";
	var $tbl = "admin_users";
	function __construct( )
	{
		parent::__construct();
	}
}