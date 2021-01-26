<?php

namespace Gtg_Advanced_Blocks;

class CLI {

	public static $export_path;

	/**
	 * constructor CLI class
	 */
	public function __construct() {
		$this->register_commands();
	}

	/**
	 * get cli comamnds available
	 */
	public function get_cli_commands() {
		return apply_filters( 'gutengeek_cli_commands', array(
			'Icon',
			'Flush_Css'
		) );
	}

	/**
	 * register commands
	 */
	public function register_commands() {
		$commands = $this->get_cli_commands();
		foreach ( $commands as $classname ) {
			$classname = 'Gtg_Advanced_Blocks\\CLI\\' . $classname;
			$command = new $classname();

			// add CLI command
			\WP_CLI::add_command(
				$command->get_command_name(),
				$command,
				array(
					'before_invoke' => function() {
						global $wp_filesystem;
					    require_once( ABSPATH . 'wp-admin/includes/file.php' );
						require_once( ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php' );
					    \WP_Filesystem();
					}
				)
			);
		}
	}

	public function __invoke( $args, $assoc_args ) {
        if ( ! isset( $args[0] ) ) {
        	\WP_CLI::error( __( 'Usage: wp gutengeek export-icons --path=custom-icons' ) );
        	return;
        }

        $command_name = $args[0];
		$command_action = isset( $args[1] ) ? $args[1] : 'invoke';

        $commands = $this->get_cli_commands();
        foreach ( $commands as $classname ) {
			$classname = 'Gtg_Advanced_Blocks\\CLI\\' . $classname;
			$command = new $classname();
			if ( $command->get_command_name() !== $command_name ) {
				continue;
			}
			if ( isset( $command_action ) && is_callable( [ $classname, $command_action ] ) ) {
				call_user_func_array( [ $classname, $command_action ], [ $args, $assoc_args ] );
			}
		}
    }

}

$cli = new \Gtg_Advanced_Blocks\CLI();

// add CLI command
\WP_CLI::add_command(
	'gutengeek',
	$cli,
	array(
		'before_invoke' => function() {
			global $wp_filesystem;
		    require_once( ABSPATH . 'wp-admin/includes/file.php' );
			require_once( ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php' );
		    \WP_Filesystem();
		}
	)
);
