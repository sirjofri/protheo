<!--?php wp_nav_menu(array('theme_location' => 'header-menu')); ?-->
<div class="closemenubutton" id="closemenubutton" onclick="hide_menu();">X</div>
<?php dynamic_sidebar("dash_first_area"); ?>
<?php /*
$menu_name="header-menu"; //Name of Menu
$url=get_bloginfo("url"); // URL of Blog
if(($locations=get_nav_menu_locations())&&isset($locations[$menu_name])){
$menu=wp_get_nav_menu_object($locations[$menu_name]);
$items=wp_get_nav_menu_items($menu);
$counter=1;
echo "<ul id=\"menu header-menu\">\n";
foreach((array) $items as $key => $menu_item) {
	echo "<li id=\"menu-item-".($menu_item->ID)."\" style=\"background:url(".get_bloginfo("url")."/images/menu/".($menu_item->attr_title).".png) no-repeat left top;\"><a href=\"".($menu_item->url)."\">".($menu_item->title)."</a></li>\n"; // Print css line
	$counter++;
} echo "</ul>\n";} else {
	echo "<!--Menu not defined-->"; //Error Fallback
}*/ ?>
