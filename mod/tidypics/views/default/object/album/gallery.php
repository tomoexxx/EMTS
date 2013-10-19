<?php
/**
 * Display an album in a gallery
 *
 * @uses $vars['entity'] TidypicsAlbum
 *
 * @author Cash Costello
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2
 */

$album = elgg_extract('entity', $vars);

/* Add Tani 2013.06.30 */
// Album Title
$title_link = elgg_view('output/url', array(
	'href' => $album->getURL(),
	'text' => $album->getTitle(),
	'is_trusted' => true,
));
// Album Description
$album_comment = elgg_view('output/longtext', array(
	'value' => $album->description,
	'class' => 'elgg-output mbm',
));
// Album Volume
$album_volume = elgg_echo('album:num', array($album->getSize()));
// Setting Album Variables
$params = array(
	'entity' => $album,
	'title' => $title_link,
	'subtitle' => $album_volume,
);
// Formatting Album Variables
//$params = $params + $vars;
$summary = elgg_view('object/elements/summary', $params);
// Setting icom image
$icon = "<img src=\"" . elgg_get_site_url() . "_graphics/album.png\">";

// Display Album List
echo elgg_view('object/elements/full', array(
	'summary' => $summary,
	'icon' => $icon,
	'body' => $album_comment,
));

/* Delete Tani 2013.06.30 */
/*
$album_cover = elgg_view_entity_icon($album, 'small');

$header = elgg_view('output/url', array(
	'text' => $album->getTitle(),
	'href' => $album->getURL(),
	'is_trusted' => true,
	'class' => 'tidypics-heading',
));

$footer = elgg_view('output/url', array(
	'text' => $album->getContainerEntity()->name,
	'href' => $album->getContainerEntity()->getURL(),
	'is_trusted' => true,
));
$footer .= '<div class="elgg-subtext">' . elgg_echo('album:num', array($album->getSize())) . '</div>';

$params = array(
	'footer' => $footer,
);
echo elgg_view_module('tidypics-album', $header, $album_cover, $params);
*/
