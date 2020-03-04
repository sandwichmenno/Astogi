<?php
require 'inc/textarea-custom-control.php';

function cd_customizer_settings( $wp_customize ) {
    $wp_customize->add_section( 'theme_colors' , array(
        'title'      => 'Theme colors',
        'priority'   => 30,
    ) );

    $wp_customize->add_section( 'theme_buttons' , array(
        'title'      => 'Theme buttons',
        'priority'   => 30,
    ) );

    $wp_customize->add_section( 'theme_top' , array(
        'title'      => 'Top section',
        'priority'   => 30,
    ) );

    $wp_customize->add_section( 'theme_features' , array(
        'title'      => 'Features section',
        'priority'   => 30,
    ) );

    $wp_customize->add_section( 'theme_plans' , array(
        'title'      => 'Pricing section',
        'priority'   => 30,
    ) );

    $wp_customize->add_section( 'theme_contact' , array(
        'title'      => 'Contact section',
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'main_color' , array('default' => '#4E54C8',) );
    $wp_customize->add_setting( 'secondary_color' , array('default' => '#2A2D34',) );
    $wp_customize->add_setting( 'light_text' , array('default' => '#ffffff',) );
    $wp_customize->add_setting( 'dark_text' , array('default' => '#2A2D34',) );

    $wp_customize->add_setting( 'secondary_button' , array('default' => '#2A2D34',) );
    $wp_customize->add_setting( 'secondary_button_hover' , array('default' => '#000000',) );
    $wp_customize->add_setting( 'secondary_button_color' , array('default' => '#ffffff',) );
    $wp_customize->add_setting( 'secondary_button_color_hover' , array('default' => '#ffffff',) );

    $wp_customize->add_setting( 'primary_button' , array('default' => '#ffffff',) );
    $wp_customize->add_setting( 'primary_button_hover' , array('default' => '#eeeeee',) );
    $wp_customize->add_setting( 'primary_button_color' , array('default' => '#4E54C8',) );
    $wp_customize->add_setting( 'primary_button_color_hover' , array('default' => '#4E54C8',) );

    $wp_customize->add_setting( 'logo' , array('default' => get_bloginfo('template_url').'/images/logo-white.svg'));
    $wp_customize->add_setting( 'splash_image' , array('default' => get_bloginfo('template_url').'/images/placeholder.png'));
    $wp_customize->add_setting( 'primary_cta' , array('default' => 'Primary CTA'));
    $wp_customize->add_setting( 'secondary_cta' , array('default' => 'Secondary CTA'));
    $wp_customize->add_setting( 'primary_cta_url' , array('default' => '/'));
    $wp_customize->add_setting( 'secondary_cta_url' , array('default' => '/'));
    $wp_customize->add_setting( 'top_intro_text' , array('default' => 'Text here'));
    $wp_customize->add_setting( 'top_intro_title' , array('default' => 'Leuke, pakkende, en coole titel voor <strong>NameTBD</strong>'));

    $wp_customize->add_setting( 'features_intro_text' , array('default' => 'Text here'));
    $wp_customize->add_setting( 'features_intro_title' , array('default' => 'Deze service helpt je met <strong>super coole dingen</strong>'));

    $wp_customize->add_setting( 'plans_intro_text' , array('default' => 'Text here'));
    $wp_customize->add_setting( 'plans_intro_title' , array('default' => 'Kijk een hoe <strong>super betaalbaar</strong> deze service is!'));

    $wp_customize->add_setting( 'contact_intro_text' , array('default' => 'Text here'));
    $wp_customize->add_setting( 'contact_intro_title' , array('default' => 'Voor als mensen contact willen <strong>opnemen</strong>'));
    $wp_customize->add_setting( 'contact_phone' , array('default' => '+31 6 12345678'));
    $wp_customize->add_setting( 'contact_email' , array('default' => 'zander@nametbd.frl'));
    $wp_customize->add_setting( 'contact_address' , array('default' => 'straat 69 plaats 1234AB'));

    /*Theme colors*/
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_color', array(
        'label'        => 'Main color',
        'section'    => 'theme_colors',
        'settings'   => 'main_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
        'label'        => 'Secondary color',
        'section'    => 'theme_colors',
        'settings'   => 'secondary_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'light_text', array(
        'label'        => 'Light text',
        'section'    => 'theme_colors',
        'settings'   => 'light_text',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_text', array(
        'label'        => 'Dark text',
        'section'    => 'theme_colors',
        'settings'   => 'dark_text',
    ) ) );

    /*Primary button*/
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_button', array(
        'label'        => 'Primary button',
        'section'    => 'theme_buttons',
        'settings'   => 'primary_button',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_button_hover', array(
        'label'        => 'Primary button hover',
        'section'    => 'theme_buttons',
        'settings'   => 'primary_button_hover',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_button_color', array(
        'label'        => 'Primary button text',
        'section'    => 'theme_buttons',
        'settings'   => 'primary_button_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_button_color_hover', array(
        'label'        => 'Primary button text hover',
        'section'    => 'theme_buttons',
        'settings'   => 'primary_button_color_hover',
    ) ) );

    /*Secondary button*/
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_button', array(
        'label'        => 'Secondary button',
        'section'    => 'theme_buttons',
        'settings'   => 'secondary_button',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_button_hover', array(
        'label'        => 'Secondary button hover',
        'section'    => 'theme_buttons',
        'settings'   => 'secondary_button_hover',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_button_color', array(
        'label'        => 'Secondary button text',
        'section'    => 'theme_buttons',
        'settings'   => 'secondary_button_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_button_color_hover', array(
        'label'        => 'Secondary button text hover',
        'section'    => 'theme_buttons',
        'settings'   => 'secondary_button_color_hover',
    ) ) );

    /*Top section*/
    /*Logo*/
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
        'label' => 'Logo',
        'section'	=> 'theme_top',
    ) ) );

    /*Splash image*/
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'splash_image', array(
        'label' => 'Splash image',
        'section'	=> 'theme_top',
    ) ) );

    /*CTA Text*/
    $wp_customize->add_control( 'primary_cta', array(
        'label' => 'Primary CTA',
        'section'	=> 'theme_top',
        'type'	 => 'text',
    ) );

    $wp_customize->add_control( 'secondary_cta', array(
        'label' => 'Secondary CTA',
        'section'	=> 'theme_top',
        'type'	 => 'text',
    ) );

    /*CTA Url*/
    $wp_customize->add_control( 'primary_cta_url', array(
        'label' => 'Primary CTA url',
        'section'	=> 'theme_top',
        'type'	 => 'text',
    ) );

    $wp_customize->add_control( 'secondary_cta_url', array(
        'label' => 'Secondary CTA url',
        'section'	=> 'theme_top',
        'type'	 => 'text',
    ) );

    /*Intro*/
    $wp_customize->add_control( new Textarea_Custom_Control( $wp_customize, 'top_intro_text', array(
        'label' => 'Intro text',
        'section'	=> 'theme_top',
    ) ) );

    $wp_customize->add_control( 'top_intro_title', array(
        'label' => 'Intro title',
        'section'	=> 'theme_top',
    ) );

    /*Features*/
    $wp_customize->add_control( new Textarea_Custom_Control( $wp_customize, 'features_intro_text', array(
        'label' => 'Intro text',
        'section'	=> 'theme_features',
    ) ) );

    $wp_customize->add_control( 'features_intro_title', array(
        'label' => 'Intro title',
        'section'	=> 'theme_features',
    ) );

    /*Pricing*/
    $wp_customize->add_control( new Textarea_Custom_Control( $wp_customize, 'plans_intro_text', array(
        'label' => 'Intro text',
        'section'	=> 'theme_plans',
    ) ) );

    $wp_customize->add_control( 'plans_intro_title', array(
        'label' => 'Intro title',
        'section'	=> 'theme_plans',
    ) );

    /*Contact*/
    $wp_customize->add_control( new Textarea_Custom_Control( $wp_customize, 'contact_intro_text', array(
        'label' => 'Intro text',
        'section'	=> 'theme_contact',
    ) ) );

    $wp_customize->add_control( 'contact_intro_title', array(
        'label' => 'Intro title',
        'section'	=> 'theme_contact',
    ) );

    $wp_customize->add_control( 'contact_phone', array(
        'label' => 'Phone',
        'section'	=> 'theme_contact',
        'type'	 => 'text',
    ) );

    $wp_customize->add_control( 'contact_email', array(
        'label' => 'Email',
        'section'	=> 'theme_contact',
        'type'	 => 'text',
    ) );

    $wp_customize->add_control( 'contact_address', array(
        'label' => 'Address',
        'section'	=> 'theme_contact',
        'type'	 => 'text',
    ) );
}
add_action( 'customize_register', 'cd_customizer_settings' );

