<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://heavyweightagency.co.uk/
 * @since      1.0.0
 *
 * @package    Cbl_Better_Reviews
 * @subpackage Cbl_Better_Reviews/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Cbl_Better_Reviews
 * @subpackage Cbl_Better_Reviews/public
 * @author     Heavyweight <enquiries@heavyweightagency.co.uk>
 */
class Cbl_Better_Reviews_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'js/cbl-better-reviews-public.js',
			[],
			$this->version,
			true
		);
	}

	/**
	* Br_likes shortcode
	*/
	public function br_likes_shortcode($atts = []) {
		$type_array = array();
		$output = '';

		// Get the attributes
		$attributes = shortcode_atts([
			'id' => null
		], $atts, 'brlikes');

		// Return the bazaar voice code if we have an id
		if (!empty($attributes['id'])) {
			return apply_filters('brlikes_filter', $attributes['id']);
		}

	}

	/**
	* Br_likes filter to modify html
	* called via apply_filters('brlikes_filter', id='1234');
	*/
	public function brlikes_filter($id, $types, $title) {

		// This will return the html for the br_likes block
  		$new_output .= '<div>';
		$new_output .= '</div>';

		return $new_output;
	}


	/**
	* Br_likes update like
	*/
	public function brlikes_update($id, $types, $title) {

		$post_id = (int)$_REQUEST['post_id'];
		$task = $_REQUEST['task'];
		$ip_address = $this->br_likes_ipaddress();

		$current_user = wp_get_current_user();
		$user_id = (int)$current_user->ID;

		if ( $task == "like" ) {
			$success = $wpdb->query(
						$wpdb->prepare(
							"UPDATE {$wpdb->prefix}br_likes SET
							value = value + 1,
							date_time = '" . date( 'Y-m-d H:i:s' ) . "'
							WHERE post_id = %d AND ip = %s",
							$post_id, $ip_address
						)
					);
		} else {
				$success = $wpdb->query(
							$wpdb->prepare(
								"UPDATE {$wpdb->prefix}br_likes SET
								value = value -1,
								date_time = '" . date( 'Y-m-d H:i:s' ) . "',
								user_id = %d WHERE ip = %s",
								$post_id, $wti_ip_address
							)
						);
		}
	}

	public function br_likes_ipaddress()) {
		if (getenv('HTTP_CLIENT_IP')) {
			$ip = getenv('HTTP_CLIENT_IP');
		} elseif (getenv('HTTP_X_FORWARDED_FOR')) {
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		} elseif (getenv('HTTP_X_FORWARDED')) {
			$ip = getenv('HTTP_X_FORWARDED');
		} elseif (getenv('HTTP_FORWARDED_FOR')) {
			$ip = getenv('HTTP_FORWARDED_FOR');
		} elseif (getenv('HTTP_FORWARDED')) {
			$ip = getenv('HTTP_FORWARDED');
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		return $ip;
	}
}
