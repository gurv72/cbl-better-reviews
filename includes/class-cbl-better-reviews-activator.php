<?php

/**
 * Fired during plugin activation
 *
 * @link	   https://heavyweightagency.co.uk/
 * @since	  1.0.0
 *
 * @package	Cbl_Better_Reviews
 * @subpackage Cbl_Better_Reviews/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since	  1.0.0
 * @package	Cbl_Better_Reviews
 * @subpackage Cbl_Better_Reviews/includes
 * @author	 Heavyweight <enquiries@heavyweightagency.co.uk>
 */
class Cbl_Better_Reviews_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since	1.0.0
	 */
	public static function activate() {
		$this->setup_database();
	}

	private function setup_database() {
		global $wpdb;

		//$table_name = $wpdb->prefix . 'br_rating';
		/*
		We need three tables; rating, rating_type, post_rating_types
		rating:
		  post_id
		  rating_type_id
		  score

		rating_type:
		  id
		  label
		  description
		  required

		post_rating_types:z
		  post_type
		  rating_type
		  display_order
		*/
	}

}
