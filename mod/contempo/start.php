<?php

elgg_register_event_handler('init', 'system', 'contempo_init');

function contempo_init() {
    global $CONFIG;
    elgg_register_css('contempo',$CONFIG->url.'mod/contempo/css/contempo.css');
    elgg_load_css('contempo');
    elgg_extend_view('page/elements/header','contempo/header');
    elgg_register_css('lobster','http://fonts.googleapis.com/css?family=Lobster+Two');
    elgg_load_css('lobster');
    elgg_register_css('varela','http://fonts.googleapis.com/css?family=Varela+Round');
    elgg_load_css('varela');
}
?>
