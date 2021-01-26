<?php
/**
 * Block_Assets.
 *
 * @package Gtg_Advanced_Blocks
 */

namespace Gtg_Advanced_Blocks;

defined( 'ABSPATH' ) || exit();

class Block_Assets {

	public static $instance = null;

	public $google_font_url = '';

	public $page_blocks = [];

	public static function instance() {
		if ( !self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct() {
		// Frontend assets
		add_action( 'enqueue_block_assets', [ $this, 'enqueue_block_assets' ] );
		// Editor assets
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_editor_assets' ] );

		add_action( 'wp_head', [ $this, 'generate_block_style' ], 80 );
		// generate script in footer
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_scripts' ], 1000 );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_custom_style' ], 999999 );
		add_filter( 'gutengeek_localize_scripts', [ $this, 'add_icon_localize_scripts' ], 10, 1 );
		add_filter( 'gutengeek_localize_frontend_scripts', [ $this, 'add_icon_localize_scripts' ], 10, 1 );
	}

	/**
	 * Enqueue Gutenberg block assets for both frontend + backend.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_block_assets() {

		// before enqueue block assets
		do_action( 'gutengeek_enqueue_block_assests' );

		if ( !wp_script_is( 'jquery', 'enqueued' ) ) {
			wp_enqueue_script( 'jquery' );
		}

		// Styles.
		wp_enqueue_style( 'gutengeek-block-css', GTG_AB_URL . 'assets/css/frontend/blocks.build.css', [], GTG_AB_VER );
		// Scripts.
		wp_enqueue_script( 'gutengeek-masonry', GTG_AB_URL . 'assets/js/libs/isotope.min.js', [ 'jquery' ], GTG_AB_VER, false );

		wp_enqueue_script( 'gutengeek-imagesloaded', GTG_AB_URL . 'assets/js/libs/imagesloaded.min.js', [ 'jquery' ], GTG_AB_VER, false );

		// Scripts.
		wp_enqueue_script( 'gutengeek-fitvids-js', GTG_AB_URL . 'assets/js/libs/fitvids.min.js', [ 'jquery' ], GTG_AB_VER, false );

		// Styles.
		wp_enqueue_style( 'gutengeek-slick-css', GTG_AB_URL . 'assets/css/libs/slick.css', [], GTG_AB_VER );

		// Styles.
		wp_enqueue_style( 'gutengeek-animate-css', GTG_AB_URL . 'assets/css/libs/animate.min.css', [], GTG_AB_VER );

		// Scripts.
		wp_enqueue_script( 'gutengeek-slick-js', GTG_AB_URL . 'assets/js/libs/slick.min.js', [ 'jquery' ], GTG_AB_VER, false );
		// Scripts.
		wp_enqueue_script( 'gutengeek-magnific-popup', GTG_AB_URL . 'assets/js/libs/jquery.magnific-popup.min.js', [ 'jquery' ], '1.1.0', false );

		// Styles.
		wp_enqueue_style( 'gutengeek-magnific-popup', GTG_AB_URL . 'assets/css/libs/magnific-popup.css', [], '1.1.0' );

		// common scripts
		wp_enqueue_script( 'gutengeek-frontend-scripts', GTG_AB_URL . 'assets/js/frontend/frontend.js', [ 'jquery' ], GTG_AB_VER, false );

		// enqueued block assets
		do_action( 'gutengeek_enqueued_block_assests' );
	}

	/**
	 * Enqueue Gutenberg block assets for backend editor.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_editor_assets() {
		// components
		wp_enqueue_script( 'gutengeek-components', GTG_AB_URL . 'assets/js/admin/components.js', [ 'wp-edit-post', 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor', 'wp-api-fetch', 'wp-compose', 'wp-data', 'gutengeek-advanced-components' ], GTG_AB_VER, true );
		wp_enqueue_style( 'gutengeek-components-style', GTG_AB_URL . 'assets/css/admin/components.css', ['gutengeek-admin-style'], GTG_AB_VER );
		// block editor //'gutengeek-components',
		wp_enqueue_script( 'gutengeek-editor-js', GTG_AB_URL . 'assets/js/admin/blocks.editor.js', [ 'gutengeek-admin-script' ], GTG_AB_VER );
		// block editor styles
		wp_enqueue_style( 'gutengeek-block-editor-css', GTG_AB_URL . 'assets/css/admin/blocks.editor.css', [ 'wp-edit-blocks' ], GTG_AB_VER );
	}

	/**
	 * Generates stylesheet and appends in head tag.
	 *
	 * @since  1.0.0
	 */
	public function generate_block_style() {
		// load inline style
		$post_id = get_the_ID();
		// if is not post return
		if (! $post_id) {
			return;
		}
		$file = gtg_get_static_css_file_path( $post_id );
		if ( gtg_global_setting_name( 'css_method', 'file' ) === 'file' && file_exists( $file ) ) {
			return;
		}
		$css_content = $this->get_post_css_content( $post_id );

		if ( ! $css_content ) {
			return;
		}
		?>
		<style type="text/css" media="all" id="gutengeek-block-style">
			<?php printf( '%s', $css_content ) ?>
		</style>
		<?php
	}

