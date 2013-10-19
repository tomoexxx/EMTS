<?php
$site_url = elgg_get_site_url();

//JQuery
echo "<script>";
echo "$(function(){";
echo "$('.slides div:gt(0)').hide();";
echo "setInterval(function(){";
echo "$('.slides :first').fadeOut('7000').next('div').fadeIn('7000').end().appendTo('.slides');";
echo "}, 10000);";
echo "});";
echo "</script>";


echo "<div class=\"slides\">";
echo "  <div>";
echo "    <a class=\"registration_link\" href=\"" . $site_url . "register\">";
echo "      <img src=\"/_graphics/topbanner_20130705.png\">";
echo "    </a>";
echo "  </div>";
echo "  <div>";
echo "    <a class=\"registration_link\" href=\"" . $site_url . "register\">";
echo "      <img src=\"/_graphics/topbanner_20130720.png\">";
echo "    </a>";
echo "  </div>";
echo "</div>";
echo "<hr />";
