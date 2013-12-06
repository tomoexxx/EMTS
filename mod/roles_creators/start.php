<?php

/**
 * 
 * Creators for Roles plugin
 * 
 *
 * @author Hideyuki Tani
 * @copyright JoinWith All Rights reserved.
 * @link http://www.join-with.jp/
 */

elgg_register_event_handler('init', 'system', 'roles_creators_init');

function roles_creators_init() {

	elgg_register_plugin_hook_handler('roles:config', 'role', 'roles_creators_config', 700);
}


function roles_creators_config($hook_name, $entity_type, $return_value, $params) {

	$roles = array(

		'creator' => array(
			
			'title' => 'roles_creators:role:title',
			
			'extends' => array(DEFAULT_ROLE),

			'permissions' => array(
				
				'pages' => array(
					'regexp(/^admin\/((?!administer_utilities\/reportedcontent).)*$/)' => array('rule' => 'deny')
				),
				
				'menus' => array(
					/* facebook_theme dashboard menu */
/*
					'page::addphotos' => array(
						'rule' => 'extend',
						'menu_item' => array(
							'name' => 'addphotos',
							'text' => elgg_echo("photos:addphotos"),
							//'href' => 'groups/add/{$self_guid}',
							'href' => 'ajax/view/photos/selectalbum/?owner_guid={$self_guid}',
							'class' => 'elgg-lightbox',
							'section' => 'creators'
						)
					),
*/

					'page::news' => array('rule' => 'deny'),
					'page::events' => array('rule' => 'deny'),
					'page::photos' => array('rule' => 'deny'),
					'page::contest' => array('rule' => 'deny'),
					//'page::regexp(/^group-/)' => array('rule' => 'deny'),
					'page::groups-add' => array('rule' => 'deny'),
					'page::groups' => array('rule' => 'deny'),
					'page::friends' => array('rule' => 'deny'),
					'page::files' => array('rule' => 'deny'),
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

				),

				'actions' => array(
					'regexp(/^admin\/((?!user\/ban|user\/unban).)*$/)' => array('rule' => 'deny')
				),

				'views' => array(
					
					'admin/sidebar' => array('rule' => 'deny'),
					
					'roles/settings/account/role' => array(
						'rule' => 'replace',
						'view_replacement' => array(
					 		'location' => 'mod/roles_creators/views/override/',
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
