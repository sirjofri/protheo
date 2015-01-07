<?php get_header(); ?>
<content class="box main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article class="article">
<header class="article header">
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
</header>
<?php the_content(); ?>
<footer class="article footer">
</footer>
</article>

<?php endwhile; ?>
<p><?php next_posts_link("&Auml;ltere Eintr&auml;ge") ?> | <?php previous_posts_link("Neuere Eintr&auml;ge") ?></p>
<?php endif ?>

</content>
<?php get_footer(); ?>
