<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://heavyweightagency.co.uk/
 * @since      1.0.0
 *
 * @package    Cbl_Better_Reviews
 * @subpackage Cbl_Better_Reviews/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cbl_Better_Reviews
 * @subpackage Cbl_Better_Reviews/admin
 * @author     Heavyweight <enquiries@heavyweightagency.co.uk>
 */
class Cbl_Better_Reviews_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Add the settings, and settings page
	 *
	 * @since    1.0.0
	 */

	/**
	* Add plugin admin menu
	*/
	public function add_admin_menu() {
		// Add Pernod Ricard menu if not already added by an existing plugin
		$pr_icon = "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAyNCIgaGVpZ2h0PSIxMDI0IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPiAgPHBhdGggZmlsbD0iIzZiYTdkMiIgaWQ9InN2Z18xIiBkPSJtMjMwLjE0NCw0OTAuMzI1YzY4Ljk4MSwyNS42MjggMTE2LjI5Miw3MC45NjEgMTE2LjI5Miw3MC45NjFjMCwtMjEuNjgzIDUuOTEyLC00My4zNjUgMTMuNzk2LC02MS4xMDJjMCwwIC0yMS42ODMsLTQxLjM4NyAtODguNjk3LC04Ni43MjdjLTcwLjk2MSwtNDkuMjc4IC0xNTEuNzY2LC02MS4xMDIgLTE1MS43NjYsLTYxLjEwMmMtMTUuNzcsMzUuNDc0IC0yNy41OTUsNzIuOTI3IC0zMy41MDcsMTE0LjMxOGMwLC0xLjk2NiA1OS4xMzUsLTkuODU4IDE0My44ODcsMjMuNjQ5bC0wLjAwNSwwLjAwM3ptMTM5Ljk0NSwtMTEuODI1YzExLjgyNSwtMTkuNzEyIDI5LjU2MSwtMzcuNDUzIDQ3LjMwMywtNDkuMjc4YzAsMCAtMjUuNjI4LC03Ni44NzMgLTY1LjA0OCwtMTM0LjAyOXMtMTA0LjQ2OCwtMTA0LjQ2OCAtMTA0LjQ2OCwtMTA0LjQ2OGMtMzEuNTQxLDIzLjY0OSAtNTkuMTM1LDUzLjIxOSAtODIuNzg1LDg0Ljc1MmMwLDAgNjUuMDQ4LDI3LjU5NSAxMTQuMzE4LDc0Ljg5NWM2Ny4wMTUsNjMuMDY5IDkwLjY2NCwxMjguMTE3IDkwLjY2NCwxMjguMTE3bDAuMDE2LDAuMDExem02NS4wMzcsLTU5LjEzNmMxOS43MTIsLTkuODU4IDQ1LjMzMiwtMTcuNzM3IDY4Ljk4MSwtMTkuNzEyYzAsMCAxLjk2NiwtNzIuOTI3IC0xNS43NywtMTQ5LjhjLTE5LjcxMiwtODguNjk3IC00MS4zODcsLTE0My44ODcgLTQxLjM4NywtMTQzLjg4N2MtMzkuNDIsNS45MTIgLTc2Ljg3MywxNy43MzcgLTExMi4zNDcsMzMuNTA3YzAsMCA0MS4zODcsNzguODM5IDYxLjEwMiwxMzIuMDYzYzMxLjU0MSw3NC44OTUgMzkuNDIsMTQ3LjgyNiAzOS40MiwxNDcuODI2bDAuMDAxLDAuMDAzem0yMjguNjM5LDc4LjgzOWM3Ljg4LDE3LjczNyAxMy43OTYsNDEuMzg3IDEzLjc5Niw2MS4xMDJjMCwwIDQ1LjMzMiwtNDMuMzY1IDExNi4yOTIsLTcwLjk2MWM4NC43NTIsLTMxLjU0MSAxNDMuODg3LC0yNS42MjggMTQzLjg4NywtMjUuNjI4Yy01LjkxMiwtMzkuNDIgLTE3LjczNywtNzguODM5IC0zMy41MDcsLTExNC4zMThjMCwwIC04MC44MTEsMTMuNzk2IC0xNTEuNzY2LDYxLjEwMmMtNjUuMDQ4LDQ3LjMwMyAtODguNjk3LDg4LjY5NyAtODguNjk3LDg4LjY5N2wtMC4wMDUsMC4wMDZ6bS01Ny4xNTYsLTcwLjk1OGMxOS43MTIsMTMuNzk2IDM1LjQ3NCwyOS41NjEgNDcuMzAzLDQ5LjI3OGMwLDAgMjMuNjQ5LC02NS4wNDggOTAuNjY0LC0xMjguMTE3YzQ5LjI3OCwtNDcuMzAzIDExNC4zMTgsLTc0Ljg5NSAxMTQuMzE4LC03NC44OTVjLTIzLjY0OSwtMzEuNTQxIC01MS4yNDQsLTYxLjEwMiAtODIuNzg1LC04NC43NTJjMCwwIC02NS4wNDgsNDcuMzAzIC0xMDQuNDY4LDEwNC40NjhjLTQxLjM4Nyw1Ny4xNTYgLTY1LjA0OCwxMzQuMDI5IC02NS4wNDgsMTM0LjAyOWwwLjAxNiwtMC4wMTF6bS0xNy43MzcsLTcuODgxYzAsMCA3Ljg4LC03Mi45MjcgMzcuNDUzLC0xNDkuOGMyMS42ODMsLTUzLjIxOSA2My4wNjksLTEzMi4wNjMgNjMuMDY5LC0xMzIuMDYzYy0zNS40NzQsLTE1Ljc3IC03Mi45MjcsLTI3LjU5NSAtMTEyLjM0NywtMzMuNTA3YzAsMCAtMjEuNjgzLDU1LjE5IC00MS4zODcsMTQzLjg4N2MtMTUuNzcsNzYuODczIC0xNS43NywxNDkuOCAtMTUuNzcsMTQ5LjhjMjMuNjQ5LDEuOTY2IDQ5LjI3OCw5Ljg1OCA2OC45ODEsMjEuNjgzbDAuMDAxLDB6bS0xMzQuMDI5LDI5OS42Yy0yOS41NjEsLTExLjgyNSAtNTUuMTksLTI5LjU2MSAtNzQuODk1LC01NS4xOWMwLDAgLTc0Ljg5NSwtNy44OCAtMTMyLjA2MywxLjk2NmMtODYuNzI3LDE3LjczNyAtMTI0LjE3MSw0Ny4zMDMgLTEyNC4xNzEsNDcuMzAzYzE3LjczNywzNS40NzQgMzkuNDIsNjguOTgxIDY3LjAxNSw5OC41NTZjMCwwIDM1LjQ3NCwtMzMuNTA3IDk2LjU3NiwtNjMuMDY5YzgyLjc4NSwtMzcuNDUzIDE2Ny41MzcsLTI5LjU2MSAxNjcuNTM3LC0yOS41NjFsMC4wMDEsLTAuMDA1em0tODguNjk4LC03NC45MDdjLTkuODU4LC0xOS43MTIgLTE3LjczNywtMzkuNDIgLTE5LjcxMiwtNjMuMDY5YzAsMCAtNjcuMDE1LC0zNy40NTMgLTEzMC4wODMsLTQ3LjMwM2MtODYuNzI3LC0xMS44MjUgLTEzNS45OTYsNS45MTIgLTEzNS45OTYsNS45MTJjMS45NjYsNDEuMzg3IDcuODgsNzguODM5IDE5LjcxMiwxMTYuMjkyYzAsMCA1NS4xOSwtMjcuNTk1IDEyMi4yMDUsLTMxLjU0MWM4NC43NTIsLTMuOTQ2IDE0My44ODcsMTkuNzEyIDE0My44ODcsMTkuNzEybC0wLjAxMywtMC4wMDN6bTE0NS44NTQsODIuNzg1Yy0xNzUuNDE3LDAgLTI3Ny45MTcsMTI4LjExNyAtMjc3LjkxNywxMjguMTE3YzMxLjU0MSwyNS42MjggNjcuMDE1LDQ3LjMwMyAxMDQuNDY4LDY1LjA0OGMwLDAgNTMuMjE5LC0xMDQuNDY4IDE3My40NDksLTEwNC40NjhjMTIyLjIwNSwwIDE3My40NDksMTA0LjQ2OCAxNzMuNDQ5LDEwNC40NjhjMzcuNDUzLC0xNS43NyA3Mi45MjcsLTM5LjQyIDEwNC40NjgsLTY1LjA0OGMwLDAgLTEwMi40ODgsLTEyOC4xMTcgLTI3Ny45MTcsLTEyOC4xMTd6bTEzMi4wNjMsLTYzLjA2OGMtMTkuNzEyLDIzLjY0OSAtNDUuMzMyLDQzLjM2NSAtNzQuODk1LDU1LjE5YzAsMCA4NC43NTIsLTcuODggMTY3LjUzNywzMS41NDFjNjEuMTAyLDI5LjU2MSA5Ni41NzYsNjMuMDY5IDk2LjU3Niw2My4wNjljMjUuNjI4LC0yOS41NjEgNDkuMjc4LC02My4wNjkgNjcuMDE1LC05OC41NTZjMCwwIC0zNy40NTMsLTI5LjU2MSAtMTI0LjE3MSwtNDcuMzAzYy01Ny4xNTYsLTExLjgyNSAtMTMyLjA2MywtMy45NDYgLTEzMi4wNjMsLTMuOTQ2bDAuMDAxLDAuMDA1em0xNjMuNTkxLC0xMzAuMDljLTYxLjEwMiw3Ljg4IC0xMzAuMDgzLDQ3LjMwMyAtMTMwLjA4Myw0Ny4zMDNjLTEuOTY2LDIxLjY4MyAtOS44NTgsNDMuMzY1IC0xOS43MTIsNjMuMDY5YzAsMCA1OS4xMzUsLTIxLjY4MyAxNDMuODg3LC0xNy43MzdjNjcuMDE1LDMuOTQ2IDEyMi4yMDUsMzEuNTQxIDEyMi4yMDUsMzEuNTQxYzExLjgyNSwtMzcuNDUzIDE3LjczNywtNzYuODczIDE5LjcxMiwtMTE2LjI5MmMwLC0xLjk2NiAtNTEuMjQ0LC0xNy43MzcgLTEzNS45OTYsLTcuODhsLTAuMDEzLC0wLjAwNHoiLz48L3N2Zz4=";
		$menu_slug = 'pernod-ricard';
		if ( empty ( $GLOBALS['admin_page_hooks'][$menu_slug] ) ) {
			add_menu_page('Pernod Ricard', 'Pernod Ricard', 'manage_options', $menu_slug, '', $pr_icon);
		}

		// Sub menu
		add_submenu_page( $menu_slug, 'Better reviews', 'Better reviews', 'manage_options', 'betterreviews', array($this, 'render_settings_page'));

		// trick to remove menu page becomming a submenu : https://wordpress.stackexchange.com/a/173476
		remove_submenu_page( $menu_slug, $menu_slug );
    }

	/**
	* Add the settings page. Reference:
	* https://developer.wordpress.org/reference/functions/add_options_page/
	*
	* @since    1.1.0
	*/
	public function add_settings_page() {

		add_options_page(
			'Better Reviews Settings',               	// page title
			'Better Reviews Settings',               	// menu title
			'manage_options',                         	// capability required to access / see it
			$this->plugin_name, 						// slug (needs to be unique)
			array( $this, 'render_settings_page' )    	// callable function to render the page
		);
	}

	/**
	* Render the settings page.
	*/
	public function render_settings_page() {
		$section_name = $this->plugin_name. '_posts_settings';
		$options = get_option($section_name);

		include_once( 'partials/cbl-better-reviews-admin-display.php' );
	}

	/**
	* Register the settings
	*/
	public function register_settings() {
		$section_group = $this->plugin_name;
 		$section_name = $this->plugin_name. '_posts_settings';
		$settings_section = $this->plugin_name. '_options';

		// Add the options section
		if (false == get_option($section_name)) {
			add_option($section_name);
		}

		register_setting(
			$section_group,
			$section_name,
			array(
				'type'         => 'string',
				'description'  => 'Posts which can receive reviews',
				'show_in_rest' => false,
				'default'      => '',
			)
		);

		add_settings_section(
			$settings_section,
 			__( 'Post Types that can have a review', $this->plugin_name),
 			'',
 			$section_group
		);

		add_settings_field(
			$section_name,
			'',
			array( $this, 'render_checkboxes' ),
			$section_group,
			$settings_section
		);

		// Here we get all the selected post types and setup the different option fields
		$this->add_sub_post_fields();

	}

	/**
	* Render checkboxes on the settings page
	*/
	public function render_checkboxes($array) {
		$section_name = $this->plugin_name. '_posts_settings';

		$options = get_option($section_name);
		$args = array(
			'public' => true,
		);
		$post_types = get_post_types( $args, 'objects' );

		foreach ($post_types as $type) {

			$field_name = $type->name;
			$field_label = $type->label;
			$field_value = '';

			if (!empty($options)) {
				if (array_key_exists($field_name, $options)) {
					$field_value = $options[$field_name];
				}
			}

			include __DIR__ . '/partials/cbl-better-reviews-default-checkbox.php';
		}
	}

	/**
	* Add fields for the posts
	*/
	public function add_sub_post_fields() {

		$section_name = $this->plugin_name. '_posts_settings';

		$options = get_option($section_name);

		foreach ($options as $type => $value) {

			$post_section_group = $this->plugin_name.'_settings';
			$post_section_name = $this->plugin_name.'_'.$type;
			$post_settings_section = $this->plugin_name.'_'.$type.'_options';

			// Add the options section
			if (false == get_option($post_section_name)) {
				add_option($post_section_name);
			}

			register_setting(
				$post_section_group,
				$post_section_name,
				array(
					'type'         => 'string',
					'description'  => __( 'Post Types that can have a review', $this->plugin_name),
					'show_in_rest' => false,
					'default'      => '',
				)
			);

			add_settings_section(
				$post_settings_section,
				'',
				'',
				$post_section_group
			);

			$this->add_post_settings_fields($post_section_name, $post_settings_section, $post_section_group, $type);
		}
	}

	/**
	* Add the post settings fields
	*/
	public function add_post_settings_fields($section_name, $settings_section, $section_group, $type) {

		$post_type_obj = get_post_type_object($type);
		$label = $post_type_obj->labels->name;

		add_settings_field(
			$settings_section,
			$label,
			array( $this, 'render_post_fields'),
			$section_group,
			$settings_section,
			array($section_name, $type)
		);
	}


	/**
	* Render the post settings fields
	*/
	public function render_post_fields($array) {
		$section_name = $array[0];
		$type = $array[1];
		$options = get_option($section_name);

		if (isset($options['subtype'])) {
			$subtypes = $options['subtype'];
		}

		$fields = $this->get_post_fields();

		foreach ($fields as $field_name => $field_value) {

			if (!empty($options)) {
				if (array_key_exists($field_value, $options)) {
					$field_text = $options[$field_value];
				}
			}

			include __DIR__ . '/partials/cbl-better-reviews-text.php';
		}

		include __DIR__ . '/partials/cbl-better-reviews-list.php';

	}

	/**
	* List of fields to return
	*/
	private function get_post_fields() {

		// These all need to be translatable, not sure this is the best way of doing this but will revisit

		$fields = array(
				__( 'Review Label', $this->plugin_name) => 'review_label',
				__( 'Average Score Label', $this->plugin_name) => 'average_score_label',
				__( 'CTA Label', $this->plugin_name) => 'cta_label'
		);

		return $fields;
	}

	/**
	* Update the option when form is submitted
	*/
	public function update_settings() {
		register_setting($this->plugin_name, $this->plugin_name);
	}

}
