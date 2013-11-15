<?php
/**
 * List all pages
 *
 * @package ElggPages
 */

$title = elgg_echo('info_pages');

elgg_pop_breadcrumb();
elgg_push_breadcrumb(elgg_echo('info_pages'));

if(elgg_is_admin_logged_in()){
// Add page button
elgg_register_title_button();
}

// top of info_pages contents
//$content .= elgg_view('info_pages/index');

//if(elgg_is_admin_logged_in()){
//$content .= elgg_view_title(elgg_echo('info_pages:more'));
$content .= elgg_list_entities_from_metadata(array(
	'types' => 'object',
	'subtypes' => 'info_page',
	'full_view' => false,
	'order_by_metadata' =>	array('name' => 'orderno', 'direction' => ASC, 'as' => integer)
));
if (!$content) {
	$content .= '<p>' . elgg_echo('info_pages:none') . '</p>';
}
//}


//$body = elgg_view_layout('content', array(
if (elgg_is_logged_in()) {
$body = elgg_view_layout('two_sidebar', array(
	'filter' => '',
	'content' => $content,
	'title' => $title,
	'sidebar_alt' => elgg_view('info_pages/sidebar'),
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

echo elgg_view_page($title, $body);
