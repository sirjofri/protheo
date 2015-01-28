<?php
/*************************************
General Template functions
*************************************/

function pt_get_text($id)
{
	global $use_just_variables;

	if($use_just_variables)
	{
		return just_variable($id);
	} else {
		return $pt_var[$id];
	}
	//return $id;
}

// Run Setup function
function protheo_setup() {

}

function custom_theme_setup() {

add_theme_support("html5", array("search-form","comment-form","comment-list","gallery","caption"));
add_theme_support("custom-background");
$custom_header_args=array(
"width" => 1000,
"height" => 133,
"uploads" => true,
);
add_theme_support("custom-header",$custom_header_args);

// Register main menu
function register_my_menu() {
	register_nav_menu('header-menu',__( "Hauptmenu" ));
}
add_action( 'init', 'register_my_menu' );

}
add_action( "after_setup_theme", "custom_theme_setup");

function arphabet_widgets_init() {
	register_sidebar(array(
		'name' => 'Dashbar',
		'id' => 'dash_first_area',
		'description' => 'Widgets erscheinen im Menü',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div><hr class="widgetrow">',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init','arphabet_widgets_init');

function pt_get_menu_text() {
	if(!current_user_can("edit_theme_options")) {
wp_die( __("You do not have sufficient permissions to access this page.") );
} else {
global $wpdb;
//$wpdb->query("CREATE TABLE IF NOT EXISTS protheotv ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30), content VARCHAR(255);");
$table_name=$wpdb->prefix."protheotv";

$pt_variables=array(
"copyright",
"created_in",
"menuButton",
"menuButtonImage",
"searchHeader",
"searchResultsHeader",
"nothingFound",
"commentHead",
"commentAuthor",
"commentEmail",
"commentUrl",
"commentComment",
"commentSubmit",
"commentToggleBox",
"commentApproveWarning",
"previousPosts",
"nextPosts",
"noComment",
"oneComment",
"moreComments",
);
$pt_contents=array(
"&copy; Copyright 2015 ProTheoTV",
"Erstellt in",
"Menü",
"videos.png",
"Suche",
"Suchergebnisse",
"Leider nichts gefunden.",
"Kommentare",
"Autor",
"E-Mail",
"Website",
"Kommentar",
"Senden",
"Kommentar erstellen",
"Kommentar muss erst bestätigt werden.",
"&larr; Ältere Beiträge",
"Neuere Beiträge &rarr;",
"Keine Kommentare",
"1 Kommentar",
"% Kommentare",
);

//Create Table if necessary
if($wpdb->get_var("SHOW TABLES LIKE '$table_name';") !=$table_name) {

//Create Table
$charset_collate=$wpdb->get_charset_collate();
$sql="CREATE TABLE IF NOT EXISTS $table_name (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30),
	content VARCHAR(255)
	) $charset_collate;";
require_once(ABSPATH."wp-admin/includes/upgrade.php");
dbDelta($sql);

//and fill it! change it to foreach(...) with loop
//$wpdb->insert($table_name,array("name"=>"commentApproveWarning","content"=>"Kommentar muss erst bestätigt werden"));
foreach($pt_variables as $key => $pt_name)
{
$wpdb->insert($table_name,array("name"=>$pt_name,"content"=>$pt_contents[$key]));
}
}

//Now the page file:
//with loop and $pt_variables
foreach($pt_variables as $pt_name)
{
if(@$_POST[$pt_name]!="")
{
$content=$_POST[$pt_name];
$wpdb->update($table_name,array("content"=>"$content"),array("name"=>"$pt_name"));
}
}

echo "<div class=\"wrap\">";
echo "<h2>ProTheoTV eXtra Einstellungen</h2>";
echo "<h3>Variablen</h3>";
echo "<form action=\"".get_bloginfo("wpurl")."/wp-admin/themes.php?page=proTheoTV-Settings\" method=\"post\">";
echo "<table border=\"0\">";
$result=$wpdb->get_results("SELECT * FROM $table_name;",ARRAY_A);
foreach($result as $row)
{
//echo $row['id']."->".$row['name']."->".$row['content']."<br>";
echo "<tr><td>".$row['name'].":</td><td><input type=\"text\" name=\"".$row['name']."\" value=\"".htmlspecialchars($row['content'])."\" size=\"100\"></td></tr>";
}
echo "</table><input type=\"submit\" value=\"Speichern\"></form>";
echo "</div>";
}
}

function my_plugin_menu() {
	add_theme_page("proTheoTV", "proTheoTV Einstellungen", "read", "proTheoTV-Settings", "pt_get_menu_text");
}
add_action("admin_menu","my_plugin_menu");

function pt_get_variable($name)
{
	global $wpdb;
	return $wpdb->get_var("SELECT content FROM ".$wpdb->prefix."protheotv"." WHERE name='".$name."'");
}

?>
