<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
if (!function_exists('getMetaContent')) {
	function getMetaContent($name, $type = '')
	{
		$CI =& get_instance();
		$row = $CI->db->where('name', $name)->get('content')->row_array();
		if (empty($row)) {
			$CI->db->set('name', $name);
			$CI->db->set('data', "<p>Content ::" . $name . ". Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at erat et metus dapibus tincidunt at sit amet tortor. Donec hendrerit elit at arcu facilisis egestas. Maecenas tempus, libero eu interdum cursus, est turpis tristique sapien, ut porta mi magna vel velit. Duis in nulla at mauris sodales condimentum in id dui. Sed faucibus tellus id metus consequat tincidunt. Sed fringilla adipiscing nisi, ut scelerisque enim gravida eget. Curabitur quis ligula magna. Nunc risus lacus, fringilla eget dictum vitae, viverra in odio. Integer viverra lectus id odio malesuada porttitor. Praesent eu cursus lorem. Duis facilisis elit pellentesque erat ornare id rhoncus diam venenatis. Cras mattis augue ac dui sodales sodales.</p>");
			$CI->db->set('title', "startup meow::" . $name);
			$CI->db->set('description', "startup meow:: Description :: " . $name);
			$CI->db->set('keywords', "startup meow,keywords," . $name);
			if ($type != '') {
				$CI->db->set('type', $type);
			}
			if ($type == 'meta')
				$CI->db->set('tiny_enabled', 0);
			else
				$CI->db->set('tiny_enabled', 1);
			$CI->db->insert('content');
			$row = $CI->db->where('name', $name)->get('content')->row_array();
		}
		return $row;
	}
}
if (!function_exists('getDomain')) {
	function getDomain()
	{
		$CI =& get_instance();
		return preg_replace("/^[\w]{2,6}:\/\/([\w\d\.\-]+).*$/", "$1", $CI->config->slash_item('base_url'));
	}
}
if (!function_exists('getFaceBookFanCount')) {
	function getFaceBookFanCount()
	{
		$facebook_page_id = '';
		$url              = "https://graph.facebook.com/110009005739971";
		$page             = json_decode(file_get_contents($url));
		echo file_get_contents($url);
	}
}
function getAttribute($attrib, $tag)
{
	$re = '/' . preg_quote($attrib) . '=([\'"])?((?(1).+?|[^\s>]+))(?(1)\1)/is';
	if (preg_match($re, $tag, $match)) {
		return urldecode($match[2]);
	}
	return false;
}
function time_ago($datetime)
{
	if ($datetime == "0000-00-00 00:00:00") {
		return "Never";
	}
	$time       = strtotime($datetime);
	$periods    = array(
		"second",
		"minute",
		"hour",
		"day",
		"week",
		"month",
		"year",
		"decade"
	);
	$lengths    = array(
		"60",
		"60",
		"24",
		"7",
		"4.35",
		"12",
		"10"
	);
	$now        = time();
	$difference = $now - $time;
	$tense      = "ago";
	for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
		$difference /= $lengths[$j];
	}
	$difference = round($difference);
	if ($difference != 1) {
		$periods[$j] .= "s";
	}
	if ($difference < 1) {
		$difference = 1;
	}
	return "$difference $periods[$j] ago ";
}
function page_title()
{
	$CI =& get_instance();
	krsort($CI->pageTitle);
	return implode(' - ', $CI->pageTitle);
}
function categoryDropdown($selected = 0, $id = "category", $class = "", $showRoot = false)
{
	
	echo "<select name=\"$id\" id=\"$id\" class=\"$class\">";
	if ($showRoot) {
		echo "<option value=\"0\">Parent</option>";
	}
	createChildCatDropdown($selected, 0);
	echo "</select>";
	
}

function createChildCatDropdown($selected = 0, $parent = 0, $level = 0)
{
	$CI =& get_instance();
	$CI->load->model('blog_categories_model');
	$CI->load->helper('string');
	$cats = $CI->blog_categories_model->get(array(
		'parent_id' => $parent
	));
	foreach ($cats as $cat) {
		echo "<option value=\"" . $cat->id . "\"" . ($selected == $cat->id ? " selected=\"selected\"" : "") . ">" . repeater("&nbsp;&nbsp;", $level) . $cat->name . "</option>";
		if ($CI->blog_categories_model->getTotal(array(
			'parent_id' => $cat->id
		)) > 0) {
			createChildCatDropdown($selected, $cat->id, $level + 1);
		}
	}
	
}