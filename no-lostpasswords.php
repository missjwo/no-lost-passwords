<?php
/*
Plugin Name:  No Lost Passwords
Plugin URI:   https://github.com/missjwo/no_lostpasswords
Description:  Stop all Lost Passwords emails from being sent. Bewarned - every user will be effected.
Version:      1.0.0
Author:       Jenny Wong
Author URI:   https://twitter.com/miss_jwo/
Requires PHP: 7.0
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  no-lostpasswords
Domain Path:  /languages
*/



namespace NoLostPasswords;

setup();

function setup() {

	add_action( 'lostpassword_post', 'NoLostPasswords\lostpassword_post', 10, 1 );
	add_action( 'login_enqueue_scripts', 'NoLostPasswords\enqueue_login_style' );

}


/**
 * Stop all Lost Password emails from being sent.
 */

function lostpassword_post( \WP_Error $errors ) {

	$errors->add( 'reset-password-disabled', __('Lost Password function is disabled.', 'no-lostpasswords') );

}


/**
 * Remove the link using CSS.
 *
 * Nice quick way to check the activation of the plugin.
 */
function enqueue_login_style() {

	wp_enqueue_style( 'nolostpasswords', plugins_url( 'nolostpasswords.css', __FILE__ ), false );

}

