<?php

$site_url = elgg_get_site_url();

$menu_title = array(
    "event" => array("イベント情報", false, false),
    "contest" => array("コンテスト情報", false, false),
    "biz" => array("ワーク・求人情報", false, false),
    "shop" => array("ショップ情報", false, false),
    "news" => array("ニュース", false, false),
    "album" => array("イベント写真集", false, false),
    "tips" => array("各種情報", false, false),
);

$dom = new domDocument;
$dom->load($site_url . 'views/default/statichtml/menu_items.xml');
$xmlstring = simplexml_import_dom($dom);

$menu_data = array();
foreach ($xmlstring->item as $item) {
    if (time() > strtotime($item->s_date) && time() < strtotime($item->e_date)) {
        // set menu title display flag
        $menu_title["$item->kind"][1] = true;

        // img file setting
        $img_file = "";    // initialize
        if (strtotime($item->s_date) > strtotime("-2 week")) {
            // set menu title img flag
            $menu_title["$item->kind"][2] = true;
            // set img
            $img_file = "<img src=\"/_graphics/whatsnew/" . $item->banner . ".gif\">";
        }
	// public flg setting
	$pub_flg = false;
	if ($item->public == "true") {
	    $pub_flg = true;
	}
        // set menu data
        $menu_data[] = array(
                         "kind" => $item->kind,
                         "title" => $item->title,
                         "url" => $item->url,
                         "img" => $img_file,
                         "public" => $pub_flg,
                       );
    }
}
?>

<script>
$(function(){
    $(".tree_menu").click(function(){
        // get clicked menu 
        menu_id = $(this).attr("id");

        if($("#" + menu_id + "_list").css("display") == "none"){
//            $(".menu_list").hide();
            $("#" + menu_id + "_list").toggle("fast");
	}else{
            $("#" + menu_id + "_list").toggle("fast");
        }
    });
});
</script>

<hr /><span><h3>新着情報</h3></span><hr />
<?php
foreach ($menu_title as $menu_name => $menu_info) {
    if ($menu_info[1]) {
        if ($menu_info[2]) {
            echo "<div class=\"tree_menu\" id=\"" . $menu_name . "\"><img src=\"/_graphics/title_new2.gif\"><b>" . $menu_info[0] . "</b></div>";
        } else {
            echo "<div class=\"tree_menu\" id=\"" . $menu_name . "\"><img src=\"/_graphics/title_normal.png\"><b>" . $menu_info[0] . "</b></div>";
        }

        echo "<div class=\"menu_list\" id=\"" . $menu_name . "_list\">";
	echo "<table border=0>";
	foreach ($menu_data as $item) {
            if ($item['kind'] == $menu_name) {
            // setting url tag
            if ($item['public'] || elgg_is_logged_in()) {
            //if ($item['public']) {
                $url_tag = $item['url'];
            } else {
                $url_tag = "/register";
            }

		echo "<tr>";
		echo "<td><a href=\"" . $url_tag . "\">" . $item['img'] . "</a></td>";
		echo "<td><a href=\"" . $url_tag . "\">" . $item['title'] . "</a></td>";
		echo "</tr>";
            }
	}
	echo "</table>";
        echo "</div>";
    }
}
?>
