<?php
/************************************
Diese Konfigurationsdatei ist zur alternativen 
Konfiguration der Variablen.

************************************/

$pt_use_just_variables=false; // Soll das Plugin "just_variables" benutzt werden oder sollen die folgenden Variablen benutzt werden? true/false

//Allgemein
$pt_var['copyright']="&copy; Copyright 2015 sirjofri"; //Text für die unterste Zeile, meistens Copyright-Angaben
$pt_var['created_in']="Erstellt in:"; //steht unter dem Artikeltitel und bezeichnet die Kategorie.

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

?>
