<?php
/**
 * Elgg index page for web-based applications
 *
 * @package Elgg
 * @subpackage Core
 */

/**
 * Start the Elgg engine
 */
require_once(dirname(__FILE__) . "/engine/start.php");

elgg_set_context('main');

// allow plugins to override the front page (return true to stop this front page code)
if (elgg_trigger_plugin_hook('index', 'system', null, FALSE) != FALSE) {
	exit;
}

if (elgg_is_logged_in()) {
	forward('activity');
}

/* Modify Tani */
// one event
//$content = elgg_view('statichtml/event_banner');
// slideshow
//$content = elgg_view('statichtml/top_banner');
$content .= elgg_view('statichtml/joinhands');
/*
$content .= elgg_view_title(elgg_echo('content:latest'));
$content .= elgg_list_river();
*/
//$content .= elgg_view_title(elgg_echo('news'));
//$content .= elgg_view('customhtml/news20130817);
$login_box = elgg_view('core/account/login_box');
$side_content = elgg_view('statichtml/whats_new2');
$side_content .= elgg_view('statichtml/info_pages');
$side_content .= elgg_view('statichtml/facebook_page');
$side_content .= elgg_view('statichtml/freelink');
$side_content .= elgg_view('statichtml/w_city_twitter');

$params = array(
		'content' => $content,
		'sidebar' => $login_box,
		'sidebar_alt' => $side_content
);
/* Modify Tani 2013.06.22 */
//$body = elgg_view_layout('one_sidebar', $params);
$body = elgg_view_layout('two_sidebar', $params);
echo elgg_view_page(null, $body);

/* debug */
/*
echo "<pre>";
print_r($CURRENT_SYSTEM_VIEWTYPE);
echo "</pre>";
*/
