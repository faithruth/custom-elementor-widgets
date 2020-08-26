<?php

namespace UAP\Custom\Widgets;


use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Exception;

class UAP_Recent_Posts extends Widget_Base
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
        return 'uap-recent-posts';
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
        return __('UAP Recent Posts', 'uap-uganda');
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
        return 'eicon-post-list';
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
            'posts',
            [
                'label' => __('Number of Posts', 'uap-uganda'),
                'type' => Controls_Manager::NUMBER,
                'default' => 2
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Posts Per Page', 'uap-uganda'),
                'type' => Controls_Manager::NUMBER,
                'default' => 2
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

        $posts = get_posts(
            array(
                'post_type' => 'post',
                'numberposts'      => $settings['posts'],
                'orderby'          => 'date',
            )
        );

        include PLUGIN_DIR . '/templates/widgets/recent-posts.php';
    }
}