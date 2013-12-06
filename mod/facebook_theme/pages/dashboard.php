<?php
gatekeeper();

$user = elgg_get_logged_in_user_entity();

elgg_set_page_owner_guid($user->guid);

/* Modify Tani 2013.07.27 */
$db_prefix = elgg_get_config('dbprefix');

$role = roles_get_role();
switch ($role->name) {
	case 'creator':
/*
		$num_albums = 2;
		$title = elgg_echo('album:all');
		$composer = elgg_list_entities(array(
			'type' => 'object',
			'subtype' => 'album',
			'limit' => $num_albums,
			'container_guid' => $user->guid,
			'full_view' => false,
			'list_type' => 'list',
			'list_type_toggle' => false,
			'gallery_class' => 'tidypics-gallery',
		));
		$composer .= elgg_echo('<hr />');
*/
		$title = elgg_echo('roles_creators:timeline');
		$activity = elgg_list_river(array(
			'joins' => array("JOIN {$db_prefix}entities object ON object.guid = rv.object_guid"),
			'wheres' => array("
				rv.subject_guid = $user->guid
			"),
		));
		break;

	default:
		$title = elgg_echo('newsfeed');
		$composer = elgg_view('page/elements/composer', array('entity' => $user));

		$activity = elgg_list_river(array(
			'joins' => array("JOIN {$db_prefix}entities object ON object.guid = rv.object_guid"),
			'wheres' => array("
				rv.subject_guid = $user->guid
				OR rv.subject_guid IN (SELECT guid_two FROM {$db_prefix}entity_relationships WHERE guid_one=$user->guid AND relationship='follower')
				OR rv.subject_guid IN (SELECT guid_one FROM {$db_prefix}entity_relationships WHERE guid_two=$user->guid AND relationship='friend')
			"),
		));
		break;
}

/* Modify Tani 2013.06.24 */
//$side_content = elgg_view('statichtml/whats_new');
$side_content = elgg_view('statichtml/whats_new2');
$side_content .= elgg_view('statichtml/info_pages');
$side_content .= elgg_view('statichtml/facebook_page');
$side_content .= elgg_view('statichtml/freelink');
$side_content .= elgg_view('statichtml/w_city_twitter');

// test for roles pulugin
$role = roles_get_role();
//$content = 'role: ' . $role->name;

elgg_set_page_owner_guid(1);
$content .= elgg_view_layout('two_sidebar', array(
	'filter_override' => '',
	'title' => $title,
	'content' => $banner_img . $composer . $activity,
	'sidebar_alt' => $side_content,
));

echo elgg_view_page($title, $content);


