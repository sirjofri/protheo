<?php get_header(); ?>
<content class="box main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article class="box article">
<header class="article header">
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> <em><?php the_author_posts_link(); ?></em></h2>
<p class="arthead meta"><?php the_date("l, j. F Y |"); ?> <?php just_variable("created_in"); ?> <?php the_category(", "); ?></p>
</header>
<?php the_content(); ?>
<footer class="article footer">
</footer>
<a href="javascript:void(0)" onclick="toggle_comments();"><?php just_variable("commentToggleBox"); ?></a>
<?php comments_template(); ?>
</article>

<?php endwhile; ?>
<p><?php next_posts_link("&larr; &Auml;ltere Eintr&auml;ge") ?> <?php previous_posts_link("Neuere Eintr&auml;ge &rarr;") ?></p>
<?php endif ?>

</content>
<?php get_footer(); ?>
