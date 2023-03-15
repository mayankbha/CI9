<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Shibly
 * Date: 7/18/13
 * Time: 10:08 PM
 * To change this template use File | Settings | File Templates.
 */

class Lesson_cat_model extends MY_Model
{
    var $primary_key = "id";
    var $primary_name = "stage";
    var $tbl = "lesson_categories";

    public function __construct()
    {
        parent::__construct();
    }

    public function get_lesson_categories_list()
    {
        $query = $this->db->get('lessons', 20);
        return $query->result();
    }
	
	public function get_lesson_categories()
    {
        $query = $this->db->get($this->tbl, 20);
        return $query->result();
    }

}