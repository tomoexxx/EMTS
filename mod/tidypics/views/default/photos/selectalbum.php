<?php

/**
 * Tidypics plugin
 *
 * Selection of album to upload new images to
 *
 * (c) iionly 2013
 * Contact: iionly@gmx.de
 * Website: https://github.com/iionly
 * License: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 *
 */

$owner_guid = get_input('owner_guid', elgg_get_logged_in_user_guid());
$owner = get_entity($owner_guid);
if (!($owner instanceof ElggUser) && !($owner instanceof ElggGroup)) {
    $owner = elgg_get_logged_in_user_entity();
}

/* Add Tani 2013.12.09 */
$role = roles_get_role();
switch ($role->name) {
	case 'creator':
		$str_create = elgg_echo('roles_creators:items:edittheme');
		$str_description = elgg_echo('roles_creators:album_select');
		break;
	defalut:
		$str_create = elgg_echo('album:create');
		$str_description = elgg_echo('tidypics:album_select');
		break;
}	

$action = "action/photos/image/selectalbum";

$albums = elgg_get_entities(array('type' => 'object', 'subtype' => 'album', 'owner_guid' => NULL, 'container_guid' => $owner->getGUID(), 'limit' => false));

$album_options = array();
/* Modify Tani 2013.12.09 */
$album_options[-1] = $str_create;
if ($albums) {
    foreach ($albums as $album) {
        $album_options[$album->guid] = $album->title;
    }
}

/* Modify Tani 2013.12.09 */
$body = "<div style=\"width:400px;\">".$str_description."<br><br>";
$body .= elgg_view('input/hidden', array('name' => 'owner_guid','value' => $owner->guid));
$body .= elgg_view('input/dropdown', array('name' => 'album_guid',
                                           'value' => '',
                                           'options_values' => $album_options));
$body .= "<br><br>";

$body .= elgg_view('input/submit', array('value' => elgg_echo('tidypics:continue'))).'</div>';

echo elgg_view('input/form', array('action' => $action, 'body' => $body));
