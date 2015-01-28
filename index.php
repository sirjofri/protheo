<?php get_header(); ?>
<content class="box main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article class="box article">
<header class="article header">
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> <em><?php the_author_posts_link(); ?></em></h2>
<p class="arthead meta"><?php the_date("l, j. F Y |"); ?> <?php echo pt_get_variable("created_in"); ?> <?php the_category(", "); ?></p>
</header>
<?php the_content(); ?>
<footer class="article footer">
<?php comments_popup_link("Keine Kommentare", "1 Kommentar", "% Kommentare"); ?>
</footer>
</article>

<?php endwhile; ?>
<p><?php previous_posts_link(pt_get_variable("previousPosts")); echo " "; next_posts_link(pt_get_variable("nextPosts")); ?></p>
<?php endif ?>

</content>
<?php get_footer(); ?>
