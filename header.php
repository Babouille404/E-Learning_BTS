<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>./Assets/style.css">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <?php
    wp_nav_menu([
        'theme_location' => 'primary',
        'container'      => 'nav',
        'menu_class'     => 'main-nav',
    ]);
    ?>
</header>