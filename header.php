<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Marcello Curto">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
<body class="<?php echo implode(' ', get_body_class()); ?>">
    <?php if( function_exists( 'wp_body_open' ) ) wp_body_open(); ?>
    
    <div id="page" class="site">
    <header class="site-header">
    <div class="page-title">
    <a href="<?php echo esc_url( home_url() ); ?>">
        <h1><?php bloginfo( 'name' ); ?></h1>
    </a>
    </div>
    <?php if ( has_nav_menu( 'primary' ) ) : ?>
    <?php PG_Smart_Walker_Nav_Menu::$options['template'] = '<li class="menu-item {CLASSES}" id="{ID}"><a {ATTRS}>{TITLE}</a></li>';
    wp_nav_menu( array(
        'container' => '',
        'theme_location' => 'primary',
        'items_wrap' => '<ul class="menu-list %2$s" id="%1$s">%3$s</ul>',
        'walker' => new PG_Smart_Walker_Nav_Menu()
    ) );
    ?>
    <?php endif; ?>
</header>
<div id="content" class="site-content">