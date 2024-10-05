<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class CustomPricingTable extends \Elementor\Widget_Base
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
    return 'custom-pricing-table';
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
    return esc_html__('Custom Pricing Table', 'streann');
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
    return ['basic'];
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
    return ['table', 'pricing'];
  }

  public function get_style_depends()
  {
    return ['custom-pricing-table-style'];
  }

  public function get_script_depends()
  {
    return ['custom-pricing-table-script'];
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
      'header_section',
      [
        'label' => esc_html__('Header', 'streann'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'main_title',
      [
        'label' => esc_html__('Main Title', 'streann'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'placeholder' => esc_html__('Enter your title', 'streann'),
        'ai' => [
          'active' => false,
        ],
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'title_column_section',
      [
        'label' => esc_html__('Columns: Main Title Specs', 'streann'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'main_column_titles',
      [
        'label' => esc_html__('Specs Titles', 'streann'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
          [
            'name' => 'specs',
            'label' => esc_html__('Specs Text', 'streann'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => esc_html__('Specs Text', 'streann'),
            'default' => esc_html__('Specs Text', 'streann'),
            'ai' => [
              'active' => false,
            ],
          ]
        ],
        'default' => [
          [
            'specs' => esc_html__('Specs Text #1', 'streann'),
          ],
          [
            'specs' => esc_html__('Specs Text #2', 'streann'),
          ],
        ],
        'title_field' => '{{{ specs }}}',
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'service_column_section',
      [
        'label' => esc_html__('Columns: Services', 'streann'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'services',
      [
        'label' => esc_html__('Services', 'streann'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
          [
            'name' => 'title',
            'label' => esc_html__('Service Title', 'streann'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => esc_html__('Service Title', 'streann'),
            'default' => esc_html__('Service Title', 'streann'),
            'ai' => [
              'active' => false,
            ],
          ],
          [
            'name' => 'price',
            'label' => esc_html__('Service Price', 'streann'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => esc_html__('Service Price', 'streann'),
            'default' => esc_html__('Service Price', 'streann'),
            'ai' => [
              'active' => false,
            ],
          ],
          [
            'name' => 'description',
            'label' => esc_html__('Service Description', 'streann'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'placeholder' => esc_html__('Service Title', 'streann'),
            'default' => esc_html__('Service Title', 'streann'),
          ],
          [
            'name' => 'specs',
            'label' => esc_html__('Specs List', 'streann'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => [
              [
                'name' => 'list_title',
                'label' => esc_html__('Title', 'streann'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('List Title', 'streann'),
                'label_block' => true,
              ],
              [
                'name' => 'list_icon',
                'label' => esc_html__('Show Icon instead of Text', 'streann'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'streann'),
                'label_off' => esc_html__('No', 'streann'),
                'return_value' => 'yes',
                'default' => 'no',
              ]
            ],
            'default' => [
              [
                'list_title' => esc_html__('Specs #1', 'streann'),
              ],
              [
                'list_title' => esc_html__('Specs #2', 'streann'),
              ],
            ],
            'title_field' => '{{{ list_title }}}',
          ]
        ],
        'default' => [
          [
            'text' => esc_html__('Service Title #1', 'streann'),
          ],
          [
            'text' => esc_html__('Service Title #2', 'streann'),
          ],
        ],
        'title_field' => '{{{ title }}}',
      ]
    );

    $this->end_controls_section();
  }

  public function render_option($option, $icon)
  {
    $curated_option = strtolower($option);
    switch ($curated_option) {
      case 'yes':
        if ($icon === 'no') {
          return '<p>' . $option . '</p>';
        } else {
          return '<span class="checkmark-option"><img src="' . get_stylesheet_directory_uri() . '/img/check.svg" alt="' . $option . '" /></span>';
        }
        break;
      case 'empty':
        return '<span class="empty-value"></span>';
        break;
      default:
        return '<p>' . $option . '</p>';
        break;
    }
  }

  public function render_empty_option_class($option)
  {
    $curated_option = strtolower($option);
    if ($curated_option === 'empty') {
      return 'empty-option';
    } else {
      return '';
    }
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
    $services = $settings['services'];
    foreach ($services as $service) {
      $service_titles[] = $service['title'];
    }
    $i = 1;
    foreach ($settings['main_column_titles'] as $specs) {
      $service_item_titles[$i] = $specs['specs'];
      $i++;
    }
?>
    <section class="main-custom-pricing-table">
      <div class="container">
        <main class="main-custom-pricing-table__header">
          <div class="main-custom-pricing-title main-title">
            <p><?php echo esc_html($settings['main_title']); ?></p>
          </div>
          <?php foreach ($service_titles as $key => $value) { ?>
            <div class="main-custom-pricing-title">
              <p><?php echo esc_html($value); ?></p>
            </div>
          <?php } ?>
        </main>
        <div class="main-custom-pricing-table__content">
          <div class="main-column-titles">
            <?php $i = 1; ?>
            <?php foreach ($settings['main_column_titles'] as $titles) { ?>
              <?php if ($i === 1) { ?>
                <div class="main-column-title main-column-title-pricing">
                  <?php echo esc_html_e('Pricing', 'streann'); ?>
                </div>
                <div class="main-column-title">
                  <?php echo esc_html($titles['specs']); ?>
                </div>
              <?php } else { ?>
                <div class="main-column-title">
                  <?php echo esc_html($titles['specs']); ?>
                </div>
              <?php } ?>
              <?php $i++; ?>
            <?php } ?>
          </div>
          <?php $counter_service = 1; ?>
          <?php foreach ($services as $service) { ?>
            <?php $i = 1; ?>
            <div class="main-column-services">
              <?php foreach ($service['specs'] as $titles) { ?>
                <?php if ($i === 1) { ?>
                  <div class="main-column-title-item-hidden <?php echo ($counter_service === 2) ? 'show' : ''; ?>">
                    <?php echo esc_html_e('Pricing', 'streann'); ?>
                  </div>
                  <div class="main-column-title-item main-column-title-item-pricing">
                    <?php echo esc_html('$' . number_format((float) $service['price'], 2, '.', ',') . '/mo'); ?>
                  </div>
                  <div class="main-column-title-item-hidden <?php echo ($counter_service === 2) ? 'show' : ''; ?>">
                    <?php echo esc_html($service_item_titles[$i]); ?>
                  </div>
                  <div class="main-column-title-item <?php echo esc_attr($this->render_empty_option_class($titles['list_title'])); ?>">
                    <?php echo $this->render_option($titles['list_title'], $titles['list_icon']); ?>
                  </div>
                <?php } else { ?>
                  <div class="main-column-title-item-hidden <?php echo ($counter_service === 2) ? 'show' : ''; ?>">
                    <?php echo esc_html($service_item_titles[$i]); ?>
                  </div>
                  <div class="main-column-title-item <?php echo esc_attr($this->render_empty_option_class($titles['list_title'])); ?>">
                    <?php echo $this->render_option($titles['list_title'], $titles['list_icon']); ?>
                  </div>
                <?php } ?>
                <?php $i++; ?>
              <?php } ?>
            </div>
            <?php $counter_service++; ?>
          <?php } ?>
        </div>
      </div>
    </section>
<?php
    $content = ob_get_clean();
    echo $content;
  }
}
