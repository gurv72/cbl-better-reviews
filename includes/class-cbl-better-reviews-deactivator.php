<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://heavyweightagency.co.uk/
 * @since      1.0.0
 *
 * @package    Cbl_Better_Reviews
 * @subpackage Cbl_Better_Reviews/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Cbl_Better_Reviews
 * @subpackage Cbl_Better_Reviews/includes
 * @author     Heavyweight <enquiries@heavyweightagency.co.uk>
 */
class Cbl_Better_Reviews_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		Cbl_Better_Reviews_Deactivator::remove_tables();
	}

	public static function remove_tables() {
		global $wpdb;

		$likes_table = $wpdb->prefix . 'br_likes';
		$wpdb->query( 'DROP TABLE IF EXISTS ' . $likes_table );

		$ratings_table = $wpdb->prefix . 'br_ratings';
		$wpdb->query( 'DROP TABLE IF EXISTS ' . $ratings_table );

		$type_table = $wpdb->prefix . 'br_rating_type';
		$wpdb->query( 'DROP TABLE IF EXISTS ' . $type_table );

		$post_type_table = $wpdb->prefix . 'br_post_rating_type';
		$wpdb->query( 'DROP TABLE IF EXISTS ' . $post_type_table );

	}

}
