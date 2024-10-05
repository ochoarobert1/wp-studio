<?php

/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

define('HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0');
define('HELLO_ELEMENTOR_CHILD_PREFIX', 'streann');

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */

function hello_elementor_child_enqueue_scripts()
{
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('global-styles');
  wp_dequeue_style('wc-block-style');
  wp_dequeue_style('wc-blocks-vendors-style');
  wp_dequeue_style('wc-blocks-style');
  wp_enqueue_style(
    'hello-elementor-child-style',
    get_stylesheet_directory_uri() . '/style.css',
    [],
    '1.1.0'
  );

  wp_register_script(
    'hello-elementor-child-functions',
    get_stylesheet_directory_uri() . '/js/functions.js',
    [
      'jquery'
    ],
    '1.0.0',
    true
  );

  wp_enqueue_script('hello-elementor-child-functions');

  /* LOCALIZE MAIN SHORTCODE SCRIPT */
  wp_localize_script(
    'hello-elementor-child-functions',
    'custom_admin_url',
    array(
      'ajax_url' => admin_url('admin-ajax.php')
    )
  );

  wp_register_script(
    "swiper",
    "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js",
    ["jquery"],
    false,
    true
  );

  wp_register_style(
    'swiper-style',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
    [],
    HELLO_ELEMENTOR_CHILD_VERSION,
    'all'
  );

  wp_register_script(
    "slick-js",
    "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js",
    ['jquery'],
    false,
    true
  );

  wp_register_style(
    'slick-style',
    'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css',
    [],
    HELLO_ELEMENTOR_CHILD_VERSION,
    'all'
  );

  wp_register_style(
    'slick-theme-style',
    'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css',
    [],
    HELLO_ELEMENTOR_CHILD_VERSION,
    'all'
  );

  wp_register_style(
    'slick-font-style',
    'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/fonts/slick.woff',
    [],
    HELLO_ELEMENTOR_CHILD_VERSION,
    'all'
  );


  wp_register_style(
    'testimonials-widget-style',
    get_stylesheet_directory_uri() . '/widgets/testimonials-widget.css',
    ['slick-style', 'slick-theme-style'],
    HELLO_ELEMENTOR_CHILD_VERSION,
    'all'
  );

  wp_register_script(
    'testimonials-widget-script',
    get_stylesheet_directory_uri() . '/widgets/testimonials-widget.js',
    ['jquery', 'slick-js'],
    HELLO_ELEMENTOR_CHILD_VERSION,
    true
  );

  wp_register_style(
    'calculator-style',
    get_stylesheet_directory_uri() . '/widgets/calculator.css',
    [],
    HELLO_ELEMENTOR_CHILD_VERSION,
    'all'
  );

  wp_register_script(
    'calculator-script',
    get_stylesheet_directory_uri() . '/widgets/calculator.js',
    [],
    HELLO_ELEMENTOR_CHILD_VERSION,
    true
  );

  wp_register_style(
    'custom-pricing-table-style',
    get_stylesheet_directory_uri() . '/widgets/custom-pricing-table.css',
    [],
    HELLO_ELEMENTOR_CHILD_VERSION,
    'all'
  );

  wp_register_script(
    'custom-pricing-table-script',
    get_stylesheet_directory_uri() . '/widgets/custom-pricing-table.js',
    [],
    HELLO_ELEMENTOR_CHILD_VERSION,
    true
  );
}

add_action('wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20);

function add_slug_body_class($classes)
{
  global $post;

  if (isset($post)) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }

  return $classes;
}

add_filter('body_class', 'add_slug_body_class');

require_once('inc/elementor-functions.php');
