<?php
/************************************
Diese Konfigurationsdatei ist zur alternativen 
Konfiguration der Variablen.

************************************/

$pt_use_just_variables=false; // Soll das Plugin "just_variables" benutzt werden oder sollen die folgenden Variablen benutzt werden? true/false

//Allgemein
$pt_var['copyright']="&copy; Copyright 2015 sirjofri"; //Text für die unterste Zeile, meistens Copyright-Angaben
$pt_var['created_in']="Erstellt in:"; //steht unter dem Artikeltitel und bezeichnet die Kategorie.
$pt_var['menuButton']="Menü"; //bezeichnet den Button, der das Menü öffnet
$pt_var['menuButtonImage']="videos.png"; //Hintergrund für den Button, der das Menü öffnet

//Suche
$pt_var['searchHeader']="Suche"; //Überschrift für das Suchformular auf der Suchseite
$pt_var['searchResultsHeader']="Suchergebnisse"; //Überschrift für die Suchergebnisse auf der Suchseite
$pt_var['nothingFound']="Leider nichts gefunden ;-("; //Nachricht: Wenn nichts gefunden

// Kommentare
$pt_var['commentHead']="Kommentar"; //Überschrift für Kommentar-Erstell-Box
$pt_var['commentAuthor']="Name"; //Bezeichnung für Eingabefeld für den Ersteller-Namen
$pt_var['commentEmail']="Email"; //Bezeichnung für Eingabefeld für die Ersteller-Mail
$pt_var['commentUrl']="Homepage"; //Bezeichnung für Eingabefeld für die Ersteller-Homepage
$pt_var['commentComment']="Kommentar"; //Überschrift für direktes Eingabefeld des Kommentars (großes Feld)
$pt_var['commentSubmit']="Senden"; //Button zum Speichern des Kommentars
$pt_var['commentToggleBox']="Kommentar erstellen"; //Link zum Anzeigen/Verstecken der Kommentar-Erstell-Box
$pt_var['commentApproveWarning']="Kommentar muss erst best&auml;tigt werden"; //Warntext zum Anzeigen einer benötigten Bestätigung eines Kommentars

// Dateipfade zu den Menüpunktbildern
$pt_var['img1-1']="/images/test1.png"; //1. Menüpunkt, 1. Bild (=icon); img(Menüpunktnummer)-(Bildnummer)
$pt_var['img1-2']="/images/test2.png"; //1. Menüpunkt, 2. Bild (=Text)
$pt_var['img2-1']="/images/test1.png"; //etc...
$pt_var['img2-2']="/images/test2.png";
$pt_var['img3-1']="/images/test1.png";
$pt_var['img3-2']="/images/test2.png";
$pt_var['img4-1']="/images/test1.png";
$pt_var['img4-2']="/images/test2.png";


/*************************************
Ab Hier darf nichts mehr abgeändert werden!
*************************************/

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
add_theme_support("custom-header");

// Register main menu
function register_my_menu() {
	register_nav_menu('header-menu',__( "Hauptmenu" ));
}
add_action( 'init', 'register_my_menu' );

}
add_action( "after_setup_theme", "custom_theme_setup");

/*function pt_get_text($id)
{
	if($use_just_variables)
	{
		return just_variable($id);
	} else {
		return $pt_var[$id];
	}
}*/

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
	if(!current_user_can("read")) {
wp_die( __("You do not have sufficient permissions to access this page.") );
} else {
echo "<div class=\"wrap\">";
echo "<h2>ProTheoTV Hilfe</h2>";
echo "<p class=\"description\">Das Theme sollte eigentlich ohne weitere Probleme funktionieren. Dennoch gibt es hier eine Hilfe zur Bedienung</p>";
echo "<h3>Module/Bereiche/Begriffe</h3>";
echo "<p>Zur Klärung einiger Begriffe:</p>";
echo "<table border=\"0\" style=\"border:solid 1px;\">";
echo "<tr><td style=\"padding:10px;font-weight:bold;\">Dashboard/Dash</td><td>Menü, das sich über die Menü-Schaltfläche von oben in das Fenster einschieben lässt. <em>Nicht mit dem Administrationstool von Wordpress verwechseln!</em></td></tr>";
echo "</table>";
echo "<h3>Dashboard/Dash</h3>";
echo "<p>Das Dashboard ist der Teil, der nach Drücken auf die Menü-Schaltfläche oben rechts sich von oben nach unten in den Bildschirm hineinschiebt, ähnlich wie bei Smartphones.</p>";
echo "<p>Sein Inhalt ist bis auf Kleinigkeiten durch das Tool <a href=\"".get_bloginfo("url")."/wp-admin/widgets.php\">Widgets</a> konfigurierbar.</p>";
echo "</div>";
}
}

function my_plugin_menu() {
	add_theme_page("proTheoTV", "ProTheoTV Hilfe", "read", "proTheoTV-Menu", "pt_get_menu_text");
}
add_action("admin_menu","my_plugin_menu");

?>
