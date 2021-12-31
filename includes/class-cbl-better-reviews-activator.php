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

		// Likes table
		$create_likes_statement = "CREATE TABLE " . $wpdb->prefix . 'br_likes' . " (
			`id` bigint(11) NOT NULL AUTO_INCREMENT,
			`post_id` int(11) NOT NULL,
			`date_time` datetime NOT NULL,
			`ip` varchar(40) NOT NULL,
			PRIMARY KEY (`id`)
		)";

		$wpdb->query( $create_likes_statement );

		// Rating table
		$create_ratings_statement = "CREATE TABLE " . $wpdb->prefix . 'br_ratings' . " (
			`id` bigint(11) NOT NULL AUTO_INCREMENT,
			`post_id` int(11) NOT NULL,
			`rating_type_id` int(11) NOT NULL,
			`score` int(2) NOT NULL,
			`date_time` datetime NOT NULL,
			PRIMARY KEY (`id`)
		)";

		$wpdb->query( $create_ratings_statement );

		// Rating type table
		$create_ratings_type_statement = "CREATE TABLE " . $wpdb->prefix . 'br_rating_type' . " (
			`id` bigint(11) NOT NULL AUTO_INCREMENT,
			`label` varchar(40) NULL,
			`description` varchar(40) NULL,
			`required` varchar(40) NULL,
			PRIMARY KEY (`id`)
		)";

		$wpdb->query( $create_ratings_type_statement );

		// Rating type table
		$create_post_ratings_type_statement = "CREATE TABLE " . $wpdb->prefix . 'br_post_rating_type' . " (
			`id` bigint(11) NOT NULL AUTO_INCREMENT,
			`post_type` varchar(40) NULL,
			`rating_type` varchar(40) NULL,
			`display_order` varchar(40) NULL,
			PRIMARY KEY (`id`)
		)";

		$wpdb->query( $create_post_ratings_type_statement );

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
