<footer class="box footer">
<?php dynamic_sidebar("footer_area"); ?>
<p><?php echo pt_get_variable("copyright"); ?></p>
</footer>
</div> <?php //wrap ?>

<div class="menubutton" id="menubutton" onclick="show_menu();">
<?php echo (pt_draft()?pt_get_variable("menuButton"):""); ?>
</div>

<div id="overlay" style="display:block;">
<aside class="menu headermenu" id="menu_overlay">
<?php get_sidebar(); ?>
</aside>
</div>

<?php echo "!".pt_get_variable("draft_mode")."!"; ?>

<?php wp_footer(); ?>

</body>
</html>
