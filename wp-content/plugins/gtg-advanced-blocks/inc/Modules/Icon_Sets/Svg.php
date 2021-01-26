<?php
namespace Gtg_Advanced_Blocks\Modules\Icon_Sets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Svg extends Icon_Set_Base {

	protected $data_file = 'symbol-defs.svg';
	protected $stylesheet_file = 'style.css';
	protected $allowed_zipped_files = [ 'selection.json', 'demo.html', 'Read Mw.txt', 'demo-files/', 'fonts/', 'symbol-defs.svg' ];
	protected $allowed_webfont_extensions = [ 'woff', 'ttf', 'svg', 'eot' ];

	public function get_type() {
		return __( 'Svg', 'gutengeek' );
	}

	public function is_valid() {
		$svg_files = glob( $this->directory . '*.svg' );
		return ! empty( $svg_files );
	}

	protected function extract_svg_list() {
		$files = glob( $this->directory . '*.svg' );

		$svgs = [];
		if ( ! empty( $files ) ) {
			foreach ( $files as $file ) {
				$name = basename( $file, '.svg' );
				$svgs[$name] = [
					'id' => $name,
					'name' => $name,
					'svg' => file_get_contents( $file )
				];
			}
		}

		return $svgs;
	}

	protected function get_url( $filename = '' ) {
		return $this->get_file_url( $this->get_name() . $filename );
	}

	public function get_name() {
		return $icon_name = ! empty( $_REQUEST['icon_name'] ) ? sanitize_title( $_REQUEST['icon_name'] ) : __( 'svg', 'gutengeek' );
	}
}
