<?php
/**
 * Sidebar view for creators
 * 2013.12.05 Tani
 */

$owner = elgg_get_page_owner_entity();

elgg_register_menu_item('page', array('name' => 'toppage',
				      'text' => elgg_view_icon('list') . elgg_echo('roles_creators:pages:title'),
				      'href' => elgg_get_site_url() . 'pages/owner/' . $owner->name,
));

