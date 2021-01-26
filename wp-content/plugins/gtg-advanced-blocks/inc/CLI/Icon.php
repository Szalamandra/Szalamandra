<?php

namespace Gtg_Advanced_Blocks\CLI;

use Gtg_Advanced_Blocks\Abstracts\AbstractCLI;

class Icon extends AbstractCLI {
	/**
	 * constructor
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * set command name
	 *
	 * @return string
	 */
	public function set_command_name() {
		return 'icon';
	}

	/**
     * Import GutenGeek Custom Icons CLI
     *
     * ## OPTIONS
     *
     * [--source]
     * : Whether or not to greet the person with success or error.
     * ---
     * default: false
     * ---
     *
     * ## EXAMPLES
     *
     *     wp gutengeek icon import --source=jenik-sources/custom-icons/jenik-icons.json
     *
     * @when after_wp_load
     */
	public static function import( $args, $assoc_args ) {
		$source = ! empty( $assoc_args['source'] ) ? $assoc_args['source'] : false;
		global $wpdb;
		global $wp_filesystem;

		if ( ! file_exists( $source ) && ! file_exists( trailingslashit( ABSPATH ) . $source ) ) {
			\WP_CLI::error( __( 'No custom icons file found', 'gutengeek' ) );
			return;
		}

		$file = file_exists( $source ) ? $source : trailingslashit( ABSPATH ) . $source;

		$json_data = json_decode( $wp_filesystem->get_contents( $file ), true );

		$icon_id = false;
		$exist = $wpdb->get_col( $wpdb->prepare( "SELECT icon_id FROM {$wpdb->prefix}gtg_block_icons WHERE icon_dir_name = %s", $json_data['key_name'] ) );
		if ( $exist ) {
			$icon_id = $exist;
		} else {
			$status = $wpdb->insert(
				$wpdb->prefix . 'gtg_block_icons',
				$data,
				array(
					'%s',
					'%s',
					'%d',
					'%s'
				)
			);

			if ( ! $status ) {
				\WP_CLI::error( __( 'Import custom font failed', 'gutengeek' ) );
			}

			$icon_id = $status ? $wpdb->insert_id : false;
		}

		$data = array(
			'icon_dir_name' => $json_data['key_name'],
			'icon_name' => $json_data['icon_set_name'],
			'icon_user_id' => 1,
			'icon_status' => 'publish'
		);

		if ( $icon_id ) {
			$custom_icons = \Gtg_Advanced_Blocks\Modules\CustomIcons::get_options();
			$json_data['id'] = $icon_id;
			$custom_icons[$json_data['icon_set_name']] = $json_data;
			\Gtg_Advanced_Blocks\Modules\CustomIcons::update_options( $custom_icons );
			\WP_CLI::success( sprintf( __( '%s imported as ID %d', 'gutengeek' ), $json_data['icon_set_name'], $icon_id ) );
		} else {
			\WP_CLI::error( __( 'Import custom font failed', 'gutengeek' ) );
		}
	}

	/**
     * Export GutenGeek Custom Icons CLI
     *
     * ## OPTIONS
     *
     * [--export-path]
     * : Whether or not to greet the person with success or error.
     * ---
     * default: false
     * ---
     *
     * ## EXAMPLES
     *
     *     wp gutengeek icon export --export-path=jenik-sources/custom-icons
     *
     * @when after_wp_load
     */
	public static function export( $args, $assoc_args ) {
		global $wp_filesystem;
		$path = ! empty( $assoc_args['export-path'] ) ? $assoc_args['export-path'] : false;

		if ( ! $path ) {
			\WP_CLI::error( __( 'Export path is required', 'gutengeek' ) );
			return;
		}

		$custom_icons = gtg_get_custom_icons();
		if ( ! $custom_icons ) {
			\WP_CLI::success( __( 'No custom icons found', 'gutengeek' ) );

			return;
		}

		$export_path = $path;
		if ( strpos( $path, ABSPATH ) === false ) {
			$export_path = trailingslashit( ABSPATH ) . $path;
		}

		if ( is_dir( $export_path ) && ! is_writable( $export_path ) ) {
			\WP_CLI::error( sprintf( __( '%1$s is not writeable', 'gutengeek' ), $path ) );
			return;
		}

		if ( ! is_dir( $export_path ) ) {
			wp_mkdir_p( $export_path );
		}

		// loop $custom_icons
		foreach ( $custom_icons as $key => $icon ) {
			$file = trailingslashit( $export_path ) . $icon['key_name'] . '.json';
			$wp_filesystem->put_contents( $file, json_encode( $icon ) );

			\WP_CLI::success( sprintf( __( '%s exported successful', 'gutengeek' ), $icon['icon_set_name'] ) );
		}
	}

}
