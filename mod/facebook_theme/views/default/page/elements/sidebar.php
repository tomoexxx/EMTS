<?php
/**
 * Elgg sidebar contents
 *
 * @uses $vars['sidebar'] Optional content that is displayed at the bottom of sidebar
 */

/* Modify Tani 2013.12.06 */
$role = roles_get_role();
if ($role->name != "creator") {
	echo elgg_view('page/elements/owner_block', $vars);
}

echo elgg_view_menu('page', array('sort_by' => 'priority'));

// optional 'sidebar' parameter
if (isset($vars['sidebar'])) {
	echo $vars['sidebar'];
}

// @todo deprecated so remove in Elgg 2.0
// optional second parameter of elgg_view_layout
if (isset($vars['area2'])) {
	echo $vars['area2'];
}

// @todo deprecated so remove in Elgg 2.0
// optional third parameter of elgg_view_layout
if (isset($vars['area3'])) {
	echo $vars['area3'];
}

echo elgg_view_menu('extras', array(
	'sort_by' => 'priority',
));
