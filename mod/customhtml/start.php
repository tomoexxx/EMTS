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

function customhtml_init() {
	global $CONFIG;
	elgg_register_page_handler('customhtml','customhtml_page_handler');
				
	// Add menu link
	$item = new ElggMenuItem('customhtml', elgg_echo('customhtml'), 'customhtml/', 'alt');
	//elgg_register_menu_item('site', $item);
	//elgg_register_menu_item('topbar', $item);

	// Register CSS
	elgg_extend_view('css/elgg', 'customhtml/css');
}

function customhtml_page_handler($page)
{
	global $CONFIG;
	switch ($page[0])
	{
		case 'news':
			if (isset($page[1])) {
				set_input('newsid', $page[1]);
			}
			include $CONFIG->pluginspath . 'customhtml/news.php';
			break;
		case 'contest':
			if (isset($page[1])) {
				set_input('contestid', $page[1]);
			}
			include $CONFIG->pluginspath . 'customhtml/contest.php';
			break;
		case 'information':
			if (isset($page[1])) {
				set_input('infoid', $page[1]);
			}
			include $CONFIG->pluginspath . 'customhtml/information.php';
			break;
		default:
			include $CONFIG->pluginspath . 'customhtml/index.php';
			break;	
	}
	exit;
}
	
elgg_register_event_handler('init', 'system', 'customhtml_init');
?>
