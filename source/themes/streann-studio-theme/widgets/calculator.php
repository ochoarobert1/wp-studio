<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Calculator extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'calculator';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Calculator', 'streann');
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-code';
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url()
    {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return [ 'basic' ];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return [ 'calculator' ];
    }

    public function get_style_depends()
    {
        return ['calculator-style'];
    }

    public function get_script_depends()
    {
        return ['calculator-script'];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                            'label' => esc_html__('Content', 'streann'),
                            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'slider_title',
            [
                            'label' => esc_html__('First Title (Slider Section)', 'streann'),
                            'label_block' => true,
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Number of Members', 'streann'),
                            'placeholder' => esc_html__('Enter first title above slider input', 'streann'),
                            'ai' => [
                                    'active' => false,
                            ],
            ]
        );

        $this->add_control(
            'subscription_title',
            [
                            'label' => esc_html__('Second Title (Subscription Section)', 'streann'),
                                                        'label_block' => true,
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Subscription', 'streann'),
                            'placeholder' => esc_html__('Enter second title above first input', 'streann'),
                                                        'ai' => [
                                                            'active' => false,
                                                        ],
            ]
        );

        $this->add_control(
            'event_title',
            [
                            'label' => esc_html__('Third Title (Course or Event Section)', 'streann'),
                                                        'label_block' => true,
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Course or Event', 'streann'),
                            'placeholder' => esc_html__('Enter second title above first input', 'streann'),
                                                        'ai' => [
            'active' => false,
        ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        ob_start();
        ?>
				<section class="calculator-widget-container">
					<div class="calculator-widget-content">
						<header class="calculator-widget-header"></header>
						<form class="calculator-widget-form-container">
							<div class="calculator-widget-form-input calculator-widget-form-range">
								<label for="number_member"><?php echo esc_html($settings['slider_title']); ?></label>
								<div class="range-container">
									<input type="range" min="10" step="10" max="100000" name="number-member" id="numberMember" />
									<p class="range-value"></p>
								</div>
							</div>
							<div class="calculator-widget-form-input">
								<label for="subscription"><?php echo esc_html($settings['subscription_title']); ?></label>
								<div class="calculator-widget-input-group">
									<input type="text" class="calculator-input-number" name="subscription" id="subscription" />
									<span><?php esc_html_e('per month', 'streann');?></span>
								</div>
							</div>
							<div class="calculator-widget-form-input">
								<label for="course_event"><?php echo esc_html($settings['event_title']); ?></label>
								<div class="calculator-widget-input-group">
									<input type="text" class="calculator-input-number" name="course-event" id="course_event" />
									<span><?php esc_html_e('one-time fee', 'streann');?></span>
								</div>
							</div>
						</form>
					</div>
					<footer class="calculator-widget-footer">
						<p id="calcResult" class="calculator-widget-footer-result">$ 0</p>
						<span class="calculator-widget-footer-legend"><?php esc_html_e('Annual Revenue', 'streann');?></span>
					</footer>
				</section>
				<?php
        $content = ob_get_clean();
        echo $content;
    }

}
