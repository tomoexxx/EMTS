<?php
/**
 * Show all the albums that belong to a user or group
 *
 * @author Cash Costello
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2
 */

/* Add Tani 2013.07.01 */
if (!elgg_is_logged_in()) {
	register_error(elgg_echo('loggedinrequired'));
	forward('');
}

group_gatekeeper();
$username = get_input('username');

$owner = elgg_get_page_owner_entity();
if (!$owner) {
	$owner = get_user_by_username($username);
}

/* Add Tani 2013.12.11 */
/*
$role = roles_get_role($owner);
if ($role->name == 'creator') {
	forward('/photos/creator/' . $owner->name);
}
*/

$title = elgg_echo('album:user', array($owner->name)) . $role->name;

// set up breadcrumbs
elgg_push_breadcrumb(elgg_echo('photos'), 'photos/siteimagesall');
elgg_push_breadcrumb(elgg_echo('tidypics:albums'), 'photos/all');
elgg_push_breadcrumb($owner->name);

$num_albums = 16;

$content = elgg_list_entities(array(
	'type' => 'object',
	'subtype' => 'album',
	'container_guid' => $owner->getGUID(),
	'limit' => $num_albums,
	'full_view' => false,
	//'list_type' => 'gallery',
	'list_type' => 'list',
	'list_type_toggle' => false,
	'gallery_class' => 'tidypics-gallery',
));
if (!$content) {
	$content = elgg_echo('tidypics:none');
}

elgg_load_js('lightbox');
elgg_load_css('lightbox');
$logged_in_guid = elgg_get_logged_in_user_guid();
/* Delete Tani 2013.06.30 */
/*
elgg_register_menu_item('title', array('name' => 'addphotos',
                                       'href' => "ajax/view/photos/selectalbum/?owner_guid=" . $logged_in_guid,
                                       'text' => elgg_echo("photos:addphotos"),
                                       'class' => 'elgg-lightbox',
                                       'link_class' => 'elgg-button elgg-button-action'));
*/

/* Add Tani 2013.07.19 */
if ($owner->interests && elgg_instanceof($owner, 'group')) {
	// admin
	if (elgg_is_admin_logged_in()) {
		// アルバム作成ボタン
		elgg_register_title_button();
	}

	$actions = array();

	// group members
	if ($owner->isMember(elgg_get_logged_in_user_entity())) {
		if ($owner->getOwnerGUID() != elgg_get_logged_in_user_guid()) {
			// leave
			$url = elgg_get_site_url() . "action/groups/leave?group_guid={$owner->getGUID()}";
			$url = elgg_add_action_tokens_to_url($url);
			$actions[$url] = 'groups:leave';
		}
	} elseif (elgg_is_logged_in()) {
	// join - admins can always join.
		$url = elgg_get_site_url() . "action/groups/join?group_guid={$owner->getGUID()}";
		$url = elgg_add_action_tokens_to_url($url);
		if ($owner->isPublicMembership() || $owner->canEdit()) {
			$actions[$url] = 'groups:join';
		} else {
			// request membership
			$actions[$url] = 'groups:joinrequest';
		}
	}

	if ($actions) {
		foreach ($actions as $url => $text) {
			elgg_register_menu_item('title', array(
				'name' => $text,
				'href' => $url,
				'text' => elgg_echo($text),
				'link_class' => 'elgg-button elgg-button-action',
			));
		}
	}
} else {
	// アルバム作成ボタン
	elgg_register_title_button();
}

$params = array(
	'filter_context' => 'mine',
	'content' => $content,
	'title' => $title,
	'sidebar' => elgg_view('photos/sidebar', array('page' => 'owner')),
);

// don't show filter if out of filter context
if ($owner instanceof ElggGroup) {
	$params['filter'] = false;

}

if ($owner->getGUID() != elgg_get_logged_in_user_guid()) {
	$params['filter_context'] = '';
}

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);
