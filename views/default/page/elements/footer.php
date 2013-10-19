<?php
/**
 * Elgg footer
 * The standard HTML footer that displays across the site
 *
 * @package Elgg
 * @subpackage Core
 *
 */

echo elgg_view_menu('footer', array('sort_by' => 'priority', 'class' => 'elgg-menu-hz'));

$powered_url = elgg_get_site_url() . "_graphics/powered_by_elgg_badge_drk_bckgnd.gif";

echo '<div class="mts clearfloat float-alt">';
echo elgg_view('output/url', array(
	/*
	 *'href' => 'http://elgg.org',
	 *'text' => "<img src=\"$powered_url\" alt=\"Powered by Elgg\" width=\"106\" height=\"15\" />",
	 */
	//'href' => 'http://www.join-with.jp/',
	'href' => elgg_get_site_url() . "contact/",
	'text' => "JoinHands 運営事務局",
	'class' => '',
	'is_trusted' => true,
));
echo '</div>';
