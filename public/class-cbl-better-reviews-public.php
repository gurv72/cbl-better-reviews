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
	public function brlikes_shortcode($atts = []) {
		$type_array = array();
		$output = '';
		$post_id = get_the_ID();

		// Get the attributes, not sure what we need here yet
		$attributes = shortcode_atts([
			'id' => null
		], $atts, 'brlikes');

		// Return likes code
		return apply_filters('brlikes_filter', $post_id);

	}

	/**
	* Br_ratings shortcode
	*/
	public function brratting_shortcode($atts = []) {
		$type_array = array();
		$output = '';
		$post_id = get_the_ID();

		// Get the attributes, not sure what we need here yet
		$attributes = shortcode_atts([
			'id' => null
		], $atts, 'brratings');

		// Return likes code
		return apply_filters('brratings_filter', $post_id);

	}

	/**
	* Br_likes filter to modify html
	* called via apply_filters('brlikes_filter');
	*/
	public function brlikes_filter($id) {
		$new_output = '';
		$no_of_likes = $this->get_number_likes($id);

		// This will return the html for the br_likes block
  		$new_output .= '<div>';
		$new_output .= '
			<form name="" action="/" method="post">
				<label>Like the post here</label>
				<input type="hidden" name="post_id" value="'.$id.'">
				<input type="hidden" name="task" value="like">
				<input type="submit">
			</form>
		';

		if ($no_of_likes > 0) {
			$new_output .= '<div>';
			$new_output .= 'Number of likes ';
			$new_output .= $no_of_likes;
			$new_output .= '</div>';
		}

		$new_output .= '</div>';

		return $new_output;
	}

	/**
	* Br_rating filter to modify html
	* called via apply_filters('brlikes_filter');
	*/
	public function brratings_filter($id) {
		$new_output = '';
		$average_rating = $this->get_average_rating($id);

		// This will return the html for the br_likes block
  		$new_output .= '<div>';
		$new_output .= '
			<form name="" action="/" method="post">
				<label>Add your rating here</label>
				<input type="hidden" name="post_id" value="'.$id.'">
				<input type="hidden" name="task" value="like">
				<input type="text" name="rating_value" value="">
				<input type="submit">
			</form>
		';
		if ($average_rating > 0) {
			$new_output .= '<div>';
			$new_output .= 'Average rating for this page<br />';
			$new_output .= $this->get_number_likes($id);
			$new_output .= '</div>';
		}

		$new_output .= '</div>';

		return $new_output;
	}


	/**
	* Br_likes update like
	*/
	public function brlikes_update() {
		global $wpdb;

		// Get the variables passed in by form
		$post_id = (int)$_REQUEST['post_id'];
		$task = $_REQUEST['task'];

		// Set the variables
		$ip_address = $this->br_likes_ipaddress();
		$date = date( 'Y-m-d H:i:s' );

		if ( $task == "like" ) {
			$success = $wpdb->query(
				$wpdb->prepare(
					"INSERT INTO {$wpdb->prefix}br_likes (`post_id`,`date_time`, `ip`)
					VALUES (%d, %s, %s)",
					$post_id, $date, $ip_address
				)
			);
		}
	}

	/**
	* Br_likes update like
	*/
	public function brratings_update() {
		global $wpdb;

		// Get the variables passed in by form
		$post_id = (int)$_REQUEST['post_id'];
		$rating_value = (int)$_REQUEST['rating_value'];
		$task = $_REQUEST['task'];

		// Set the variables
		$ip_address = $this->br_likes_ipaddress();
		$date = date( 'Y-m-d H:i:s' );

		if ( $task == "like" ) {
			$success = $wpdb->query(
				$wpdb->prepare(
					"INSERT INTO {$wpdb->prefix}br_ratings (`post_id`, `value`,`date_time`, `ip`)
					VALUES (%d, %d, %s, %s)",
					$post_id, $rating_value, $date, $ip_address
				)
			);
		}
	}

	/**
	* Br_likes update like
	*/
	public function get_number_likes($post_id) {
		global $wpdb;

		$posts = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT id FROM {$wpdb->prefix}br_likes
				WHERE post_id = %d",
				$post_id
			)
		);

		$post_count = count($posts);

		return $post_count;
	}
	/**
	* Br_likes update like
	*/
	public function get_average_rating($post_id) {
		global $wpdb;

		$posts = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT value FROM {$wpdb->prefix}br_likes
				WHERE post_id = %d",
				$post_id
			)
		);

		$post_count = count($posts);

		$value = 0;
		foreach ($posts as $post) {
			$value = $value+$post->value;
		}

		if ($value > 0) {
			return round($value/$post_count);
		}

		return 0;
	}

	public function br_likes_ipaddress() {
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
