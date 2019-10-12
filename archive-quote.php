<?php get_header(); ?>

<section class="content-area">
    <main id="main" class="site-main">
        <?php
            $quote_query_args = array(
                'post_type' => 'quote',
                'posts_per_page' => 10,
                'paged' => get_query_var( 'paged' ) ?: 1,
                'order' => 'DESC',
                'orderby' => 'date'
            )
        ?>
        <?php $quote_query = new WP_Query( $quote_query_args ); ?>
        <?php if ( $quote_query->have_posts() ) : ?>
            <?php while ( $quote_query->have_posts() ) : $quote_query->the_post(); ?>
                <?php PG_Helper::rememberShownPost(); ?>
                <article <?php post_class( 'quote-wrapper' ); ?> id="post-<?php the_ID(); ?>">
                    <div class="quote-link">
                        <a href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( '_', 'marcello_visual' ); ?></a>
                    </div>
                    <div class="quote-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="quote-source">
                        <?php echo get_field( 'source' ); ?>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.', 'marcello_visual' ); ?></p>
        <?php endif; ?>
    </main>
    <?php if ( PG_Pagination::isPaginated($quote_query) ) : ?>
        <nav class="pagination pagination-quotes">
            <?php if( PG_Pagination::getCurrentPage() > 1 ) : ?>
                <a class="previous" <?php echo PG_Pagination::getPreviousHrefAttribute( $quote_query ); ?>><i class="fas fa-long-arrow-alt-left"></i></a>
            <?php endif; ?>
            <div>
                <span><?php echo PG_Pagination::getCurrentPage(); ?></span>
                <span> / </span>
                <span><?php echo PG_Pagination::getMaxPages( $quote_query ); ?></span>
            </div>
            <?php if( PG_Pagination::getCurrentPage() < PG_Pagination::getMaxPages( $quote_query ) ) : ?>
                <a class="next" <?php echo PG_Pagination::getNextHrefAttribute( $quote_query ); ?>><i class="fas fa-long-arrow-alt-right"></i></a>
            <?php endif; ?>
        </nav>
    <?php endif; ?>
</section>                

<?php get_footer(); ?>