<?php
/**
 * View all themes on the creator
 *
 * @author Hideyuki Tani 
 */
if (!elgg_is_logged_in()) {
	forward('');
}

$role = roles_get_role();
if ($role->name != "creator") {
	register_error(elgg_echo('roles_creators:notuse'));
	forward('');
}

$username = get_input('username');
$owner_guid = elgg_get_logged_in_user_guid();

//elgg_push_breadcrumb(elgg_echo('photos'), 'photos/contestsall');
elgg_push_breadcrumb(elgg_echo('roles_creators:items:themelist'));

$num_albums = 16;

$theme = elgg_list_entities(array(
	'type' => 'object',
	'subtype' => 'album',
	'limit' => $num_albums,
	'container_guid' => $owner_guid,
	'full_view' => false,
	'list_type' => 'list',
	'list_type_toggle' => false,
	'gallery_class' => 'tidypics-gallery',
));

if (!$theme) {
	$theme = elgg_echo('roles_creators:notheme');
}

$title = elgg_echo('roles_creators:items:themelist');
elgg_load_js('lightbox');
elgg_load_css('lightbox');
elgg_register_menu_item('title', array('name' => 'addtheme',
                                       'href' => "/photos/add/" . $owner_guid,
                                       'text' => elgg_echo("roles_creators:items:edittheme"),
                                       'link_class' => 'elgg-button elgg-button-action'));
elgg_register_menu_item('title', array('name' => 'addphotos',
                                       'href' => "ajax/view/photos/selectalbum/?owner_guid=" . $owner_guid,
                                       'text' => elgg_echo("roles_creators:items:regitems"),
                                       'class' => 'elgg-lightbox',
                                       'link_class' => 'elgg-button elgg-button-action'));

/* Modify Tani 2013.07.01 */
$body = elgg_view_layout('content', array(
	'filter_override' => '', 
	'content' => $theme,
	'title' => $title,
));
echo elgg_view_page($title, $body);