	/**
	 * get the post css content form file content || post meta key '_gutengeek_css'
	 *
	 * @param null $post_id
	 * @return false|string
	 */
	private function get_post_css_content( $post_id = null ) {
		global $wp_filesystem;
		require_once ( ABSPATH . '/wp-admin/includes/file.php' );
    	WP_Filesystem();
		$file = gtg_get_static_css_file_path( $post_id );
		$css_content = '';
		if ( metadata_exists( 'post', $post_id, '_gutengeek_css' ) ) {
			$css_content = get_post_meta( $post_id, '_gutengeek_css', true );
		} else if ( file_exists( $file ) ) {
			$css_content = $wp_filesystem->get_contents( $file );
		}

		return apply_filters( 'gutengeek_post_css_content', $css_content, $post_id );
	}

	/**
	 * load google font storage in post meta
	 */
	public function enqueue_frontend_scripts() {
		// frontend scripts
		wp_localize_script( 'gutengeek-frontend-scripts', 'gtg_frontend_config', apply_filters( 'gutengeek_localize_frontend_scripts', [
				'url'             => GTG_AB_URL,
				'home_url'        => home_url(),
				'ajax_url'        => admin_url( 'admin-ajax.php' ),
				'rtl'          => is_rtl(),
				'global_settings' => gtg_advanced_blocks()->get_settings(),
				'_form_nonce' => wp_create_nonce('gutengeek-form-nonce')
			] )
		);
		$global_settings = get_option( '_gutengeek_global_settings', false );
		$inline_styles = $this->get_global_css( $global_settings );
        if ( $this->google_font_url ) {
        	wp_enqueue_style( 'gutengeek-global-google-fonts', $this->google_font_url, [], false, 'all' );
        }
		wp_enqueue_style( 'gutengeek-block-frontend', GTG_AB_URL . 'assets/css/frontend/frontend.css', [], GTG_AB_VER );
        wp_add_inline_style( 'gutengeek-block-frontend', $inline_styles );
	}

