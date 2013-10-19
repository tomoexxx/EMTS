<?php
/* Add Tani 2013.07.01 */
if (!elgg_is_logged_in()) {
        register_error(elgg_echo('loggedinrequired'));
        forward('');
}

$user = elgg_get_page_owner_entity();

$body = elgg_view_layout('two_sidebar', array(
	'title' => $user->name,
	'content' => elgg_view('profile/details'),
));

echo elgg_view_page($title, $body);
