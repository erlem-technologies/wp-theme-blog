<?php

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );

/**
 * Proper way to enqueue scripts and styles
 */
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style', get_template_directory_uri().'/assets/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

/*
 * Ajouter "Image mise en avant" dans l'administration
 */

add_theme_support( 'post-thumbnails' );