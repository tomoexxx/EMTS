<?php
/**
 * Basic uploader form
 *
 * This only handled uploading the images. Editing the titles and descriptions
 * are handled with the edit forms.
 *
 * @uses $vars['entity']
 *
 * @author Cash Costello
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2
 */

$album = $vars['entity'];

$maxfilesize = (float) elgg_get_plugin_setting('maxfilesize', 'tidypics');

$instructions = elgg_echo("tidypics:uploader:upload");
/* Add Tani 2013.12.09 */
$role = roles_get_role();
switch ($role->name) {
	case 'creator':
		$max = elgg_echo('roles_creators:uploader:basic', array($maxfilesize));
		break;
	default:
		$max = elgg_echo('tidypics:uploader:basic', array($maxfilesize));
		break;
}

$list = '';
for ($x = 0; $x < 10; $x++) {
	$list .= '<li>' . elgg_view('input/file', array('name' => 'images[]')) . '</li>';
}

$foot = elgg_view('input/hidden', array('name' => 'guid', 'value' => $album->getGUID()));
switch ($role->name) {
	case 'creator':
		$foot .= elgg_view('input/submit', array('value' => elgg_echo("roles_creators:items:regitems")));
		break;
	default:
		$foot .= elgg_view('input/submit', array('value' => elgg_echo("photos:addphotos")));
		break;
}

$form_body = <<<HTML
<div>
	$max
</div>
<div>
	<ol>
		$list
	</ol>
</div>
<div class='elgg-foot'>
	$foot
</div>
HTML;

echo elgg_view('input/form', array(
	'body' => $form_body,
	'action' => 'action/photos/image/upload',
	'enctype' => 'multipart/form-data',
));
