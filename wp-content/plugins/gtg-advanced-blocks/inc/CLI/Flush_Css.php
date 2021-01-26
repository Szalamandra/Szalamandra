<?php

namespace Gtg_Advanced_Blocks\CLI;

use Gtg_Advanced_Blocks\Abstracts\AbstractCLI;

class Flush_Css extends AbstractCLI {
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
		return 'flush_css';
	}

	public static function invoke( $args, $assoc_args ) {
		global $wp_filesystem;
		$wp_upload_dir			= wp_upload_dir();
		$static_css_path = trailingslashit( $wp_upload_dir['basedir'] ) . 'gutengeek';
		if ( is_dir( $static_css_path ) ) {
			$wp_filesystem->rmdir( $static_css_path, true );
		}
	}
}
