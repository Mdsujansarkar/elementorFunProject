<?php
namespace ElementorFunProject\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class DualHeading extends Widget_Base {
 
  /**
   * The widget name.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget name.
   */
  public function get_name() {
    return 'Dual_Heading';
  }
 
  /**
   * Get widget title.
   *
   * Retrieve Blank widget title.
   *
   * @return string Widget title.
   * @since 1.0.0
   * @access public
   *
   */
  public function get_title() {
    return __( 'Dual Heading', 'fun-project' );
  }

  /**
   * Get widget icon.
   *
   * Retrieve Blank widget icon.
   *
   * @return string Widget icon.
   * @since 1.0.0
   * @access public
   *
   */
  public function get_icon() {
    return 'fa fa-header';
  }

  /**
   * Get widget categories.
   *
   * Retrieve the list of categories the Blank widget belongs to.
   *
   * @return array Widget categories.
   * @since 1.0.0
   * @access public
   *
   */
  public function get_categories() {
    return [ 'general' ];
  }

  /**
   * Register Blank widget controls.
   *
   * Adds different input fields to allow the user to change and customize the widget settings.
   *
   * @since 1.0.0
   * @access protected
   */
  protected function _register_controls() {

    $this->register_content_controls();
    $this->register_style_controls();

  }

  /**
   * Register Blank widget content ontrols.
   *
   * Adds different input fields to allow the user to change and customize the widget settings.
   *
   * @since 1.0.0
   * @access protected
   */
  function register_content_controls() {
    $this->start_controls_section(
      'content_section',
      [
        'label' => __( 'Content', 'fun-project' ),
        'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'heading_one',
      [
        'label'       => __( 'Heading One', 'fun-project' ),
        'type'        => \Elementor\Controls_Manager::TEXT,
        'input_type'  => 'text',
        'placeholder' => __( 'Heading One', 'fun-project' ),
        'default'     => __( 'Quick Brown Fox', 'fun-project' ),
      ]
    );

    $this->add_control(
      'heading_two',
      [
        'label'       => __( 'Heading Two', 'fun-project' ),
        'type'        => \Elementor\Controls_Manager::TEXT,
        'input_type'  => 'text',
        'placeholder' => __( 'Heading Two', 'fun-project' ),
        'default'     => __( 'Jumps Over The Lazy Dog', 'fun-project' ),
      ]
    );

    $this->end_controls_section();
  }

  /**
   * Register Blank widget style ontrols.
   *
   * Adds different input fields in the style tab to allow the user to change and customize the widget settings.
   *
   * @since 1.0.0
   * @access protected
   */
  protected function register_style_controls() {

    $this->start_controls_section(
      'style_section_one',
      [
        'label' => __( 'Heading One Style', 'fun-project' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'heading_one_color',
      [
        'label'     => __( 'Color', 'fun-project' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'default'   => '#ff0000',
        'selectors' => [
          '{{WRAPPER}} .heading_one' => 'color: {{VALUE}}'
        ]
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name'     => 'heading_one_typography',
        'label'    => __( 'Typography', 'fun-project' ),
        'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
        'selector' => '{{WRAPPER}} .heading_one',
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'style_section_two',
      [
        'label' => __( 'Heading Two Style', 'fun-project' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'heading_two_color',
      [
        'label'     => __( 'Color', 'fun-project' ),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'default'   => '#0000ff',
        'selectors' => [
          '{{WRAPPER}} .heading_two' => 'color: {{VALUE}}'
        ]
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name'     => 'heading_two_typography',
        'label'    => __( 'Typography', 'fun-project' ),
        'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
        'selector' => '{{WRAPPER}} .heading_two',
      ]
    );

    $this->end_controls_section();

  }

  /**
   * Render Blank widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.0.0
   * @access protected
   */
  protected function render() {

//    $settings   = $this->get_settings_for_display(); //and echo $settings['dummy_text']
    $heading_one = $this->get_settings( 'heading_one' );
    $this->add_render_attribute( 'heading_one', 'class', 'heading_one' );
    $this->add_inline_editing_attributes( 'heading_one' );

    $heading_two = $this->get_settings( 'heading_two' );
    $this->add_render_attribute( 'heading_two', 'class', 'heading_two' );
    $this->add_inline_editing_attributes( 'heading_two' );
    ?>
        <h1>
            <span <?php echo $this->get_render_attribute_string( 'heading_one' ) ?>> <?php echo esc_html( $heading_one ); ?></span>
            <span <?php echo $this->get_render_attribute_string( 'heading_two' ) ?>> <?php echo esc_html( $heading_two ); ?></span>
        </h1>
    <?php


  }

  /**
   * Render Blank widget output on the frontend.
   *
   * Written in JS and used to generate the final HTML.
   *
   * @since 1.0.0
   * @access protected
   */
  protected function _content_template() {
    $this->add_render_attribute( 'heading_one', 'class', 'heading_one' );
    $this->add_inline_editing_attributes( 'heading_one' );

    $this->add_render_attribute( 'heading_two', 'class', 'heading_two' );
    $this->add_inline_editing_attributes( 'heading_two' );

    ?>
        <h1>
            <span <?php echo $this->get_render_attribute_string( 'heading_one' ) ?>> {{ settings.heading_one }}</span>
            <span <?php echo $this->get_render_attribute_string( 'heading_two' ) ?>> {{ settings.heading_two }}</span>
        </h1>
    <?php
  }

}