<?php get_header(); ?>

<section class="content-area">
<h1 class="tag-archive"><?php single_tag_title(); ?></h1>
<main id="main" class="site-main grid-wrapper">
<?php if (have_posts()): ?>
<?php while (have_posts()): the_post(); ?>

	<?php PG_Helper::rememberShownPost(); ?>
	<article <?php post_class('grid-item'); ?> id="post-<?php the_ID(); ?>">
	<a href="<?php echo esc_url(get_permalink()); ?>">
	<?php the_post_thumbnail( 'medium' ) ?>
	</a>
	</article>

<?php endwhile; ?>
<?php else: ?>
<p><?php _e('Sorry, cannot find what you are looking for.', 'marcello_visual'); ?></p>
<?php endif; ?>
</main>
<?php if (PG_Pagination::isPaginated()): ?>
<nav class="pagination pagination-index">
<a class="previous" <?php echo PG_Pagination::getPreviousHrefAttribute(); ?>><i class="fas fa-long-arrow-alt-left"></i></a>
<div>
<span><?php echo PG_Pagination::getCurrentPage(); ?></span>
<span> / </span>
<span><?php echo PG_Pagination::getMaxPages(); ?></span>
</div>
<a class="next" <?php echo PG_Pagination::getNextHrefAttribute(); ?>><i class="fas fa-long-arrow-alt-right"></i></a>
</nav>
<?php endif; ?>
</section>

<?php get_footer(); ?>