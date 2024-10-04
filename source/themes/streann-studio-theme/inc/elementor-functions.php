<?php

function register_list_widget($widgets_manager)
{
    require_once(plugin_dir_path(__DIR__) . '/widgets/custom-oembed-widget.php');

    $widgets_manager->register(new \Elementor_Custom_oEmbed_Widget());

    require_once(plugin_dir_path(__DIR__) . '/widgets/custom-pricing-widget.php');

    $widgets_manager->register(new \Elementor_Custom_Pricing_Widget());
    
    require_once(plugin_dir_path(__DIR__) . '/widgets/testimonials-widget.php');
    
	$widgets_manager->register(new \TestimonialsWidget());
	
	require_once(plugin_dir_path(__DIR__) . '/widgets/calculator.php');
    
	$widgets_manager->register(new \Calculator());
}

add_action('elementor/widgets/register', 'register_list_widget');
