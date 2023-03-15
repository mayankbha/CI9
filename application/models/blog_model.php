<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Blog_model extends MY_Model
{
    var $primary_key = "id";
    var $primary_name = "title";
    var $tbl = "blogs";
    function __construct( )
    {
        parent::__construct();
    }
}