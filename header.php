<!DOCTYPE html>
<html lang="de">

<head>
<title><?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>" type="text/css">
<link rel="pingback" href="<?php bloginfo("pingback_url"); ?>">
<?php wp_head(); ?>
</head>
<body class="custom-background">

<div class="wrap wrapper">
<header class="box header">
<h1><a href="<?php bloginfo("url"); ?>"><?php bloginfo("name"); ?></a></h1>
<h3><?php bloginfo("description"); ?></h3>
</header>
