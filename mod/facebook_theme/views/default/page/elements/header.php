<?php

$site = elgg_get_site_entity();

echo "<h1 id=\"facebook-header-logo\">";
echo elgg_view('output/url', array(
	'href' => '/',
	//'text' => "<img src='/_graphics/joinhands_logo.png' height=90px width=100px>",
	'text' => "<img src='/_graphics/joinhands_s.png' height=95px width=85px>",
));
echo "</h1>";

/*
 * echo elgg_view_form('login', array('id' => 'facebook-header-login'));
 */
