<?php

$info_id = get_input('infoid');

$content_path = "information/info" . $info_id;
$content = elgg_view($content_path);	
$title = elgg_echo("information");
	
if (elgg_is_logged_in()) {
	$body = elgg_view_layout('content', array(
		'content' => $content,
		'title' => $title,
		'filter' => '',
		//'sidebar' => elgg_view('customhtml/sidebar_news'),
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
