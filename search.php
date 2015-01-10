<?php
/*
Template Name: Search Page
*/
global $pt_use_just_variables;
global $pt_var;
?>
<?php get_header(); ?>
<content class="box main">
<article class="box article">
<header class="article header">
<h2><?php echo $pt_use_just_variables?just_variable("searchHeader",FALSE):$pt_var["searchHeader"]; ?></h2>
</header>
<?php get_search_form(); ?>
</article>
<section class="box article">
<header class="article header">
<h2><?php echo $pt_use_just_variables?just_variable("searchResultsHeader",FALSE):$pt_var["searchResultsHeader"]; ?></h2>
</header>
<?php
if(have_posts()): ?>
<?php while(have_posts()): the_post(); ?>
<article class="box article searchresult">
<header class="article header searchresult">
<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <em><?php the_author_posts_link(); ?></em></h3>
<p class="arthead meta searchresult"><?php the_date("l, j. F Y |"); ?> <?php echo $pt_use_just_variables?just_variable("created_in",FALSE):$pt_var['created_in']; ?> <?php the_category(", "); ?></p>
</header>
<?php the_excerpt(); ?>
</article>
<?php endwhile; ?>
<?php else: ?>
<?php echo $pt_use_just_variables?just_variable("nothingFound",FALSE):$pt_var["nothingFound"]; ?>
<?php
endif;
?>
<footer class="article footer">
</footer>
</section>

</content>
<?php get_footer(); ?>
