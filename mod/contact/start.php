<?php

register_elgg_event_handler('init','system','contact_init');

function contact_init() {
/*
	global $CONFIG;
	add_menu(elgg_echo('Contact Us!'), $CONFIG->wwwroot . "mod/contact");
*/

	elgg_register_page_handler('contact', 'contact_page_handler');

	// Register CSS
	elgg_extend_view('css/elgg', 'contact/css');

	// Register the JavaScript lib
	$js = elgg_get_simplecache_url('js', 'contact/gen_validator');
	elgg_register_simplecache_view('js/contact/gen_validator');
	elgg_register_js('contact:validator', $js);

	// Register actions
	$action_path = elgg_get_plugins_path() . "contact/views/default/forms/contact";
	elgg_register_action('contact/us', "$action_path/us.php");
	elgg_register_action('contact/register', "$action_path/register.php");
	elgg_register_action('contact/job', "$action_path/job.php");
}
		
function contact_page_handler($page) {
	// only logged in users can contact
	gatekeeper();

	if (!isset($page[0])) {
		$page[0] = 'us';
	}
	
	$page_type = $page[0];
	switch ($page_type) {
		case 'us':
			if (isset($page[1])) {
				set_input('contact_kind', $page[1]);
			}
			$title = elgg_echo('contact:us');
			$content = elgg_view_form('contact/us', array(
							'name' => 'contactus',
			));
			break;
		case 'register':
			$title = elgg_echo('contact:register');
			$content = elgg_view_form('contact/register', array(
							'name' => 'register',
			));
			$content = elgg_view_form('contact/register');
			break;		
		case 'job':
			if (isset($page[1])) {
				set_input('jobid', $page[1]);
			}
			$title = elgg_echo('contact:job');
			$content = elgg_view_form('contact/job', array(
							'name' => 'entiryjob',
							'action' => 'contact/job/' . $page[1],
			));
			break;
		default:
			return false;
	}
	
	$params = array(
		'title' => $title,
		'filter_override' => '',
		'content' => $content,
	);
	
	$body = elgg_view_layout('content', $params);
	
	echo elgg_view_page($title, $body);
	
	return true;
}
	
?>
