<?php
namespace ElementorFunProject\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class FunProject extends Widget_Base {
 
  /**
   * Retrieve the widget name.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget name.
   */
  public function get_name() {
    return 'FunProject';
  }
 
  /**
   * Retrieve the widget title.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget title.
   */
  public function get_title() {
    return __( 'Fun Project', 'fun-project' );
  }
 
  /**
   * Retrieve the widget icon.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget icon.
   */
  public function get_icon() {
    return 'fa fa-pencil';
  }
 
  /**
   * Retrieve the list of categories the widget belongs to.
   *
   * Used to determine where to display the widget in the editor.
   *
   * Note that currently Elementor supports only one category.
   * When multiple categories passed, Elementor uses the first one.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return array Widget categories.
   */
  public function get_categories() {
    return [ 'general' ];
  }
 
  /**
   * Register the widget controls.
   *
   * Adds different input fields to allow the user to change and customize the widget settings.
   *
   * @since 1.1.0
   *
   * @access protected
   */
  protected function _register_controls() {
    $this->start_controls_section(
      'section_content',
      [
        'label' => __( 'Content', 'fun-project' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );
    $this->add_control(
      'image',
      [
        'label' => __( 'Choose Image', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );
 
    $this->add_control(
      'title',
      [
        'label' => __( 'Title', 'fun-project' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( 'Separate settings per breakpoint', 'fun-project' ),
      ]
    );
 
    $this->add_control(
      'description',
      [
        'label' => __( 'Description', 'fun-project' ),
        'type' => Controls_Manager::TEXTAREA,
        'default' => __( 'Donec id ornare dui. Aenean tristique condimentum elit, quis blandit nisl varius sit amet. Sed eleifend felis quis massa viverra', 'fun-project' ),
      ]
    );
 
    $this->add_control(
      'content',
      [
        'label' => __( 'Content', 'fun-project' ),
        'type' => Controls_Manager::WYSIWYG,
        'default' => __( 'Content', 'fun-project' ),
      ]
    );
 
 
    $this->end_controls_section();
  }
 
  /**
   * Render the widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.1.0
   *
   * @access protected
   */
  protected function render() {
    $settings = $this->get_settings_for_display();
 
    $this->add_inline_editing_attributes( 'title', 'none' );
    $this->add_inline_editing_attributes( 'description', 'basic' );
    $this->add_render_attribute( 'title', 'class', 'title' );
    $this->add_render_attribute( 'description', 'class', 'description' );
    ?>
    <div class="fun-project">
    <div class="container">
        <div class="Modern-Slider">
            <!-- Item -->
            <div class="item">
              <div class="img-fill">
                <img src="<?php echo $settings['image']['url']; ?>" alt="">
                <div class="info">
                  <div>
                    <h3  <?php echo $this->get_render_attribute_string( 'title' ); ?> >
                      <?php echo $settings['title']; ?>
                      
                    </h3>
                    <h5 <?php echo $this->get_render_attribute_string( 'description' ); ?> >
                      <?php echo $settings['description']; ?>
                        
                      </h5>
                  </div>
                </div>
              </div>
            </div>
            <!-- // Item -->
          </div>
    </div>
</div>

    <?php
  }
 
  /**
   * Render the widget output in the editor.
   *
   * Written as a Backbone JavaScript template and used to generate the live preview.
   *
   * @since 1.1.0
   *
   * @access protected
   */
  protected function _content_template() {
    ?>
    <#
    view.addInlineEditingAttributes( 'title', 'none' );
    view.addInlineEditingAttributes( 'description', 'basic' );
    #>
    <img src="{{ settings.image.url }}">
    <h2 {{{ view.getRenderAttributeString( 'title' ) }}}>{{{ settings.title }}}</h2>
    <div {{{ view.getRenderAttributeString( 'description' ) }}}>{{{ settings.description }}}</div>
  
    <?php
  }
}