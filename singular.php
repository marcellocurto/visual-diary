<?php
get_header();
if (have_posts()):
while (have_posts()): 
the_post();
PG_Helper::rememberShownPost();

$background_direction = get_field('direction_color');
$background_left = get_field('background_color');
$background_right = get_field('background_color_right');
if (empty($background_left)) { $background_left .= '#ffffff00'; }
if (empty($background_right)) { $background_right .= '#ffffff00'; }
?>
<style>
    html,
    body {
        <?php 
        $background_body_direction = $background_direction;
        if ($background_direction == 'top') { $background_body_direction = 'bottom'; } 
        elseif ($background_direction == 'bottom') { $background_body_direction = 'top'; }       
        echo 'background-color:' . $background_left . ';background-image: linear-gradient(to ' . $background_body_direction . ', ' . $background_left . ', ' . $background_right . ');'; 
        ?>
    }
</style>

<section class="content-area"  style="background-image: linear-gradient(to <?php echo $background_direction . ', ' . $background_left . ', ' . $background_right . ');'; ?>">
<main id="main" class="site-main">
            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <?php if (has_post_thumbnail()): ?>
                <header class="image-large-item">
                    <picture class="image-wrapper">
                        <?php echo get_the_post_thumbnail( null, 'full' ); ?>
                    </picture>
                </header>
            <?php endif; ?>
                <main class="description-wrapper">
                    <div class="post-title">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
 
                    <div class="meta-info">
 
                    <?php $field_camera_check = get_field('camera_brand');
                    if ($field_camera_check) {
                        echo '<div class="single-meta">';
                        $values_camera = get_field('camera_brand');
                    
                    if ($values_camera) {
                        $field_camera = get_field_object('camera_brand');
                        echo '<p class="meta-text"><span class="meta-label">' . $field_camera['label'] . '</span>: ';

                    foreach ($values_camera as $value_camera) {
                        $tag_camera = get_tag($value_camera);
                        $tagname_camera = $tag_camera->name;
                        $taglist_camera = $prefix_camera . '' . $tagname_camera . '';
                        $prefix_camera = '';
                        $tagurl_camera = get_tag_link($value_camera);
                    
                        echo '<span class="meta-value"><a href="' . $tagurl_camera . '">' . $taglist_camera . '</a></span>';
                }
                    echo '</p>';}
                    $values_lens = get_field('lens_used');if ($values_lens) {$field_lens = get_field_object('lens_used');
                    echo '<p class="meta-text"><span class="meta-label">' . $field_lens['label'] . '</span>: ';
 
                    foreach ($values_lens as $value_lens) {
                        $tag_lens = get_tag($value_lens);
                        $tagname_lens = $tag_lens->name;
                        $taglist_lens = $prefix_lens . '' . $tagname_lens . '';
                        $prefix_lens = '';
                        $tagurl_lens = get_tag_link($value_lens);
                        echo '<span class="meta-value"><a href="' . $tagurl_lens . '">' . $taglist_lens . '</a></span>';}
                        echo '</p>';}
                        $values_film = get_field('film_used');
 
                    if ($values_film) {
                        $field_film = get_field_object('film_used');
                        
                        echo '<p class="meta-text"><span class="meta-label">' . $field_film['label'] . '</span>: ';
 
                    foreach ($values_film as $value_film) {
                        $tag_film = get_tag($value_film);
                        $tagname_film = $tag_film->name;
                        $taglist_film = $prefix_film . '' . $tagname_film . '';
                        $prefix_film = '';
                        $tagurl_film = get_tag_link($value_film);
    
                        echo '<span class="meta-value"><a href="' . $tagurl_film . '">' . $taglist_film . '</a></span>';
                    }
                    echo '</p>';
                }
                    echo '</div>';
                }
                    ?>
                    </div>
            </main>
            <footer>
                <?php if (!is_page()): ?>
                    <div class="single-date">
                        <?php the_time(get_option('date_format')); ?>
                    </div>
                <?php endif; ?>
            </footer>
        </article>
        </main>
</section>
        <?php endwhile; ?>
        <?php else: ?>
        <p>Sorry, it's seems like the page you are looking for doesn't exist.</p>
        <?php endif; ?>


<?php get_footer(); ?>