<?php
// namespace ElementorPro\Modules\Woocommerce\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Base;
use ElementorPro\Core\Utils;
use ElementorPro\Modules\QueryControl\Module as Query_Module;



use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_BestSelling_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve list widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'list';
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
    public function get_title() {
        return esc_html__( 'Best Selling', 'elementor-list-widget' );
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
    public function get_icon() {
        return 'eicon-bullet-list';
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
    public function get_categories() {
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
    public function get_keywords() {
        return [ 'list', 'lists', 'ordered', 'unordered' ];
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
    public function get_custom_help_url() {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget promotion data.
     *
     * Retrieve the widget promotion data.
     *
     * @since 1.0.0
     * @access protected
     * @return array Widget promotion data.
     */
    protected function get_upsale_data() {
        return [
            'condition' => true,
            'image' => esc_url( ELEMENTOR_ASSETS_URL . 'images/go-pro.svg' ),
            'image_alt' => esc_attr__( 'Upgrade', 'elementor-list-widget' ),
            'title' => esc_html__( 'Promotion heading', 'elementor-list-widget' ),
            'description' => esc_html__( 'Get the premium version of the widget with additional styling capabilities.', 'elementor-list-widget' ),
            'upgrade_url' => esc_url( 'https://example.com/upgrade-to-pro/' ),
            'upgrade_text' => esc_html__( 'Upgrade Now', 'elementor-list-widget' ),
        ];
    }

    /**
     * Register list widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {


        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Query', 'textdomain' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
            ]
        );
         $this->add_control(
            'query',
            [
                'label' => esc_html__( 'Query', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' =>4,
                'placeholder' => esc_html__( '1', 'textdomain' ),
            ]
        );

         $this->add_control(
            'rows',
            [
                'label' => esc_html__( 'Rows', 'elementor-pro' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 4,
                'render_type' => 'template',
                'range' => [
                    'px' => [
                        'max' => 20,
                    ],
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'List Content', 'elementor-list-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        /* Start repeater */

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'elementor-list-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'List Item', 'elementor-list-widget' ),
                'default' => esc_html__( 'List Item', 'elementor-list-widget' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'elementor-list-widget' ),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        // danng

        // $this->start_controls_section(
        //     'section_content',
        //     [
        //         'label' => esc_html__( 'Content', 'textdomain' ),
        //         'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        //     ]
        // );

        // $this->add_control(
        //     'title',
        //     [
        //         'label' => esc_html__( 'Title', 'textdomain' ),
        //         'type' => \Elementor\Controls_Manager::TEXT,
        //         'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
        //     ]
        // );

        // $this->end_controls_section();

        // danng

        /* End repeater */

        $this->add_control(
            'list_items',
            [
                'label' => esc_html__( 'List Items', 'elementor-list-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),           /* Use our repeater */
                'default' => [
                    [
                        'text' => esc_html__( 'List Item #1', 'elementor-list-widget' ),
                        'link' => '',
                    ],
                    [
                        'text' => esc_html__( 'List Item #2', 'elementor-list-widget' ),
                        'link' => '',
                    ],
                    [
                        'text' => esc_html__( 'List Item #3', 'elementor-list-widget' ),
                        'link' => '',
                    ],
                ],
                'title_field' => '{{{ text }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'marker_section',
            [
                'label' => esc_html__( 'List Marker', 'elementor-list-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'marker_type',
            [
                'label' => esc_html__( 'Marker Type', 'elementor-list-widget' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'ordered' => [
                        'title' => esc_html__( 'Ordered List', 'elementor-list-widget' ),
                        'icon' => 'eicon-editor-list-ol',
                    ],
                    'unordered' => [
                        'title' => esc_html__( 'Unordered List', 'elementor-list-widget' ),
                        'icon' => 'eicon-editor-list-ul',
                    ],
                    'other' => [
                        'title' => esc_html__( 'Custom List', 'elementor-list-widget' ),
                        'icon' => 'eicon-edit',
                    ],
                ],
                'default' => 'ordered',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'marker_content',
            [
                'label' => esc_html__( 'Custom Marker', 'elementor-list-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter custom marker', 'elementor-list-widget' ),
                'default' => '🧡',
                'condition' => [
                    'marker_type[value]' => 'other',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-list-widget-text::marker' => 'content: "{{VALUE}}";',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_content_section',
            [
                'label' => esc_html__( 'List Style', 'elementor-list-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'elementor-list-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-list-widget-text' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-list-widget-text > a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'icon_typography',
                'selector' => '{{WRAPPER}} .elementor-list-widget-text, {{WRAPPER}} .elementor-list-widget-text > a',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow',
                'selector' => '{{WRAPPER}} .elementor-list-widget-text',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_marker_section',
            [
                'label' => esc_html__( 'Marker Style', 'elementor-list-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'marker_color',
            [
                'label' => esc_html__( 'Color', 'elementor-list-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-list-widget-text::marker' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'marker_spacing',
            [
                'label' => esc_html__( 'Spacing', 'elementor-list-widget' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'selectors' => [
                    // '{{WRAPPER}} .elementor-list-widget' => 'padding-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .elementor-list-widget' => 'padding-inline-start: {{SIZE}}{{UNIT}};',
                ],
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
    protected function render() {
        

        $settings = $this->get_settings_for_display();
        $html_tag = [
            'ordered' => 'ol',
            'unordered' => 'ul',
            'other' => 'ul',
        ];
        $columns    = isset($settings['columns']) ? $settings['columns'] : 4;
        $rows       = isset($settings['rows']) ? $settings['rows'] : 4;
        echo'<pre>';

        $posts_per_page = $settings['posts_per_page'] ?? intval( $columns * $rows );
        //var_dump($settings);
        echo'</pre>';


      

        $settings = $this->get_settings_for_display();

       

        $args = [
            'posts_per_page' => 4,
            'columns' => 4,
            'columns' => 4,
            // 'orderby' => $settings['orderby'],
            // 'order' => $settings['order'],
        ];

        if ( ! empty( $settings['posts_per_page'] ) ) {
            $args['posts_per_page'] = $settings['posts_per_page'];
        }

        if ( ! empty( $settings['columns'] ) ) {
            $args['columns'] = $settings['columns'];
        }

        $args = array_map( 'sanitize_text_field', $args );




        ob_start();

        echo '<h2 class="home-label"> Bán chạy </h2>';


        echo '<div class="woocommerce">'; // needed for default styles 
        $top_selling_products = wc_get_products( array(
            'meta_key' => 'total_sales', // our custom query meta_key
            'return'   => 'ids', // needed to pass to $post_object
            'orderby'  => array( 'meta_value_num' => 'DESC', 'title' => 'ASC' ), // order from highest to lowest of top sellers
        ) );
        if ( $top_selling_products ) {
            do_action( 'woocommerce_before_shop_loop' );
            woocommerce_product_loop_start();
            foreach ( $top_selling_products as $top_selling_product ) {
                $post_object = get_post( $top_selling_product );
                setup_postdata( $GLOBALS['post'] =& $post_object );
                do_action( 'woocommerce_shop_loop' );
            
                wc_get_template_part( 'content', 'product' );

            }
            wp_reset_postdata();
            woocommerce_product_loop_end();
            do_action( 'woocommerce_after_shop_loop' );
        } else {
            do_action( 'woocommerce_no_products_found' );
        }
        echo '</div><!-- .woocommerce -->';




        $related_products_html = ob_get_clean();

        if ( $related_products_html ) {
            $related_products_html = str_replace( '<ul class="products', '<ul class="products elementor-grid', $related_products_html );

            // PHPCS - Doesn't need to be escaped since it's a WooCommerce template, and 3rd party plugins might hook into it.
            echo $related_products_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }


       //  $this->add_render_attribute( 'list', 'class', 'elementor-list-widget' );

    }

    /**
     * Render list widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function content_template() {
        ?>
        <#
        html_tag = {
            'ordered': 'ol',
            'unordered': 'ul',
            'other': 'ul',
        };
        view.addRenderAttribute( 'list', 'class', 'elementor-list-widget' );
        #>
        <{{{ html_tag[ settings.marker_type ] }}} {{{ view.getRenderAttributeString( 'list' ) }}}>
            <# _.each( settings.list_items, function( item, index ) {
                const repeater_setting_key = view.getRepeaterSettingKey( 'text', 'list_items', index );
                view.addRenderAttribute( repeater_setting_key, 'class', 'elementor-list-widget-text' );
                view.addInlineEditingAttributes( repeater_setting_key );
                #>
                <li {{{ view.getRenderAttributeString( repeater_setting_key ) }}}>
                    <# const title = item.text; #>
                    <# if ( item.link ) { #>
                        <# view.addRenderAttribute( `link_${index}`, item.link ); #>
                        <a href="{{ item.link.url }}" {{{ view.getRenderAttributeString( `link_${index}` ) }}}>
                            {{{title}}}
                        </a>
                    <# } else { #>
                        {{{title}}}
                    <# } #>
                </li>
            <# } ); #>
        </{{{ html_tag[ settings.marker_type ] }}}>
        <?php
    }

}