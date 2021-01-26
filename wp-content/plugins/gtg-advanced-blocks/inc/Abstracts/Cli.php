<?php
/**
 * Plugin OneClick class
 *
 * @package LexusGuten\
 */

namespace Gtg_Advanced_Blocks\Abstracts;

use Gtg_Advanced_Blocks\CLI;

class AbstractCLI {

	/**
	 * comamnd name
	 */
	public $name;

	/**
	 * constructor
	 */
	public function __construct() {
		$this->name = $this->set_command_name();
	}

	/**
	 * set command name
	 */
	protected function set_command_name() {
		return '';
	}

	/**
	 * retrive command name
	 */
	public function get_command_name() {
		return $this->name;
	}

	/**
	 * output content
	 */
	public function output( $filename = '', $content = '', $style = '' ) {
		global $wp_filesystem;
		$file = trailingslashit( CLI::get_export_path() ) . ( $style ? $style . '/' . $filename : $filename );
		return CLI::write_output( $file, $content );
	}

}
