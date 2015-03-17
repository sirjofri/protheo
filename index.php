<?php get_header(); ?>
<content class="box main">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article class="box article">
<header class="article header">
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> <em><?php echo pt_get_variable("headerFrom");the_author_posts_link(); ?></em></h2>
<p class="arthead meta"><?php the_time("l, j. F Y |"); ?> <?php echo pt_get_variable("created_in"); ?> <?php the_category(", "); ?></p>
</header>
<?php the_content(); ?>
<footer class="article footer">
<p><?php comments_popup_link(pt_get_variable("noComment"), pt_get_variable("oneComment"), pt_get_variable("moreComments")); ?></p>
</footer>
</article>

<?php endwhile; ?>
<footer>
<p><?php previous_posts_link(pt_get_variable("previousPosts")); echo " "; next_posts_link(pt_get_variable("nextPosts")); ?></p>
<?php endif ?>
</footer>

</content>
<?php get_footer(); ?>
