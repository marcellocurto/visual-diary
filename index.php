<?php get_header(); ?>

                <section class="content-area">
                    <h1 class="tag-archive"><?php single_tag_title(); ?></h1>
                    <main id="main" class="site-main grid-wrapper">
                        <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php PG_Helper::rememberShownPost(); ?>
                                <article <?php post_class( 'grid-item' ); ?> id="post-<?php the_ID(); ?>">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php $image_attributes = !empty( get_the_ID() ) ? wp_get_attachment_image_src( PG_Image::isPostImage() ? get_the_ID() : get_post_thumbnail_id( get_the_ID() ), 'large' ) : null; ?><div class="image-container" style="<?php if($image_attributes) echo 'background-image:url(\''.$image_attributes[0].'\')' ?>">
</div></a>
                                </article>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <p><?php _e( 'Sorry, no posts matched your criteria.', 'marcello_visual' ); ?></p>
                        <?php endif; ?>
                    </main>
                    <?php if ( PG_Pagination::isPaginated() ) : ?>
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