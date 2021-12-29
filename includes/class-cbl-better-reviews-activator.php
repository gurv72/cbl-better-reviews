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
		Cbl_Better_Reviews_Activator::setup_database();
	}

	public static function setup_database() {
		global $wpdb;

		// Here we add the table for likes

		$create_statement = "CREATE TABLE " . $wpdb->prefix . 'br_likes' . " (
			`id` bigint(11) NOT NULL AUTO_INCREMENT,
			`post_id` int(11) NOT NULL,
			`value` int(2) NOT NULL,
			`date_time` datetime NOT NULL,
			`ip` varchar(40) NOT NULL,
			`user_id` int(11) NOT NULL DEFAULT '0',
			PRIMARY KEY (`id`)
		)";

		$wpdb->query( $create_statement );

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

		post_rating_types:
		  post_type
		  rating_type
		  display_order
		*/
	}

}
