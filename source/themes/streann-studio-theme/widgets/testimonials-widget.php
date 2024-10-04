<?php

/*
 * Testimonials Widget
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;

if (!defined('ABSPATH')) {
    exit;
}

class TestimonialsWidget extends Widget_Base
{
    public function get_name()
    {
        return esc_attr('TestimonialsWidget');
    }

    public function get_title()
    {
        return esc_html__('Testimonials Widget', 'streann');
    }

    public function get_icon()
    {
        return esc_attr('eicon-bullet-list');
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['Testimonials Widget', 'streann'];
    }

    public function get_style_depends()
    {
        return ['slick-js', 'testimonials-widget-style'];
    }

    public function get_script_depends()
    {
        return ['slick-style', 'slick-font-style', 'slick-theme-style', 'testimonials-widget-script'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'streann'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__('Repeater List', 'hello-elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'quote_author',
                        'label' => esc_html__('Author', 'hello-elementor'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('List Title', 'hello-elementor'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'quote_content',
                        'label' => esc_html__('Content', 'hello-elementor'),
                        'type' => Controls_Manager::WYSIWYG,
                        'default' => esc_html__('List Content', 'hello-elementor'),
                        'show_label' => false,
                    ],
                ],
                'default' => [
                    [
                        'quote_author' => esc_html__('Title #1', 'hello-elementor'),
                        'quote_content' => esc_html__('Item content. Click the edit button to change this text.', 'hello-elementor'),
                    ],
                    [
                        'quote_author' => esc_html__('Title #2', 'hello-elementor'),
                        'quote_content' => esc_html__('Item content. Click the edit button to change this text.', 'hello-elementor'),
                    ],
                ],
                'title_field' => '{{{ quote_author }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_content_section',
            [
                'label' => esc_html__('Style', 'streann'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Content Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .test-wrapper' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Content Typography', 'streann'),
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .test-wrapper',
            ]
        );

        $this->add_control(
            'author_color',
            [
                'label' => esc_html__('Author Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .test-wrapper h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Author Typography', 'streann'),
                'name' => 'author_typography',
                'selector' => '{{WRAPPER}} .test-wrapper h3',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
		<section class="component testimonials-widget-component">
			<div class="container">
				<?php $arrayTest = $settings['list']; ?>
				<div class="slick slick-testimonials">
					<?php foreach ($arrayTest as $item) : ?>
						<div>
							<div class="test-wrapper">
								<?php echo wp_kses_post($item['quote_content']); ?>
								<h3><?php echo esc_html($item['quote_author']); ?></h3>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

	<?php
    }

    protected function content_template()
    {
        ?>
		<section class="component testimonials-widget-component">
			<div class="container">
				<div class="swiper swiper-container">
					<div class="swiper-wrapper">
						<# _.each( settings.list, function( item, index ) { #>
							<div class="swiper-slide">
								<div class="test-wrapper">
									<p>{{{ item.quote_content }}}</p>
									<h3>{{ item.quote_author }}</h3>
								</div>
							</div>
							<# }); #>
					</div>
				</div>
				<div class="custom-swiper-tools-wrapper">
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</div>
		</section>
<?php
    }
}