	/**
	 * get global styles
	 *
	 * @since 1.0.2
	 */
	public function get_global_css( $options = [] ) {
		$styles = [];

		$styles[] = ':root{';

		$sm_breakpoint = ! empty( $options['sm_breakpoint'] ) ? $options['sm_breakpoint'] : 1025;
		$xs_breakpoint = ! empty( $options['xs_breakpoint'] ) ? $options['xs_breakpoint'] : 769;
		$styles[] = '--var-gutengeek-sm-breakpoint: ' . ( $sm_breakpoint ) . 'px;';
		$styles[] = '--gg-sm-breakpoint: ' . ( $sm_breakpoint ) . 'px;';
		$styles[] = '--var-gutengeek-xs-breakpoint: ' . ( $xs_breakpoint ) . 'px;';
		$styles[] = '--gg-xs-breakpoint: ' . ( $xs_breakpoint ) . 'px;';

		$typography = ! empty( $options['typography'] ) ? $options['typography'] : array();
		if ( ! empty( $typography['color'] ) ) {
			$styles[] = '--body-color:' .$typography['color'] . ';';
		}

		$styles[] = '}';
		$mapping_breakpoints = array(
			'desktop' => '',
			'tablet' => $sm_breakpoint,
			'mobile' => $xs_breakpoint
		);

		$tags_support = array(
			'body' => 'bodyTypography',
			'h1' => 'h1Typography',
			'h2' => 'h2Typography',
			'h3' => 'h3Typography',
			'h4' => 'h4Typography',
			'h5' => 'h5Typography',
			'h6' => 'h6Typography',
		);

		$font_families = [];
		foreach ( $mapping_breakpoints as $device => $point ) {
			if ( $point ) {
				$styles[] = '@media(max-width: '.$point.'px){';
			}
			$styles[] = ':root{';
			if ( ! empty( $options['rowSettings'] ) ) {
				if ( ! empty( $options['rowSettings']['rowContainerWidth'] ) && ! empty( $options['rowSettings']['rowContainerWidth'][$device] ) ) {
					$styles[] = '--var-gutengeek-inner-width: ' . $options['rowSettings']['rowContainerWidth'][$device] . 'px;';
					$styles[] = '--gg-inner-width: ' . $options['rowSettings']['rowContainerWidth'][$device] . 'px;';
				}
				if ( ! empty( $options['rowContainerWidth'] ) ) {
					if ( ! empty( $options['rowContainerWidth']['rowGutter'] ) && ! empty( $options['rowContainerWidth']['rowGutter'][$device] ) ) {
						$unit = ! empty( $options['rowSettings'] ) && ! empty( $options['rowSettings']['rowGutter'] )  && ! empty( $options['rowSettings']['rowGutter']['unit'] ) ? $options['rowSettings']['rowGutter']['unit'] : 'px';
						$styles[] = '--var-gutengeek-inner-width: ' . $options['rowContainerWidth']['rowGutter'][$device] . $unit . ';';
						$styles[] = '--gg-inner-width: ' . $options['rowContainerWidth']['rowGutter'][$device] . $unit . ';';
					}
				}
			}

			foreach ( $tags_support as $tag => $option_name ) {
				if ( isset( $typography[$option_name] ) && gtg_sanitize_boolean( $typography[$option_name]['openTypography'] ) ) {
					$sub_options = $typography[$option_name];
					if ( ! empty( $sub_options['fontStyle'] ) ) {
						$styles[] = '--gg' . ( $tag ? '-' . $tag . '' : '' ) . '-font-style:' . $sub_options['fontStyle'] . ';';
					}
					if ( isset( $sub_options['fontSize'] ) && ! empty( $sub_options['fontSize'][$device] ) && gtg_sanitize_boolean( $sub_options['fontSize']['openRange'] ) ) {
						$styles[] = '--gg' . ( $tag ? '-' . $tag . '' : '' ) . '-font-size: ' . $sub_options['fontSize'][$device] . ( ! empty( $sub_options['fontSize']['unit'] ) ? $sub_options['fontSize']['unit'] : '' ) . ';';
					}
					if ( isset( $sub_options['lineHeight'] ) && ! empty( $sub_options['lineHeight'][$device] ) && gtg_sanitize_boolean( $sub_options['lineHeight']['openRange'] ) ) {
						$styles[] = '--gg' . ( $tag ? '-' . $tag . '' : '' ) . '-line-height: ' . $sub_options['lineHeight'][$device] . ( ! empty( $sub_options['lineHeight']['unit'] ) ? $sub_options['lineHeight']['unit'] : '' ) . ';';
					}
					if ( isset( $sub_options['letterSpacing'] ) && ! empty( $sub_options['letterSpacing'][$device] ) && gtg_sanitize_boolean( $sub_options['letterSpacing']['openRange'] ) ) {
						$styles[] = '--gg' . ( $tag ? '-' . $tag . '' : '' ) . '-letter-spacing: ' . $sub_options['letterSpacing'][$device] . ( ! empty( $sub_options['letterSpacing']['unit'] ) ? $sub_options['letterSpacing']['unit'] : '' ) . ';';
					}
					if ( isset( $sub_options['textTransform'] ) && ! empty( $sub_options['textTransform'][$device] ) && gtg_sanitize_boolean( $sub_options['textTransform']['openTransform'] ) ) { // openTransform
						$styles[] = '--gg' . ( $tag ? '-' . $tag . '' : '' ) . '-text-transform: ' . $sub_options['textTransform'][$device] . ';';
					}
					if ( isset( $sub_options['typography'] ) && ! empty( $sub_options['typography'] ) ) {
						if ( ! empty( $sub_options['typography']['fontFamily'] ) ) {
							$font_name = $sub_options['typography']['fontFamily'];
							$styles[] = '--gg' . ( $tag ? '-' . $tag . '' : '' ) . '-font-family:' . $font_name . ';';
							if ( ! isset( $font_families[$font_name] ) ) {
								$font_families[$font_name] = [];
							}
							if ( ! empty( $sub_options['typography']['fontWeight'] ) ) {
								$font_weight = $sub_options['typography']['fontWeight'];
								$font_families[$font_name][] = $font_weight;
								$styles[] = '--gg' . ( $tag ? '-' . $tag . '' : '' ) . '-font-weight:' . $font_weight . ';';
							}
						}
					}
				}
			}
			$styles[] = '}';
			if ( $point ) {
				$styles[] = '}';
			}
		}

		$fonts_url = '';
		if ( ! empty( $font_families ) ) {
			$google_fonts = [];
			foreach ( $font_families as $name => $font_styles ) {
				$font_styles = array_unique( $font_styles );
				$google_fonts[] = $name . ':' . implode(',', $font_styles );
			}

			$query_args = array(
				'family' => implode( '|', $google_fonts ),
				'subset' => rawurlencode( 'latin,latin-ext' ),
			);
			$this->google_font_url = str_replace( ',', '%2C', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
		}

		return gtg_minify_css( implode( '', $styles ) );
	}

	/**
	 * enqueue post css style
	 */
	public function enqueue_custom_style() {
		$postId = get_the_ID();

		if ( $postId ) {
			// load static css file created on save post
			$allowed = gtg_global_setting_name( 'css_method', 'file' );
			$file = gtg_get_static_css_file_path( $postId );
			if ( file_exists($file) && ( ! $allowed || $allowed === 'file' ) ) {
				$file_url = gtg_get_static_css_file_url( $postId );
				if ( $file_url ) {
					$version = GTG_AB_VER;
					$version = defined( 'WP_DEBUG' ) && WP_DEBUG ? uniqid() : GTG_AB_VER;
					wp_enqueue_style( 'gutengeek-frontend-style', $file_url, [], $version );
				}
			}
		}
	}

	/**
	 * add icon to localize scripts
	 *
	 * @since 1.1.1
	 * @param $localize
	 */
	public function add_icon_localize_scripts( $localize = [] ) {
		$localize = array_merge( $localize, [
			'next_icon' => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path></svg>',
			'prev_icon' => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"></path></svg>'
		] );
		return $localize;
	}

}

Block_Assets::instance();
