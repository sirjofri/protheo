<!DOCTYPE html>
<html lang="de">

<head>
<title><?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>" type="text/css">
<link rel="pingback" href="<?php bloginfo("pingback_url"); ?>">
<script type="text/javascript" src="<?php bloginfo("template_directory"); ?>/script.js"></script>
<style type="text/css">
<?php 
/* dynamisch durch php erstellen. auch just_variable nutzen. */
$menu_name="header-menu"; //Name of Menu
$url=get_bloginfo("url"); // URL of Blog
if(($locations=get_nav_menu_locations())&&isset($locations[$menu_name])){
$menu=wp_get_nav_menu_object($locations[$menu_name]);
$items=wp_get_nav_menu_items($menu);
$counter=1;
foreach((array) $items as $key => $menu_item) {
	echo "#menu-item-".($menu_item->ID)." { background:url(".$url."/images/menu/".($menu_item->attr_title).".png) repeat left top; }\n"; // Print css line
	echo "#menu-item-".($menu_item->ID).":hover { background: url(".$url."/images/menu/".($menu_item->attr_title)."_hover.png) no-repeat left top; }\n";
	$counter++;
}} else {
	echo "\/*Menu not defined*\/"; //Error Fallback
}

echo ".menubutton { background:url(".get_bloginfo("url")."/images/menu/".pt_get_variable("menuButtonImage").") no-repeat left top; }\n";
echo ".box.header { background:url(";
header_image();
echo ") no-repeat left top;border-top-left-radius:15px;border-top-right-radius:15px; }\n";
?>
</style>
<?php wp_head(); ?>
</head>
<body class="custom-background" onload="setup();">

<div class="wrap wrapper">
<header class="box header">
<h1><a href="<?php bloginfo("url"); ?>"><?php bloginfo("name"); ?></a></h1>
<h3><?php bloginfo("description"); ?></h3>
</header>
