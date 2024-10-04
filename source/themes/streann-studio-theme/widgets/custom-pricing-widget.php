<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Custom_Pricing_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve list widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'custom_pricing';
    }

    /**
     * Get widget title.
     *
     * Retrieve list widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Custom Pricing', 'elementor-list-widget');
    }

    /**
     * Get widget icon.
     *
     * Retrieve list widget icon.
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
     * Retrieve the list of categories the list widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return [ 'general' ];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the list widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return [ 'pricing', 'custom' ];
    }

    /**
     * Register list widget controls.
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
                'label' => esc_html__('Pricing List', 'elementor-list-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        /* Start repeater */

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'elementor-list-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Title', 'elementor-list-widget'),
                'default' => esc_html__('Title', 'elementor-list-widget'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'pricing-monthly',
            [
                'label' => esc_html__('Monthly Pricing', 'elementor-list-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Monthly Pricing', 'elementor-list-widget'),
                'default' => esc_html__('Monthly Pricing', 'elementor-list-widget'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'pricing-yearly',
            [
                'label' => esc_html__('Yearly Pricing', 'elementor-list-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Yearly Pricing', 'elementor-list-widget'),
                'default' => esc_html__('Yearly Pricing', 'elementor-list-widget'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'saving',
            [
                'label' => esc_html__('Saving Description', 'elementor-list-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Saving Description', 'elementor-list-widget'),
                'default' => esc_html__('Saving Description', 'elementor-list-widget'),
                'label_block' => true
            ]
        );


        $repeater->add_control(
            'text',
            [
                'label' => esc_html__('Description', 'elementor-list-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Description', 'elementor-list-widget'),
                'default' => esc_html__('Description', 'elementor-list-widget'),
                'label_block' => true
            ]
        );


        $repeater->add_control(
            'features',
            [
                'label' => esc_html__('Features of the Plan', 'elementor-list-widget'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__('Features of the Plan', 'elementor-list-widget'),
                'default' => esc_html__('Features of the Plan', 'elementor-list-widget'),
                'label_block' => true
            ]
        );



        $repeater->add_control(
            'popular',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__('This Item is Popular?', 'icontact'),
                'options' => [
                    'yes' => [
                        'title' => esc_html__('Yes', 'icontact'),
                        'icon' => 'eicon-check-circle',
                    ],
                ],
                'default' => 'no',
            ]
        );

        $repeater->add_control(
            'category',
            [
                'label' => esc_html__('Category', 'elementor-list-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'individual' => [
                        'title' => esc_html__('Individual', 'elementor-list-widget'),
                        'icon' => 'eicon-user-circle-o',
                    ],
                    'business' => [
                        'title' => esc_html__('Business', 'elementor-list-widget'),
                        'icon' => 'eicon-global-settings',
                    ]
                ],
                'default' => 'individual',
                'toggle' => false,
            ]
        );

        $repeater->add_control(
            'btn_text',
            [
                'label' => esc_html__('Button: Text', 'elementor-list-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Button: Text', 'elementor-list-widget'),
                'default' => esc_html__('Button: Text', 'elementor-list-widget'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Button: Link', 'elementor-list-widget'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'elementor-list-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'link_yearly',
            [
                'label' => esc_html__('Button: Link (Yearly)', 'elementor-list-widget'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'elementor-list-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        /* End repeater */

        $this->add_control(
            'list_items',
            [
                'label' => esc_html__('List Items', 'elementor-list-widget'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'text' => esc_html__('List Item #1', 'elementor-list-widget'),
                        'link' => '',
                    ],
                    [
                        'text' => esc_html__('List Item #2', 'elementor-list-widget'),
                        'link' => '',
                    ],
                    [
                        'text' => esc_html__('List Item #3', 'elementor-list-widget'),
                        'link' => '',
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render list widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if (get_locale() == 'en_US') {
            $arr_text = array(
                'button_ind' => 'Individuals',
                'button_busi' => 'Businesses',
                'text_month' => 'Monthly',
                'text_year' => 'Yearly',
                'most_popular' => 'Most Popular'
            );
        } else {
            $arr_text = array(
                'button_ind' => 'Individuales',
                'button_busi' => 'Negocios',
                'text_month' => 'Mensual',
                'text_year' => 'Anual',
                'most_popular' => 'Más Popular'
            );
        }
        ?>
		<div class="custom-pricing-widget">
            <div class="button-filter">
                <a href="#" data-filter="individual" class="filter-swap active"><?php echo $arr_text['button_ind']; ?></a>
                <a href="#" data-filter="business" class="filter-swap"><?php echo $arr_text['button_busi']; ?></a>
            </div>
            <div class="custom-pricing-range-selector">
                <div class="custom-pricing-range-helper">
                    <span class="label"><?php echo $arr_text['text_month']; ?></span>
                    <label class="switch">
                        <input id="checkSlider" type="checkbox">
                        <span id="switchSlider" data-price="monthly" class="slider round"></span>
                    </label>
                    <span class="label"><?php echo $arr_text['text_year']; ?></span>
                </div>
            </div>
            <div class="custom-pricing-items">
			<?php
            foreach ($settings['list_items'] as $index => $item) {
                $popular = ($item['popular'] !== 'yes') ? '' : 'popular';
                $hidden = ($item['category'] !== 'individual') ? 'hidden-item' : '';
                ?>
                <div class="custom-pricing-item <?php echo $item['category']; ?> <?php echo $popular; ?> <?php echo $hidden; ?>">
                    <div class="wrapper">
                        <?php if ($popular != '') { ?>
                        <div class="popular-text">
                            <?php echo $arr_text['most_popular']; ?>
                        </div>
                        <?php } ?>
                        <h3><?php echo $item['title']; ?></h3>
                        <div class="text">
                            <?php echo apply_filters('the_content', $item['text']); ?>
                        </div>
                        <div class="price">
                            <div class="price-item">
                                <div class="price-text monthly">
                                    <?php echo $item['pricing-monthly']; ?>
                                </div>
                                <div class="price-text yearly hidden-item">
                                    <?php echo $item['pricing-yearly']; ?>
                                </div>
                            </div>
                            <div class="price-saving">
                                <?php echo apply_filters('the_content', $item['saving']); ?>
                            </div>
                        </div>
                        <div class="features">
                            <?php echo apply_filters('the_content', $item['features']); ?>
                        </div>
                        <div class="button button-component monthly">
                            <a href="<?php echo $item['link']['url']; ?>" title="<?php echo $item['btn_text']; ?>"><?php echo $item['btn_text']; ?></a>
                        </div>
                        <div class="button button-component yearly hidden-item">
                            <a href="<?php echo $item['link_yearly']['url']; ?>" title="<?php echo $item['btn_text']; ?>"><?php echo $item['btn_text']; ?></a>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
            </div>
		</div>
		<?php
    }

    /**
     * Render list widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function content_template()
    {
        ?>
		<div class="custom-pricing-widget">
            <div class="button-filter">
                <a href="#" data-filter="individual" class="filter-swap active">Individuals</a>
                <a href="#" data-filter="business" class="filter-swap">Businesses</a>
            </div>
            <div class="custom-pricing-range-selector">
                <div class="custom-pricing-range-helper">
                    <span class="label">Monthly</span>
                    <label class="switch">
                        <input id="checkSlider" type="checkbox">
                        <span id="switchSlider" data-price="monthly" class="slider round"></span>
                    </label>
                    <span class="label">Yearly</span>
                </div>
            </div>
            <div class="custom-pricing-items">
			                <div class="custom-pricing-item individual  ">
                    <div class="wrapper">
                                                <h3>Free</h3>
                        <div class="text">
                            <p>Explore core features and enjoy high quality streaming for free.</p>
                        </div>
                        <div class="price">
                            <div class="price-item">
                                <div class="price-text monthly">
                                    $0                                </div>
                                <div class="price-text yearly hidden-item">
                                    $0                                </div>
                            </div>
                            <div class="price-saving">
                                                            </div>
                        </div>
                        <div class="features">
                            <ul>
<li>Streann Studio Watermark</li>
<li>Banners</li>
<li>3 on-screen participants</li>
<li>Invite guests</li>
<li>Screen sharing</li>
<li>Stream to social media (Facebook, YouTube, Twitch)</li>
<li>Streaming limits</li>
</ul>
                        </div>
                        <div class="button">
                            <a href="#" title="Sign Up">Sign Up</a>
                        </div>
                    </div>
                </div>
                                <div class="custom-pricing-item individual popular ">
                    <div class="wrapper">
                                                <div class="popular-text">
                            Most Popular                        </div>
                                                <h3>Silver</h3>
                        <div class="text">
                            <p>Dive deeper into streaming, expand your reach and brand.</p>
                        </div>
                        <div class="price">
                            <div class="price-item">
                                <div class="price-text monthly">
                                    $19/mo                                </div>
                                <div class="price-text yearly hidden-item">
                                    $150/yr                                </div>
                            </div>
                            <div class="price-saving">
                                <p><strong>Save $60</strong><br>
billed annually</p>
                            </div>
                        </div>
                        <div class="features">
                            <ul>
<li>&nbsp;5 Guests</li>
<li>&nbsp;Stream to social media (Facebook, YouTube, Twitch)</li>
<li>&nbsp;Chat with guest and private</li>
<li>&nbsp;Screen sharing</li>
<li>&nbsp;Recorded shows</li>
<li>&nbsp;Iframe so you can add the show to your web page</li>
<li>&nbsp;Web Link to share your show with external audiences</li>
</ul>
                        </div>
                        <div class="button">
                            <a href="#" title="Sign Up">Sign Up</a>
                        </div>
                    </div>
                </div>
                                <div class="custom-pricing-item individual  ">
                    <div class="wrapper">
                                                <h3>Gold</h3>
                        <div class="text">
                            <p>Elevate your content with advanced features and full HD.</p>
                        </div>
                        <div class="price">
                            <div class="price-item">
                                <div class="price-text monthly">
                                    $29/mo                                </div>
                                <div class="price-text yearly hidden-item">
                                    $230/yr                                </div>
                            </div>
                            <div class="price-saving">
                                <p>Save $120<br>
billed annually</p>
                            </div>
                        </div>
                        <div class="features">
                            <p><strong>Everything in the Silver plan plus:</strong></p>
<ul>
<li>&nbsp;8 Guests</li>
<li>&nbsp;Tickers</li>
<li>&nbsp;Intro-Outro</li>
<li>&nbsp;PowerPoint (coming soon)</li>
<li>&nbsp;Video Sharing (coming soon)</li>
</ul>
                        </div>
                        <div class="button">
                            <a href="#" title="Sign Up">Sign Up</a>
                        </div>
                    </div>
                </div>
                                <div class="custom-pricing-item business  hidden-item">
                    <div class="wrapper">
                                                <h3>Broadcaster</h3>
                        <div class="text">
                            <p>Up to 5 Licenses</p>
                        </div>
                        <div class="price">
                            <div class="price-item">
                                <div class="price-text monthly">
                                    $595/mo                                </div>
                                <div class="price-text yearly hidden-item">
                                    $5990/yr                                </div>
                            </div>
                            <div class="price-saving">
                                                            </div>
                        </div>
                        <div class="features">
                            <ul class="elementskit-pricing-lists">
<li class="elementor-repeater-item-21be31a">&nbsp;Monthly monetization strategy</li>
<li class="elementor-repeater-item-9c5d77c"><i class="icon icon-check" aria-hidden="true"></i>&nbsp;My Channel Setup</li>
<li class="elementor-repeater-item-f7bcdf0"><i class="icon icon-check" aria-hidden="true"></i>&nbsp;Production Services</li>
<li class="elementor-repeater-item-c41d4bb"><i class="icon icon-check" aria-hidden="true"></i>&nbsp;1:1 Training</li>
<li class="elementor-repeater-item-cf54f9f"><i class="icon icon-check" aria-hidden="true"></i>&nbsp;Project Management</li>
<li class="elementor-repeater-item-86b0351"><i class="icon icon-check" aria-hidden="true"></i>&nbsp;24hs Support</li>
<li class="elementor-repeater-item-0b89948"><i class="icon icon-check" aria-hidden="true"></i>&nbsp;RTMP in</li>
</ul>
                        </div>
                        <div class="button">
                            <a href="#" title="Sign up">Sign up</a>
                        </div>
                    </div>
                </div>
                                <div class="custom-pricing-item business  hidden-item">
                    <div class="wrapper">
                                                <h3>Professional</h3>
                        <div class="text">
                            <p>Up to 10 licenses</p>
                        </div>
                        <div class="price">
                            <div class="price-item">
                                <div class="price-text monthly">
                                    $995/mo                                </div>
                                <div class="price-text yearly hidden-item">
                                    $9950/yr                                </div>
                            </div>
                            <div class="price-saving">
                                                            </div>
                        </div>
                        <div class="features">
                            <p><strong>Everythink in the Broadcaster plan plus:</strong></p>
<ul class="elementskit-pricing-lists">
<li class="elementor-repeater-item-9c5d77c"><i class="icon icon-check" aria-hidden="true"></i>&nbsp;Intro-Outro video</li>
<li class="elementor-repeater-item-f7bcdf0"><i class="icon icon-check" aria-hidden="true"></i>&nbsp;10 Logo Variety per month</li>
<li class="elementor-repeater-item-c41d4bb"><i class="icon icon-check" aria-hidden="true"></i>&nbsp;10 Background per month</li>
</ul>
                        </div>
                        <div class="button">
                            <a href="#" title="Sign Up">Sign Up</a>
                        </div>
                    </div>
                </div>
                            </div>
		</div>
	<?php
    }
}
