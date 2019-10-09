<?php get_header(); ?>

<section class="content-area">
    <main id="main" class="site-main">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php PG_Helper::rememberShownPost(); ?>
                <article <?php post_class( 'quote-wrapper' ); ?> id="post-<?php the_ID(); ?>">
                    <div class="quote-link">
                        <span><?php _e( '_', 'marcello_visual' ); ?></span>
                    </div>
                    <div class="quote-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="quote-source">
                        <?php echo get_field( 'source' ); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.', 'marcello_visual' ); ?></p>
        <?php endif; ?>
    </main>
</section>                

<?php get_footer(); ?>