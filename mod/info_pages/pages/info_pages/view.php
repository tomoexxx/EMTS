<?php
/**
 * View a single page
 *
 * @package ElggPages
 */


$page_guid = get_input('guid');
$page = get_entity($page_guid);

if (!$page) {
	forward();
}

//we use this to stop showing the owner block!
set_page_owner($page_guid);

$title = $page->title;

elgg_push_breadcrumb($title);


$content = elgg_view_entity($page, array('full_view' => true));

// LoginUser==Owner -> Add Button
if($page->parent_guid){
	$parent = get_entity($page->parent_guid);
/* Add Tani 2013.07.16 */
} else {
	// get subpage
	$subpages = elgg_get_entities_from_metadata(array(
		'types' => 'object',
		'subtypes' => 'info_page',
		'metadata_name_value_pairs' => array('name' => 'parent_guid', 'value' => $page->guid, 'operand' => '='),
	));
	// bar
	$content .= "<hr /><br>";
	// display subpage
	foreach ($subpages as $subpage) {
		//$content .= "loop ... ";
		if ($subpage->orderno == 0) {
			//$content .= $subpage->title;
			$content .= date("Y/m/d", $subpage->time_created) . "\t";
			$content .= elgg_view('output/url', array(
			//$content .= elgg_view('object/elements/summary', array(
				'name' => $subpage->title,
				'text' => $subpage->title,
				'href' => $subpage->getURL(),
				'class' => 'subpage',
			)) . "<br>";
		}
	}
	/*
	$content = elgg_list_entities_from_metadata(array(
        	'types' => 'object',
        	'subtypes' => 'info_page',
        	'full_view' => false,
        	'order_by_metadata' =>  array('name' => 'orderno', 'direction' => ASC, 'as' => integer),
		'wheres' => "e.guid = '" . $page->guid . "'",
	));
	*/
/* Add End */
}
if (elgg_get_logged_in_user_guid() == $page->getOwnerGuid() && !$parent->parent_guid) {
	$url = "info_pages/add/$page->guid";
	elgg_register_menu_item('title', array(
			'name' => 'subpage',
			'href' => $url,
			'text' => elgg_echo('info_pages:newchild'),
			'link_class' => 'elgg-button elgg-button-action',
	));
}

if (elgg_is_logged_in()) {
	$body = elgg_view_layout('content', array(
		'filter' => '',
		'content' => $content,
		'title' => $title,
		'sidebar' => elgg_view('info_pages/sidebar'),
	));
} else {
	$body = elgg_view_layout('two_sidebar', array(
		'filter' => '',
		'content' => $content,
		'title' => $title,
		'sidebar' => elgg_view('core/account/login_box'),
		'sidebar_alt' => elgg_view('info_pages/sidebar'),
	));
}

echo elgg_view_page($title, $body, 'default', array('entity'=>$page));
