<?php
/**
 * CWP-MegaR Theme Customizer
 *
 * @package CWP-MegaR
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cwp_megar_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';	/* theme notes */	$wp_customize->add_section( 'codeinwp_theme_notes' , array(		'title'      => __('ThemeIsle theme notes','codeinwp'),		'description' => sprintf( __( "Thank you for being part of this! We've spent almost 6 months building ThemeIsle without really knowing if anyone will ever use a theme or not, so we're very grateful that you've decided to work with us. Wanna <a href='http://themeisle.com/contact/' target='_blank'>say hi</a>?		<br/><br/><a href='http://themeisle.com/documentation-megaresponsive' target='_blank' />View Theme Demo</a> | <a href='http://themeisle.com/forums/forum/megaresponsive-lite' target='_blank'>Get theme support</a>")),		'priority'   => 30,	));	$wp_customize->add_setting(        'cwp_theme_notice'	);	$wp_customize->add_control(    'cwp_theme_notice',    array(        'section' => 'codeinwp_theme_notes',		'type'  => 'read-only',    ));
    /* logo */
$wp_customize->add_section( 'themeslug_logo_section' , array(
    'title'       => __( 'Logo', 'themeslug' ),
    'priority'    => 31,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) );

$wp_customize->add_setting( 'themeslug_logo' );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
    'label'    => __( 'Logo', 'themeslug' ),
    'section'  => 'themeslug_logo_section',
    'settings' => 'themeslug_logo',
) ) );       
    
    
    
    
}
add_action( 'customize_register', 'cwp_megar_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cwp_megar_customize_preview_js() {
	wp_enqueue_script( 'cwp_megar_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'cwp_megar_customize_preview_js' );












