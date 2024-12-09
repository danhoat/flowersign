<?php


use Elementor\Plugin;
use Elementor\Shapes;
use Elementor\Utils;

use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Typography;


use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

function ov_get_attachment_image_html( $settings, $image_size_key = 'image', $image_key = null ) {
        if ( ! $image_key ) {
            $image_key = $image_size_key;
        }

        $image = $settings[ $image_key ];

        // Old version of image settings.
        if ( ! isset( $settings[ $image_size_key . '_size' ] ) ) {
            $settings[ $image_size_key . '_size' ] = '';
        }

        $size = $settings[ $image_size_key . '_size' ];

        $image_class = ! empty( $settings['hover_animation'] ) ? 'elementor-animation-' . $settings['hover_animation'] : '';

        $html = '';

        // If is the new version - with image size.
        $image_sizes = get_intermediate_image_sizes();

        $image_sizes[] = 'full';

        if ( ! empty( $image['id'] ) && ! wp_attachment_is_image( $image['id'] ) ) {
            $image['id'] = '';
        }

        $is_static_render_mode = Plugin::$instance->frontend->is_static_render_mode();

        // On static mode don't use WP responsive images.
        if ( ! empty( $image['id'] ) && in_array( $size, $image_sizes ) && ! $is_static_render_mode ) {
            $image_class .= " attachment-$size size-$size wp-image-{$image['id']}";
            $image_attr = [
                'class' => trim( $image_class ),
            ];

            $html .= wp_get_attachment_image( $image['id'], $size, false, $image_attr );
        } else {
            $image_src = wp_get_attachment_image_src( $image['id'], 'full' );

            // if ( ! $image_src && isset( $image['url'] ) ) {
            //     $image_src = $image['url'];
            // }

            if ( ! empty( $image_src ) ) {
                $image_class_html = ! empty( $image_class ) ? ' class="' . esc_attr( $image_class ) . '"' : '';

                $html .= sprintf(
                    '<img src="%1$s" title="%2$s" alt="%3$s"%4$s loading="lazy" />',
                    esc_url( $image_src ),
                    // esc_attr( Control_Media::get_image_title( $image ) ),
                    // esc_attr( Control_Media::get_image_alt( $image ) ),
                    $image_class_html
                );
            }
        }

        /**
         * Get Attachment Image HTML
         *
         * Filters the Attachment Image HTML
         *
         * @since 2.4.0
         * @param string $html the attachment image HTML string
         * @param array  $settings       Control settings.
         * @param string $image_size_key Optional. Settings key for image size.
         *                               Default is `image`.
         * @param string $image_key      Optional. Settings key for image. Default
         *                               is null. If not defined uses image size key
         *                               as the image key.
         */
        return apply_filters( 'elementor/image_size/get_attachment_image_html', $html, $settings, $image_size_key, $image_key );
    }
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Banner_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'boxbannera';
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
    public function get_title() {
        return esc_html__( 'Box Image Banner', 'elementor-oembed-widget' );
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
    public function get_icon() {
        return 'eaicon-img'; // eicon-code 
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
    public function get_categories() {
        return [ 'general' ];
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
    public function get_keywords() {
        return ['title', 'image', 'link' ];
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
     * Register oEmbed widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function register_controls() {
        $this->start_controls_section(
            'section_image',
            [
                'label' => esc_html__( 'Image Box', 'elementor' ),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Choose Image', 'elementor' ),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            'image-size',
            [
                'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'default' => 'full',
                'condition' => [
                    'image[url]!' => '',
                ],
            ]
        );

        $this->add_control(
            'title_text',
            [
                'label' => esc_html__( 'Title', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => esc_html__( 'This is the heading', 'elementor' ),
                'placeholder' => esc_html__( 'Enter your title', 'elementor' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description_text',
            [
                'label' => esc_html__( 'Description', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
                'placeholder' => esc_html__( 'Enter your description', 'elementor' ),
                'rows' => 10,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'elementor' ),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_size',
            [
                'label' => esc_html__( 'Title HTML Tag', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'div' => 'div',
                    'span' => 'span',
                    'p' => 'p',
                ],
                'default' => 'h3',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_box',
            [
                'label' => esc_html__( 'Box', 'elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'position',
            [
                'label' => esc_html__( 'Image Position', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'top',
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'elementor' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'top' => [
                        'title' => esc_html__( 'Top', 'elementor' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'elementor' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'prefix_class' => 'elementor-position-',
                'toggle' => false,
                'condition' => [
                    'image[url]!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_vertical_alignment',
            [
                'label' => esc_html__( 'Vertical Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'top' => [
                        'title' => esc_html__( 'Top', 'elementor' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'middle' => [
                        'title' => esc_html__( 'Middle', 'elementor' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'bottom' => [
                        'title' => esc_html__( 'Bottom', 'elementor' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'top',
                'toggle' => false,
                'prefix_class' => 'elementor-vertical-align-',
                'condition' => [
                    'position!' => 'top',
                ],
            ]
        );

        $this->add_responsive_control(
            'text_align',
            [
                'label' => esc_html__( 'Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'elementor' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'elementor' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'elementor' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'elementor' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image-box-wrapper' => 'text-align: {{VALUE}};',
                ],
                'separator' => 'after',
            ]
        );

        $this->add_responsive_control(
            'image_space',
            [
                'label' => esc_html__( 'Image Spacing', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                'default' => [
                    'size' => 15,
                ],
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}.elementor-position-right .elementor-image-box-img' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.elementor-position-left .elementor-image-box-img' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.elementor-position-top .elementor-image-box-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '(mobile){{WRAPPER}} .elementor-image-box-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'image[url]!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_bottom_space',
            [
                'label' => esc_html__( 'Content Spacing', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'custom' ],
                'range' => [
                    'px' => [
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
                'selectors' => [
                    '{{WRAPPER}} .elementor-image-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_image',
            [
                'label' => esc_html__( 'Image', 'elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'image[url]!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_size',
            [
                'label' => esc_html__( 'Width', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 30,
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                'range' => [
                    '%' => [
                        'min' => 5,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image-box-wrapper .elementor-image-box-img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .elementor-image-box-img img',
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .elementor-image-box-img img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs( 'image_effects' );

        $this->start_controls_tab(
            'normal',
            [
                'label' => esc_html__( 'Normal', 'elementor' ),
            ]
        );

        $this->add_group_control(
            'image-size',
            [
                'name' => 'css_filters',
                'selector' => '{{WRAPPER}} .elementor-image-box-img img',
            ]
        );

        $this->add_control(
            'image_opacity',
            [
                'label' => esc_html__( 'Opacity', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image-box-img img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'hover',
            [
                'label' => esc_html__( 'Hover', 'elementor' ),
            ]
        );

        $this->add_group_control(
            'css-filter',
            [
                'name' => 'css_filters_hover',
                'selector' => '{{WRAPPER}}:hover .elementor-image-box-img img',
            ]
        );

        $this->add_control(
            'image_opacity_hover',
            [
                'label' => esc_html__( 'Opacity', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover .elementor-image-box-img img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'background_hover_transition',
            [
                'label' => esc_html__( 'Transition Duration', 'elementor' ) . ' (s)',
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0.3,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-image-box-img img' => 'transition-duration: {{SIZE}}s',
                ],
            ]
        );

        $this->add_control(
            'hover_animation',
            [
                'label' => esc_html__( 'Hover Animation', 'elementor' ),
                'type' => Controls_Manager::HOVER_ANIMATION,
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__( 'Content', 'elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_title',
            [
                'label' => esc_html__( 'Title', 'elementor' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-image-box-title' => 'color: {{VALUE}};',
                ],
                'global' => [
                    'default' => Global_Colors::COLOR_PRIMARY,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .elementor-image-box-title',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
            ]
        );

        $this->add_group_control(
            'text-stroke',
            [
                'name' => 'title_stroke',
                'selector' => '{{WRAPPER}} .elementor-image-box-title',
            ]
        );

        $this->add_group_control(
            'text-shadow',
            [
                'name' => 'title_shadow',
                'selector' => '{{WRAPPER}} .elementor-image-box-title',
            ]
        );

        $this->add_control(
            'heading_description',
            [
                'label' => esc_html__( 'Description', 'elementor' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__( 'Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-image-box-description' => 'color: {{VALUE}};',
                ],
                'global' => [
                    'default' => Global_Colors::COLOR_TEXT,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .elementor-image-box-description',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
            ]
        );

        $this->add_group_control(
            'text-shadow',
            [
                'name' => 'description_shadow',
                'selector' => '{{WRAPPER}} .elementor-image-box-description',
            ]
        );

        $this->end_controls_section();
    }
    protected function register_controls111() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content 123', 'elementor-oembed-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Heading Title', 'elementor-oembed-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'textarea',
                'placeholder' => 'title'
            ]
        );

        $possible_tags = [
            'h1' => 'H1',
            'h2' => 'h2',
            'h3' => 'h3',
            'h4' => 'h4',
            'h5' => 'h5',
            'h6' => 'h6',
            'label' => 'label',
            'p' => 'p',
            'span' => 'span ' . esc_html__( '(link)', 'elementor' )
        ];

        $options = [
            '' => esc_html__( 'Default', 'elementor' ),
        ] + $possible_tags;

        $this->add_control(
            'html_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'elementor' ),
                'type' => 'select',
                'options' => $options,
            ]
        );

          $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Image', 'elementor' ),
                'type' => 'image',
               // 'options' => $options,
            ]
        );
        $this->end_controls_section();

       // Image.
        $this->start_controls_section(
            'section_style_testimonial_image',
            [
                'label' => esc_html__( 'Image', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'testimonial_image[url]!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_size',
            [
                'label' => esc_html__( 'Image Resolution', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img',
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

       

        $this->end_controls_section();

    }

    /**
     * Print safe HTML tag for the element based on the element settings.
     *
     * @return void
     */
    protected function print_html_tag() {
        $html_tag = $this->get_settings( 'html_tag' );

        if ( empty( $html_tag ) ) {
            $html_tag = 'div';
        }

        Utils::print_validated_html_tag( $html_tag );
    }


    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $has_image = ! empty( $settings['image']['url'] );
        $has_content = ! Utils::is_empty( $settings['title_text'] ) || ! Utils::is_empty( $settings['description_text'] );

        if ( ! $has_image && ! $has_content ) {
            return;
        }

        $html = '<div class="elementor-image-box-wrapper">';

        if ( ! empty( $settings['link']['url'] ) ) {
            $this->add_link_attributes( 'link', $settings['link'] );
        }

        if ( $has_image ) {

            $image_html = wp_kses_post( ov_get_attachment_image_html( $settings, 'thumbnail', 'image' ) );

            if ( ! empty( $settings['link']['url'] ) ) {
                $image_html = '<a ' . $this->get_render_attribute_string( 'link' ) . ' tabindex="-1">' . $image_html . '</a>';
            }

            $html .= '<figure class="elementor-image-box-img">' . $image_html . '</figure>';
        }

        if ( $has_content ) {
            $html .= '<div class="elementor-image-box-content">';

            if ( ! Utils::is_empty( $settings['title_text'] ) ) {
                $this->add_render_attribute( 'title_text', 'class', 'elementor-image-box-title' );

                $this->add_inline_editing_attributes( 'title_text', 'none' );

                $title_html = $settings['title_text'];

                if ( ! empty( $settings['link']['url'] ) ) {
                    $title_html = '<a ' . $this->get_render_attribute_string( 'link' ) . '>' . $title_html . '</a>';
                }

                $html .= sprintf( '<%1$s %2$s>%3$s</%1$s>', Utils::validate_html_tag( $settings['title_size'] ), $this->get_render_attribute_string( 'title_text' ), $title_html );
            }

            if ( ! Utils::is_empty( $settings['description_text'] ) ) {
                $this->add_render_attribute( 'description_text', 'class', 'elementor-image-box-description' );

                $this->add_inline_editing_attributes( 'description_text' );

                $html .= sprintf( '<p %1$s>%2$s</p>', $this->get_render_attribute_string( 'description_text' ), $settings['description_text'] );
            }

            $html .= '</div>';
        }

        $html .= '</div>';

        Utils::print_unescaped_internal_string( $html );
    }

}