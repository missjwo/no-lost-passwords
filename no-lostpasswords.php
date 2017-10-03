<?php
/*
Plugin Name:  No Lost Passwords
Plugin URI:
Description:  Stop all Lost Passwords emails from being sent. Bewarned - every user will be effected.
Version:      1.0.0
Author:       Jenny Wong
Author URI:   jwong.co.uk
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  no-lostpasswords
Domain Path:  /languages
*/


/**
 * Stop all Lost Password emails from being sent.
 */
if ( ! function_exists( 'nolostpasswords_lostpassword_post' ) ) {

	function nolostpasswords_lostpassword_post() {
		wp_die( 'Forgot Your Password function is disabled.' );
	}

}

add_action( 'lostpassword_post', 'nolostpasswords_lostpassword_post' );


/**
 * Remove the link using CSS.
 *
 * Nice quick way to check the activation of the plugin.
 */
function nolostpasswords_enqueue_login_style() {

	wp_enqueue_style( 'nolostpasswords', plugins_url( 'nolostpasswords.css', __FILE__ ), false );

}

add_action( 'login_enqueue_scripts', 'nolostpasswords_enqueue_login_style' );