<?php

$contest_id = get_input('contestid');
$entity = get_entity($contest_id);
set_input('contest_name', $entity->title);

require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

$content_path = "contest/" . $contest_id;
$content = elgg_view($content_path);	
$title = elgg_echo("contest_result");
	
if (elgg_is_logged_in()) {
	$body = elgg_view_layout('content', array(
		'content' => $content,
		'title' => $title,
		'filter' => '',
//		'sidebar' => elgg_view('customhtml/sidebar_news'),
	));
	echo elgg_view_page($title, $body);
} else {
	$body = elgg_view_layout('one_sidebar', array(
		'content' => $content,
		'title' => $title,
		'filter' => '',
		'sidebar' => elgg_view('core/account/login_box'),
	));
	echo elgg_view_page($title, $body);
}

?>
