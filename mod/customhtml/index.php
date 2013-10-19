<?php

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

$content = elgg_view('html');	
$title = elgg_echo("customhtml");
	
$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => $title,
	'filter' => '',
	'sidebar' => elgg_view('customhtml/sidebar'),
));

echo elgg_view_page($title, $body);
?>