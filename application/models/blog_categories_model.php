<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Blog_categories_model extends MY_Model
{
    var $primary_key = "id";
    var $primary_name = "";
    var $tbl = "blog_categories";
    function __construct( )
    {
        parent::__construct();
    }
}