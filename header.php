<!DOCTYPE html>
<html lang="de">

<head>
<?php
global $pt_use_just_variables;
global $pt_var;
?>
<title><?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>" type="text/css">
<link rel="pingback" href="<?php bloginfo("pingback_url"); ?>">
<script type="text/javascript" src="<?php bloginfo("template_directory"); ?>/script.js"></script>
<style type="text/css">
/* dynamisch durch php erstellen. auch just_variable nutzen. */
<?php
$menu_name="header-menu"; //Name of Menu
$url=get_bloginfo("url"); // URL of Blog
if(($locations=get_nav_menu_locations())&&isset($locations[$menu_name])){
$menu=wp_get_nav_menu_object($locations[$menu_name]);
$items=wp_get_nav_menu_items($menu);
$counter=1;
foreach((array) $items as $key => $menu_item) {
	echo "#menu-item-".($menu_item->ID)." { background:url(".$url."/".($pt_use_just_variables?just_variable("img".$counter."-1",FALSE):$pt_var['img'.$counter.'-1']).") no-repeat left top,url(".$url."/".($pt_use_just_variables?just_variable("img".$counter."-2",FALSE):$pt_var['img'.$counter.'-2']).") no-repeat left top; }\n"; // Print css line
	$counter++;
}} else {
	echo "/*Menu not defined*/"; //Error Fallback
} ?>
</style>
<?php wp_head(); ?>
</head>
<body class="custom-background">

<div class="wrap wrapper">
<header class="box header">
<h1><a href="<?php bloginfo("url"); ?>"><?php bloginfo("name"); ?></a></h1>
<h3><?php bloginfo("description"); ?></h3>
</header>
