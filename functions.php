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
	register_sidebar(array(
		'name' => 'Footer',
		'id' => 'footer_area',
		'description' => 'Widgets erscheinen ganz unten',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init','arphabet_widgets_init');

function pt_get_settings_menu() {
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
"headerFrom",
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
"Neuere Beiträge &rarr;",
"&larr; Ältere Beiträge",
"Keine Kommentare",
"1 Kommentar",
"% Kommentare",
"von ",
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

function pt_get_help_menu() {
	if(!current_user_can("read")) {
wp_die( __("You do not have sufficient permissions to access this page.") );
} else {
echo "<div class=\"wrap\">";
echo "<h2>ProTheoTV Hilfe</h2>";
echo "<h3>Variable Texte editieren</h3>";
echo "<p>Dieser Punkt ist recht einfach: Es gibt auf der Site statische Inhalte, die im Template &#x84;verbacken&#x94; sind. Damit man das doch relativ &#x84;dynamisch&#x94; verändern kann, habe ich beschlossen, Variablen einzufügen.</p>";
echo "<p>Diese Variablen kann man links unter <code>Design > proTheoTV Einstellungen</code> verändern. <em>HTML-Codes werden akzeptiert!</em></p>";
echo "<h3>Menü: Hintergrundbilder</h3>";
echo "<p>Die Hintergrundbilder für die einzelnen Menüpunkte sind etwas tricky...</p>";
echo "<p>Wenn man die Hintergrundbilder über die Medien-Funktion hochgeladen hat, haben sie eine eindeutige ID. Diese ID nennt sich &#x84;Attachment-ID&#x94; und es gilt, diese herauszufinden. Dazu kann man z. B. das Medium anklicken (kleines Fenster poppt auf) und mit der Maus <em>über <code>Bild bearbeiten</code> oder <code>Anhang-Seite ansehen</code> fahren (nicht klicken!)</em>. Meistens erscheint im unteren linken Browserbereich eine Adresse, die u. a. auch den Teil <code>?attachment_id=xx</code> enthält. Diese Nummer ist die gesuchte ID.</p>";
echo "<p>Was machen wir nun mit der ID? Wir gehen unter <code>Design > Menüs</code> in die Menüstruktur vom Hauptmenü (das Menü mit der Position <code>Hauptmenu</code>). Nun wird bei jedem einzelnen Menüpunkt das <code>HTML-Attribut title (optional)</code> wie folgt geändert:</p>";
echo "<p><code>xx-yy</code>: <code>xx</code> ist die ID des Hintergrundbildes bei normalem Zustand, <code>yy</code> die des Hintergrundbildes, wenn man mit der Maus über dem Menüpunkt ruht (<em>hover</em> oder <em>mouseover</em>).</p>";
echo "<p>Ich empfehle, die IDs der einzelnen Hintergrundbilder zuerst herauszufinden und zu notieren (Papier und Bleistift zum Beispiel), um nicht ständig zwischen den Menüs zu wechseln.</p>";
echo "<p>Weiterhin hoffe ich, dass diese Angaben dem Nutzer helfen und gut nachvollziehbar sind.</p>";
echo "</div>";
}
}

function my_plugin_menu() {
	add_theme_page("proTheoTV", "proTheoTV Einstellungen", "edit_theme_options", "proTheoTV-Settings", "pt_get_settings_menu");
	add_theme_page("proTheoTV", "proTheoTV Hilfe", "read", "proTheoTV-Help", "pt_get_help_menu");
}
add_action("admin_menu","my_plugin_menu");


function pt_get_variable($name)
{
	global $wpdb;
	return $wpdb->get_var("SELECT content FROM ".$wpdb->prefix."protheotv"." WHERE name='".$name."'");
}

if ( current_user_can('contributor') && !current_user_can('upload_files') )
    add_action('admin_init', 'allow_contributor_uploads');
  
function allow_contributor_uploads() {
    $contributor = get_role('contributor');
    $contributor->add_cap('upload_files');
}

?>
