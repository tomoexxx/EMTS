<?php
/**
 * List a user's or group's pages
 *
 * @package ElggPages
 */
$owner = elgg_get_page_owner_entity();
if (!$owner) {
	forward('pages/all');
}

// access check for closed groups
group_gatekeeper();

$role = roles_get_role();
switch ($role->name) {
	case "creator":
		$title = elgg_echo('roles_creators:pages:title');

		$content = elgg_list_entities(array(
			'type' => 'object',
			'subtype' => 'page_top',
			'container_guid' => elgg_get_page_owner_guid(),
			'full_view' => true,
			)
		);

		if (!$content) {
			elgg_register_menu_item('title', array('name' => 'pageadd',
					       'href' => '/pages/add/' . elgg_get_logged_in_user_guid(),
					       'text' => elgg_echo('roles_creators:pages:add'),
					       'link_class' => 'elgg-button elgg-button-action')
			);

			$content = '<p>' . elgg_echo('roles_creators:nopage') . '</p>';
		}

/*
elgg_register_menu_item('page', array('name' => 'toppage',
'text' => elgg_echo('roles_creators:pages:title'),
'href' => elgg_get_site_url() . 'pages/owner/' . $owner->name,
));
*/
		$params = array(
			'filter' => '',
			'content' => $content,
			'title' => $title,
		);

		$body = elgg_view_layout('content', $params);
		break;

	default:
		$title = elgg_echo('pages:owner', array($owner->name));

		elgg_push_breadcrumb($owner->name);

		elgg_register_title_button();

		$content = elgg_list_entities(array(
			'type' => 'object',
			'subtype' => 'page_top',
			'container_guid' => elgg_get_page_owner_guid(),
			'full_view' => false,
		));
		if (!$content) {
			$content = '<p>' . elgg_echo('pages:none') . '</p>';
		}

		$filter_context = '';
		if (elgg_get_page_owner_guid() == elgg_get_logged_in_user_guid()) {
			$filter_context = 'mine';
		}

		$sidebar = elgg_view('pages/sidebar/navigation');
		$sidebar .= elgg_view('pages/sidebar');

		$params = array(
			'filter_context' => $filter_context,
			'content' => $content,
			'title' => $title,
			'sidebar' => $sidebar,
		);

		if (elgg_instanceof($owner, 'group')) {
			$params['filter'] = '';
		}

		$body = elgg_view_layout('content', $params);
		break;
}

echo elgg_view_page($title, $body);
