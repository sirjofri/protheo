<!DOCTYPE html>
<html lang="de">

<head>
<title><?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>" type="text/css">
<link rel="pingback" href="<?php bloginfo("pingback_url"); ?>">
<script type="text/javascript" src="<?php bloginfo("template_directory"); ?>/script.js"></script>
<style type="text/css">
/* dynamisch durch php erstellen. auch just_variable nutzen. */
#menu-item-19 { background:url(<?php bloginfo("url"); ?>/images/test1.png) no-repeat left top,
url(<?php bloginfo("url"); ?>/images/test2.png) no-repeat left top; }
#menu-item-14 { background:url(<?php bloginfo("url"); ?>/images/test1.png) no-repeat left top,
url(<?php bloginfo("url"); ?>/images/test2.png) no-repeat left top; }
#menu-item-15 { background:url(<?php bloginfo("url"); ?>/images/test1.png) no-repeat left top,
url(<?php bloginfo("url"); ?>/images/test2.png) no-repeat left top; }
#menu-item-20 { background:url(<?php bloginfo("url"); ?>/images/test1.png) no-repeat left top,
url(<?php bloginfo("url"); ?>/images/test2.png) no-repeat left top; }
</style>
<?php wp_head(); ?>
</head>
<body class="custom-background" onload="setup();">

<div class="wrap wrapper">
<header class="box header">
<h1><a href="<?php bloginfo("url"); ?>"><?php bloginfo("name"); ?></a></h1>
<h3><?php bloginfo("description"); ?></h3>
</header>
