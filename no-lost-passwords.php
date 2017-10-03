<?php
/*
Plugin Name:  No Lost Passwords
Plugin URI:   https://github.com/missjwo/no_lostpasswords
Description:  Stop all Lost Passwords emails from being sent. Be warned - every user will be effected.
Version:      1.0.0
Author:       Jenny Wong
Author URI:   https://twitter.com/miss_jwo/
Requires PHP: 7.0
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  no-lost-passwords
Domain Path:  /languages
*/

namespace Miss_Jwo\No_Lost_Passwords;

use WP_Error;

add_action( 'lostpassword_post', 'Miss_Jwo\\No_Lost_Passwords\\lost_password_post' );
add_action( 'login_enqueue_scripts', 'Miss_Jwo\\No_Lost_Passwords\\enqueue_login_style' );

/**
 * Stop all Lost Password emails from being sent.
 */
function lost_password_post( WP_Error $errors ) {
	$errors->add( 'reset-password-disabled', esc_html__( 'Lost Password function is disabled.', 'no-lost-passwords' ) );
}

/**
 * Remove the link using CSS.
 *
 * Nice quick way to check the activation of the plugin.
 */
function enqueue_login_style() {
	wp_enqueue_style( 'miss-jwo-no-lost-passwords', plugins_url( 'no-lost-passwords.css', __FILE__ ));
}

