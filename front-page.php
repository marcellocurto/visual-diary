<?php get_header(); ?>

<section class="content-area">
    <main id="main" class="site-main">
        <?php
            $archive_query_args = array(
                'post_type' => 'post',
                'posts_per_page' => 10,
                'paged' => get_query_var('page') ? get_query_var('page') : 1,
                'order' => 'DESC',
                'orderby' => 'date'
            )
        ?>
        <?php $archive_query = new WP_Query( $archive_query_args ); ?>
        <?php if ( $archive_query->have_posts() ) : ?>
            <?php while ( $archive_query->have_posts() ) : $archive_query->the_post(); ?>
                <?php PG_Helper::rememberShownPost(); ?>
                <article <?php post_class( 'image-large-item' ); ?> id="post-<?php the_ID(); ?>">
                    <div class="image-wrapper">
                        <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo PG_Image::getPostImage( null, 'large', null, 'both', null ) ?></a>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.', 'marcello_visual' ); ?></p>
        <?php endif; ?>
    </main>
    <?php if ( PG_Pagination::isPaginated($archive_query) ) : ?>
        <nav class="pagination pagination-index">
            <a class="previous" <?php echo PG_Pagination::getPreviousHrefAttribute( $archive_query ); ?>><i class="fas fa-long-arrow-alt-left"></i></a>
            <div>
                <span><?php echo PG_Pagination::getCurrentPage(); ?></span>
                <span> / </span>
                <span><?php echo PG_Pagination::getMaxPages( $archive_query ); ?></span>
            </div>
            <a class="next" <?php echo PG_Pagination::getNextHrefAttribute( $archive_query ); ?>><i class="fas fa-long-arrow-alt-right"></i></a>
        </nav>
    <?php endif; ?>
</section>                

<?php get_footer(); ?>