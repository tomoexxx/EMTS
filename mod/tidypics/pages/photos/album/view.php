<?php
/**
 * This displays the photos that belong to an album
 *
 * @author Cash Costello
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2
 */

group_gatekeeper();

// get the album entity
$album_guid = (int) get_input('guid');
$album = get_entity($album_guid);
if (!$album) {
	register_error(elgg_echo('noaccess'));
	$_SESSION['last_forward_from'] = current_page_url();
	forward('');
}

//elgg_set_page_owner_guid($album->getContainerGUID());
//$owner = elgg_get_page_owner_entity();
$owner = get_entity($album->getContainerGUID());

$title = elgg_echo($album->getTitle());

/* Add Tani 2013.12.08 */
$role = roles_get_role();
switch ($role->name) {
	case 'creator':
		// set up breadcrumbs
		elgg_push_breadcrumb(elgg_echo('roles_creators:items:themelist'), 'photos/creator/');
		elgg_push_breadcrumb($album->getTitle());
		break;
	
	default:
		// set up breadcrumbs
		elgg_push_breadcrumb(elgg_echo('photos'), 'photos/siteimagesall');
		elgg_push_breadcrumb(elgg_echo('tidypics:albums'), 'photos/all');
		if (elgg_instanceof($owner, 'group')) {
			elgg_push_breadcrumb($owner->name, "photos/group/$owner->guid/all");
		} else {
			elgg_push_breadcrumb($owner->name, "photos/owner/$owner->username");
		}
		elgg_push_breadcrumb($album->getTitle());
		break;
}

/* Modify Tani 2013.07.20 */
// normal album
if (!$album->tags) {
	$content = elgg_view_entity($album, array('full_view' => true));
// contest album
} else {
	//$content = elgg_view_entity($album, array('full_view' => false));
	$content = elgg_view_entity($album, array('full_view' => true));
	/*
	$content .= elgg_list_entities(array('type' => 'object',
					'subtype' => 'image',
					'container_guid' => $album_guid,
					'limit' => 15,
					'full_view' => false,
					'list_type' => 'gallery',
					'gallery_class' => 'tidypics-gallery',
					'order_by' => 'rand()',
	));
	*/
}

elgg_load_js('lightbox');
elgg_load_css('lightbox');
if (elgg_instanceof($owner, 'group')) {
        $logged_in_guid = $owner->guid;
} else {
        $logged_in_guid = elgg_get_logged_in_user_guid();
}
/* Delete Tani 2013.06.30 */
/*
elgg_register_menu_item('title', array('name' => 'addphotos',
                                       'href' => "ajax/view/photos/selectalbum/?owner_guid=" . $logged_in_guid,
                                       'text' => elgg_echo("photos:addphotos"),
                                       'class' => 'elgg-lightbox',
                                       'link_class' => 'elgg-button elgg-button-action'));
*/

/* Modify Tan 2013.07.22 */
// コンテスト終了アルバムはボタンなし
if (!strpos($album->tags, 'finish')) {
	if ($album->getContainerEntity()->canWriteToContainer()) {
		elgg_register_menu_item('title', array(
				'name' => 'upload',
				'href' => 'photos/upload/' . $album->getGUID(),
				'text' => elgg_echo('images:upload'),
				'link_class' => 'elgg-button elgg-button-action',
		));
	/* Modify Tani 2013.12.11 */
	} elseif ($album->tags == 'contest') {
		$url = elgg_get_site_url() . "action/groups/join?group_guid=" . $owner->guid;
		$url = elgg_add_action_tokens_to_url($url);
		if ($owner->isPublicMembership() || $owner->canEdit()) {
				$text = 'groups:join';
				} else {
				$text = 'groups:joinrequest';
		}
		elgg_register_menu_item('title', array(
				'name' => $text,
				'href' => $url,
				'text' => elgg_echo($text),
				'link_class' => 'elgg-button elgg-button-action',
		));
	}

	// only show sort button if there are images
	if ($album->canEdit() && $album->getSize() > 0) {
		elgg_register_menu_item('title', array(
			'name' => 'sort',
			'href' => "photos/sort/" . $album->getGUID(),
			'text' => elgg_echo('album:sort'),
			'link_class' => 'elgg-button elgg-button-action',
			'priority' => 200,
		));
	}
}

/* Modify sidebar contents 2013.07.01 */
switch ($role->name) {
	case 'creator':
		//$sidebar = elgg_view('photos/sidebar', array('page' => 'album'));
		$body = elgg_view_layout('content', array(
			'filter' => false,
			'content' => $content,
			'title' => $album->getTitle(),
			'sidebar' => $sidebar,
		));
		break;
	
	case 'visitor':
		$sidebar = elgg_view('core/account/login_box');
		$body = elgg_view_layout('one_sidebar', array(
			'content' => "<h1>" . $title . "</h1>" . $content,
			'sidebar' => $sidebar,
		));
		break;
		
	default:
		$sidebar = elgg_view('photos/sidebar', array('page' => 'album'));
		$body = elgg_view_layout('content', array(
			'filter' => false,
			'content' => $content,
			'title' => $album->getTitle(),
			'sidebar' => $sidebar,
		));
		break;
}

echo elgg_view_page($title, $body);
