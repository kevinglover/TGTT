<?php
/**
 * Custom functions
 */

function tgtt_theme_customizer( $wp_customize ) {

	//shortname
    $wp_customize->add_section( 'tgtt_shortname_section' , array(
	    'title'       => __( 'Short Site Name', 'tgtt' ),
	    'priority'    => 25,
	    'description' => 'Enter a short or abbreviated site name for your site title. This will appear in the placeholder text for the search component.',
	) );
	$wp_customize->add_setting( 'tgtt_shortname' );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tgtt_shortname', array(
	    'label'    => __( 'Short Site Name', 'tgtt' ),
	    'section'  => 'tgtt_shortname_section',
	    'settings' => 'tgtt_shortname',
	) ) );	

	//logo
    $wp_customize->add_section( 'tgtt_logo_section' , array(
	    'title'       => __( 'Logo', 'tgtt' ),
	    'priority'    => 30,
	    'description' => 'Upload a logo to replace the default site name and description in the header',
	) );
	$wp_customize->add_setting( 'tgtt_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tgtt_logo', array(
	    'label'    => __( 'Logo', 'tgtt' ),
	    'section'  => 'tgtt_logo_section',
	    'settings' => 'tgtt_logo',
	) ) );

}
add_action('customize_register', 'tgtt_theme_customizer');

$args = array(
	'name'          => __( 'Home Sidebar', 'tgtt' ),
	'id'            => 'home-sidebar',
	'description'   => '',
        'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' );

register_sidebar( $args );