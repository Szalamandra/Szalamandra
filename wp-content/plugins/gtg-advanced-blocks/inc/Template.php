<?php
/**
 * Template
 *
 * @package Gtg_Advanced_Blocks
 */

namespace Gtg_Advanced_Blocks;

defined( 'ABSPATH' ) || exit();

class Template {

	/**
	 * GutenGeek Template.
	 *
	 * @since 1.0.5
	 */
	public function __construct() {
		// Add default template without wrapper
		add_filter( 'template_include', [ $this, 'template_include' ] );

		// Add GutenGeek supported Post type in page template
        $post_types = get_post_types();
		if( $post_types ){
			foreach ( $post_types as $post_type ) {
				add_filter( "theme_{$post_type}_templates", [ $this, 'add_templates' ] );
			}
		}
	}

	/**
	 * @param $template
	 * @since 1.0.5
	 */
	public function template_include($template) {
		if ( is_singular() ) {
			$page_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
			if ( $page_template === 'gutengeek-fullwidth' ) {
				$template = GTG_AB_DIR . 'templates/template-fullwidth.php';
            }
            if ( $page_template === 'gutengeek-offcanvas' ) {
				$template = GTG_AB_DIR . 'templates/template-offcanvas.php';
			}
		}
		return $template;
	}

	/**
	 * theme support template callback
	 *
	 * @param $post_templates
	 * @since 1.0.5
	 */
	public function add_templates( $post_templates ) {
		$post_templates['gutengeek-fullwidth'] = __( 'GutenGeek Full Width', 'gutengeek' );
		$post_templates['gutengeek-offcanvas'] = __( 'GutenGeek Canvas', 'gutengeek' );
		return $post_templates;
	}
}

new Template();