function cd_customizer_css()
{
    ?>
    <style type="text/css">
        section.top-section, section.page-section.dark, section.page-section.dark:after, footer.page-footer, .menu-wrapper {
            background: <?php echo get_theme_mod('secondary_color', '#2A2D34'); ?>;
        }

        section.top-section:before, #plans .plan .plan-header {
            background: <?php echo get_theme_mod('main_color', '#4E54C8'); ?>;
        }

        section#contact .info h2 {
            color: <?php echo get_theme_mod('main_color', '#4E54C8'); ?>;
        }

        .button.secondary {
            background: <?php echo get_theme_mod('secondary_button', '#2A2D34'); ?>;
            color: <?php echo get_theme_mod('secondary_button_color', '#ffffff'); ?>;
        }

        .button.secondary:hover {
            background: <?php echo get_theme_mod('secondary_button_hover', '#000000'); ?>;
            color: <?php echo get_theme_mod('secondary_button_color_hover', '#ffffff'); ?>;
        }

        .button.primary {
            background: <?php echo get_theme_mod('primary_button', '#ffffff'); ?>;
            color: <?php echo get_theme_mod('primary_button_color', '#4E54C8'); ?>;
        }

        .button.primary:hover {
            background: <?php echo get_theme_mod('primary_button_hover', '#eeeeee'); ?>;
            color: <?php echo get_theme_mod('primary_button_color_hover', '#4E54C8'); ?>;
        }

        section.top-section .main-info h1, section.top-section .main-info p, .page-header-wrapper .menu li.menu-item a,
        section.page-section.dark .intro h1, section.page-section.dark .intro p, #plans .plan .plan-header, footer.page-footer {
            color: <?php echo get_theme_mod('light_text', '#ffffff'); ?>;
        }

        .menu-wrapper .menu li a {
            color: <?php echo get_theme_mod('light_text', '#ffffff'); ?>;
            border-bottom: solid 1px <?php echo get_theme_mod('main_color', '#ffffff'); ?>;
        }

        body {
            color: <?php echo get_theme_mod('dark_text', '#2A2D34'); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'cd_customizer_css');