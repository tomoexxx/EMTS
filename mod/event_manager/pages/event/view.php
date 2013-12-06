<?php 
	
	$guid = get_input("guid");
	
	if(!empty($guid) && ($entity = get_entity($guid))){	
		if($entity->getSubtype() == Event::SUBTYPE) {
			$event = $entity;
		}
	}
	
	if($event){		
                if (elgg_is_logged_in()) {
			elgg_set_page_owner_guid($event->getContainerGUID());
                }
		$page_owner = elgg_get_page_owner_entity();
		if($page_owner instanceof ElggGroup){
			elgg_push_breadcrumb($page_owner->name, "/events/event/list/" . $page_owner->getGUID());
		}
		
		$title_text = $event->title;
		elgg_push_breadcrumb($title_text);
		
		$output = elgg_view_entity($event, array("full_view" => true));
		
		/* Modify Tani 2013.11.29 */
		if (elgg_is_logged_in()) {
			$sidebar = elgg_view("event_manager/event/sidebar", array("entity" => $event));
			$body = elgg_view_layout('content', array(
				'filter' => '',
				'content' => $output,
				'title' => $title_text,
				'sidebar' => $sidebar
			));
		} else {
			$sidebar = elgg_view('core/account/login_box');
			$body = elgg_view_layout('one_sidebar', array(
				'filter' => '',
				'content' => $output,
				'title' => $title_text,
				'sidebar' => $sidebar
			));
		}
		
		echo elgg_view_page($title_text, $body);
		
	} else {
		register_error(elgg_echo("InvalidParameterException:GUIDNotFound", array($guid)));
		forward(REFERER);
	}
