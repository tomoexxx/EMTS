<?php
/**
 * Blog sidebar
 *
 * @package Blog
 */
$username = get_input('username');

$owner = elgg_get_page_owner_entity();
if (!$owner) {
	$owner = get_user_by_username($username);
}

// fetch & display latest comments
if ($vars['page'] == 'all') {
	echo elgg_view('page/elements/comments_block', array(
		'subtypes' => 'blog',
	));
} elseif ($vars['page'] == 'owner') {
	echo elgg_view('page/elements/comments_block', array(
		'subtypes' => 'blog',
		//'owner_guid' => elgg_get_page_owner_guid(),
		'owner_guid' => $owner->guid,
	));
}

// only users can have archives at present
if ($vars['page'] == 'owner' || $vars['page'] == 'group') {
	echo elgg_view('blog/sidebar/archives', $vars);
}

/* Delete Tani 2013.12.09 */
/*
if ($vars['page'] != 'friends') {
	echo elgg_view('page/elements/tagcloud_block', array(
		'subtypes' => 'blog',
		//'owner_guid' => elgg_get_page_owner_guid(),
		'owner_guid' => $owner->guid,
	));
}
*/
