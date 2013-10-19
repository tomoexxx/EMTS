<?php
/**
 * View all albums on the site
 *
 * @author Cash Costello
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2
 */

elgg_push_breadcrumb(elgg_echo('photos'), 'photos/siteimagesall');
elgg_push_breadcrumb(elgg_echo('tidypics:albums'));

$num_albums = 16;

// get metastrings id
$db_prefix = elgg_get_config('dbprefix');
$metastring = get_data_row("SELECT id FROM {$db_prefix}metastrings WHERE string = 'tags'");

$offset = (int)get_input('offset', 0);
$content = elgg_list_entities(array(
	'type' => 'object',
	'subtype' => 'album',
	'limit' => $num_albums,
	'full_view' => false,
	/* Modify Tani 2013.06.30 */
	//'list_type' => 'gallery',
	'list_type' => 'list',
	'list_type_toggle' => false,
	'gallery_class' => 'tidypics-gallery',
	/* Add Tani 2013.07.17 */
	'joins' => 'LEFT OUTER JOIN elgg_metadata ON (e.guid = elgg_metadata.entity_guid and elgg_metadata.name_id = ' . $metastring->id . ')',
	'wheres' => 'elgg_metadata.entity_guid IS NULL',
));
if (!$content) {
	$content = elgg_echo('tidypics:none');
}

$title = elgg_echo('album:all');

elgg_load_js('lightbox');
elgg_load_css('lightbox');
$owner_guid = elgg_get_logged_in_user_guid();

/* 写真登録ボタン：アルバム一覧時は非表示 */
/*
elgg_register_menu_item('title', array('name' => 'addphotos',
                                       'href' => "ajax/view/photos/selectalbum/?owner_guid=" . $owner_guid,
                                       'text' => elgg_echo("photos:addphotos"),
                                       'class' => 'elgg-lightbox',
                                       'link_class' => 'elgg-button elgg-button-action'));
*/
/* アルバム作成ボタン：アルバム一覧時は非表示 */
/*
elgg_register_title_button('photos');
*/

/* Modify Tani 2013.07.01 */
if (elgg_is_logged_in()) {
	$body = elgg_view_layout('content', array(
		'filter_context' => 'all',
		'content' => $content,
		'title' => $title,
		'sidebar' => elgg_view('photos/sidebar', array('page' => 'all')),
	));
} else {
	$body = elgg_view_layout('one_sidebar', array(
		//'filter_context' => 'all',
		'content' => "<h1>" . $title . "</h1>" . $content,
		//'title' => $title,
		'sidebar' => elgg_view('core/account/login_box'),
	));
}
echo elgg_view_page($title, $body);
