<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kufam:ital,wght@0,400..900;1,400..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">    <?php wp_head(); ?>
</head>
<body <?php body_class('pink-lite-background'); ?>>
    <?php wp_body_open(); ?>
    <div id="wrapper" class="container content pink-lite-background">
        
        <?php
        if ( is_front_page() ) {
            get_template_part( 'front-header' );
        } elseif ( is_home() ) {
            get_template_part( 'front-header' );
        } elseif ( is_single() ) {
            get_template_part( 'entry-header' );
        }
        ?>

