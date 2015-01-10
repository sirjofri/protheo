<?php
global $pt_use_just_variables;
global $pt_var;
?>

<footer class="box footer">
<p><?php echo $pt_use_just_variables?just_variable("copyright",FALSE):$pt_var["copyright"]; ?></p>
</footer>
</div> <?php //wrap ?>

<div class="menubutton" id="menubutton" onclick="show_menu();">
<?php echo $pt_use_just_variables?just_variable("menuButton",FALSE):$pt_var["menuButton"]; ?></p>
</div>

<div id="overlay" style="display:block;">
<aside class="menu headermenu" id="menu_overlay">
<?php get_sidebar(); ?>
</aside>
</div>

<?php wp_footer(); ?>

</body>
</html>
