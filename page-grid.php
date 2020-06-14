<?php
/*
 * Template name: Grid
 */

get_header();
if (have_posts()):
while (have_posts()):
    the_post();
?>
<section class="content-area">
    <main id="main" class="site-main">
        <article <?php post_class();?> id="post-<?php the_ID();?>">
            <main>
                <div class="post-content">
                    <?php the_content();?>
                </div>
            </main>
        </article>
    </main>
</section>
<?php endwhile;?>
<?php endif;?>

<?php get_footer(); ?>