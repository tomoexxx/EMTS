<?php

function BannerMaker_init() 
		{
		global $CONFIG;
		add_menu(elgg_echo('BannerMaker'), $CONFIG->wwwroot . "mod/BannerMaker");
		}
		
	register_elgg_event_handler('init','system','BannerMaker_init');

?>