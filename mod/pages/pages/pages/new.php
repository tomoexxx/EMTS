<?php
/**
 * Create a new page
 *
 * @package ElggPages
 */

gatekeeper();

$container_guid = (int) get_input('guid');
$container = get_entity($container_guid);
if (!$container) {

}

$parent_guid = 0;
$page_owner = $container;
if (elgg_instanceof($container, 'object')) {
	$parent_guid = $container->getGUID();
	$page_owner = $container->getContainerEntity();
}

elgg_set_page_owner_guid($page_owner->getGUID());

/* Add Tani 2013.12.02 */
$role = roles_get_role();
switch ($role->name) {
	case 'creator':
		$title = elgg_echo('roles_creators:pages:add');
		break;

	default:
		$title = elgg_echo('pages:add');
		break;
}
elgg_push_breadcrumb($title);

$vars = pages_prepare_form_vars(null, $parent_guid);
$content = elgg_view_form('pages/edit', array(), $vars);

$body = elgg_view_layout('content', array(
	'filter' => '',
	'content' => $content,
	'title' => $title,
));

echo elgg_view_page($title, $body);
