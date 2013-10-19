<?php

$news_id = get_input('newsid');

	/**
	 * Elgg Custom Static Page plugin
	 *
	 * @package Elgg Custom Static Page
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Alex Falk, RiverVanRain
	 * @URL http://weborganizm.org/crewz/p/1983/personal-net
	 * @copyright (c) weborganiZm 2k13
	 */

require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

$content_path = "news/news" . $news_id;
$content = elgg_view($content_path);	
$title = elgg_echo("news");
	
if (elgg_is_logged_in()) {
	$body = elgg_view_layout('content', array(
		'content' => $content,
		'title' => $title,
		'filter' => '',
		'sidebar' => elgg_view('customhtml/sidebar_news'),
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
