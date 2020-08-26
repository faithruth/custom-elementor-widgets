<?php

namespace UAP\Custom\Widgets;


use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Exception;

class UAP_Team extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @return string Widget name.
     * @since 1.1.0
     *
     * @access public
     *
     */
    public function get_name()
    {
        return 'uap-team-carousal';
    }

    /**
     * Retrieve the widget title.
     *
     * @return string Widget title.
     * @since 1.1.0
     *
     * @access public
     *
     */
    public function get_title()
    {
        return __('UAP Team Carousal', 'uap-uganda');
    }

    /**
     * Retrieve the widget icon.
     *
     * @return string Widget icon.
     * @since 1.1.0
     *
     * @access public
     *
     */
    public function get_icon()
    {
        return 'fas fa-users';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @return array Widget categories.
     * @since 1.1.0
     *
     * @access public
     *
     */
    public function get_categories()
    {
        return ['basic'];
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
    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'uap-uganda'),
            ]
        );

        $this->add_control(
            'member',
            [
                'label' => __('Member Details', 'uap-uganda'),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'names',
                        'label' => esc_html__( 'Names', 'uap-uganda' ),
                        'type' => Controls_Manager::TEXT
                    ],
                    [
                        'name' => 'title',
                        'label' => esc_html__( 'Title', 'uap-uganda' ),
                        'type' => Controls_Manager::TEXT
                    ],
                    [
                        'name' => 'display_picture',
                        'label' => esc_html__( 'Display Picture', 'uap-uganda' ),
                        'type' => Controls_Manager::MEDIA,
                    ]
                ],
                'default' => [
                    'names' => '',
                    'title' => '',
                    'display_picture' => '',
                ]
            ]
        );

        $this->add_control(
            'member_per_page',
            [
                'label' => __('Members Per Slide', 'uap-uganda'),
                'type' => Controls_Manager::NUMBER,
                'min' => 6,
                'max' => 12,
                'step' => 3,
                'default' => 6,
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @throws Exception
     * @since 1.1.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $pages = ceil( count( $settings['member'] ) / $settings['member_per_page'] );
        include PLUGIN_DIR . '/templates/widgets/team-info.php';
    }
}