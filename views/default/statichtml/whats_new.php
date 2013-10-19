<?php

$site_url = elgg_get_site_url();

echo "<hr /><span><h3>最新情報</h3></span><hr />";
echo  "<table border=0 width=200 align=bottom>";
echo  "    <tr>";
echo  "        <th><img src=\"_graphics/new.gif\"></th>";
echo  "        <th>";
if (elgg_is_logged_in()) {
	echo  "          <a href=\"" . $site_url . "events/event/view/359/\">";
} else {
	echo  "          <a href=\"" . $site_url . "register\">";
}
echo  "            <span style=\"font-size: small;\">";
echo  "在宅ワーク事前告知";
echo  "            </span>";
echo  "          </a>";
echo  "        </th>";
echo  "    </tr>";
echo  "    <tr>";
echo  "        <th><img src=\"_graphics/new.gif\"></th>";
echo  "        <th>";
echo  "          <a href=\"" . $site_url . "customhtml/news/20130817/\">";
echo  "            <span style=\"font-size: small;\">";
echo  "「ニュース和歌山」掲載";
echo  "            </span>";
echo  "          </a>";
echo  "        </th>";
echo  "    </tr>";
echo  "    <tr>";
echo  "        <th><img src=\"_graphics/new.gif\"></th>";
echo  "        <th>";
echo  "          <a href=\"" . $site_url . "photos/album/177/\">";
echo  "            <span style=\"font-size: small;\">";
echo  "「夏の思い出」写真コンテスト";
echo  "            </span>";
echo  "          </a>";
echo  "        </th>";
echo  "    </tr>";
echo  "    <tr>";
echo  "        <th><img src=\"_graphics/new.gif\"></th>";
echo  "        <th>";
echo  "          <a href=\"" . $site_url . "photos/album/99/\">";
echo  "            <span style=\"font-size: small;\">";
echo get_entity('99')->title;
echo  "            </span>";
echo  "          </a>";
echo  "        </th>";
echo  "    </tr>";
echo  "    <tr>";
echo  "        <th><img src=\"_graphics/new.gif\"></th>";
echo  "        <th>";
if (elgg_is_logged_in()) {
	echo  "          <a href=\"" . $site_url . "events/event/view/83/\">";
} else {
	echo  "          <a href=\"" . $site_url . "register\">";
}
echo  "            <span style=\"font-size: small;\">";
echo get_entity('83')->title;
echo  "            </span>";
echo  "          </a>";
echo  "        </th>";
echo  "    </tr>";
echo  "    <tr>";
echo  "        <th><img src=\"_graphics/new.gif\"></th>";
echo  "        <th>";
echo  "            <span style=\"font-size: small;\">";
echo  "              イベント2";
echo  "            </span>";
echo  "        </th>";
echo  "    </tr>";
echo  "</table><br>";

echo "<a href=\"" . $site_url . "contact/\">";
echo "問い合わせ";
echo "</a>";
