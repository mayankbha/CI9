<?php
class Email_templates_model extends MY_Model {

	 var $primary_key = "email_id";
	 var $primary_name = "name";
	 var $tbl = "emails";

	 function __construct() {
		  parent::__construct();
	 }

}