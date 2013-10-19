<?php

/**
 * 
 * Moderators for Roles plugin
 * 
 *
 * @author Andras Szepeshazi
 * @copyright Arck Interactive, LLC 2012
 * @link http://www.arckinteractive.com/
 */

elgg_register_event_handler('init', 'system', 'roles_moderators_init');

function roles_moderators_init() {

	elgg_register_plugin_hook_handler('roles:config', 'role', 'roles_moderators_config', 700);
}


function roles_moderators_config($hook_name, $entity_type, $return_value, $params) {

	$roles = array(

		'moderator' => array(
			
			'title' => 'roles_moderators:role:title',
			
			'extends' => array(DEFAULT_ROLE),

			'permissions' => array(
				
				'pages' => array(
					'regexp(/^admin\/((?!administer_utilities\/reportedcontent).)*$/)' => array('rule' => 'deny')
				),
				
				'menus' => array(
					/* facebook_theme dashboard menu */
					'page::album-add' => array(
						'rule' => 'extend',
						'menu_item' => array(
							'name' => 'album-add',
							'text' => elgg_echo("photos:add"),
							'href' => 'photos/add/{$self_guid}',
							'section' => 'shop'
						)
					),
					'page::addphotos' => array(
						'rule' => 'extend',
						'menu_item' => array(
							'name' => 'addphotos',
							'text' => elgg_echo("photos:addphotos"),
							//'href' => 'groups/add/{$self_guid}',
							'href' => 'ajax/view/photos/selectalbum/?owner_guid={$self_guid}',
							'class' => 'elgg-lightbox',
							'section' => 'shop'
						)
					),

					'page::news' => array('rule' => 'deny'),
					'page::events' => array('rule' => 'deny'),
					'page::photos' => array('rule' => 'deny'),
					'page::contest' => array('rule' => 'deny'),
					//'page::regexp(/^group-/)' => array('rule' => 'deny'),
					'page::groups-add' => array('rule' => 'deny'),
					'page::groups' => array('rule' => 'deny'),
					'page::friends' => array('rule' => 'deny'),
					'page::files' => array('rule' => 'deny'),
					'page::blog' => array('rule' => 'deny'),
					'page::thewire' => array('rule' => 'deny'),
					'page::gallery' => array(
						'rule' => 'replace',
						'menu_item' => array(
							'name' => 'gallery',
						'text' => elgg_view_icon('photo') . elgg_echo("photos"),

							'href' => '/photos/owner/{$self_username}',
						)
					),
					/* profile menu */
					'owner_block::profile' => array('rule' => 'deny'),
					'owner_block::blog' => array('rule' => 'deny'),
					'owner_block::file' => array('rule' => 'deny'),
					'owner_block::thewire' => array('rule' => 'deny'),
					'owner_block::photos' => array('rule' => 'deny'),
					/* tidypics menu */
					'page::A01_group_contest' => array('rule' => 'deny'),
					'page::A10_tiypics_siteimages' => array('rule' => 'deny'),
					'page::A20_tiypics_albums' => array('rule' => 'deny'),

					/* moderator default */
/*
					'topbar::administration' => array('rule' => 'deny'),
					'site' => array(
						'rule' => 'extend',
						'menu_item' => array(
							'name' => 'reported_content',
							'text' => 'Reported Content',
							'href' => 'admin/administer_utilities/reportedcontent'
						)
					)
*/
				),

				'actions' => array(
					'regexp(/^admin\/((?!user\/ban|user\/unban).)*$/)' => array('rule' => 'deny')
				),

				'views' => array(
					
					'admin/sidebar' => array('rule' => 'deny'),
					
					'roles/settings/account/role' => array(
						'rule' => 'replace',
						'view_replacement' => array(
					 		'location' => 'mod/roles_moderators/views/override/',
	 					),
					),
				)
			)
		)
	);

	if (!is_array($return_value)) {
		return $roles;
	} else {
		return array_merge($return_value, $roles);
	}
}

?>
