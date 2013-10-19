<?php
	/**
	 * Elgg Custom Static Page plugin
	 *
	 * @package Elgg Custom Static Page
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Alex Falk, RiverVanRain
	 * @URL http://weborganizm.org/crewz/p/1983/personal-net
	 * @copyright (c) weborganiZm 2k13
	 */

echo elgg_echo("newsall") . "<br><br>";

$newsdir = elgg_get_plugins_path() . "customhtml/views/default/news/";
if ($handle = opendir($newsdir)) {
	while (false !== ($newsfile = readdir($handle))) {
		if (strpos($newsfile, "ews")) {
			// get date
			$year = substr($newsfile, 4, 4);
			$month = substr($newsfile, 8, 2);
			$day = substr($newsfile, 10, 2);
			$newsdate = $year . $month . $day;
			$datestr = $year . "/" . $month . "/" . $day;

			// get title
			$body = file_get_contents($newsdir . $newsfile);
			$left_tag = "<title>";
			$right_tag = "</title>";
			$start = strpos($body, $left_tag) + strlen($left_tag);
			$length = strpos($body, $right_tag) - $start;
			$title = substr($body, $start, $length);

			// create href
			echo "<a href=\"/customhtml/news/" . $newsdate . "\"/>" . $datestr  . "\t" . $title . "</a><br>";
		}
	}
}

closedir($newsdir);
