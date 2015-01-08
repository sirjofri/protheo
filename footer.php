<?php
global $pt_use_just_variables;
global $pt_var;
?>
<sidebar class="menu headermenu">
<?php get_sidebar(); ?>
</sidebar>

<footer class="box footer">
<p><?php echo $pt_use_just_variables?just_variable("copyright",FALSE):$pt_var["copyright"]; ?></p>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
