<?php
/**
 * Plugins Name: Mihdan: SmmBox
 * Version: 1.0
 */

namespace Mihdan\SmmBox;

define( 'MIHDAN_SMMBOX_FILE', __FILE__ );
define( 'MIHDAN_SMMBOX_VERSION', '1.0' );
define( 'MIHDAN_SMMBOX_DIR', __DIR__ );
define( 'MIHDAN_SMMBOX_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Class Core
 *
 * @package Mihdan\SmmBox
 */
class Core {
	/**
	 * Core constructor.
	 */
	public function __construct() {
		$this->hooks();
	}

	/**
	 * Setup hooks.
	 */
	public function hooks() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Enqueue scripts.
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'smmbox-api', 'https://smmbox.com/api/js/1.2/smmbox.js', array(), $this->get_version(), true );
		wp_enqueue_script( 'smmbox-api-app', $this->asset_path( 'js/app.js' ), array( 'smmbox-api' ), $this->get_version(), true );
	}

	/**
	 * Get version.
	 *
	 * @return string
	 */
	public function get_version() {
		return MIHDAN_SMMBOX_VERSION;
	}

	/**
	 * Get full URL by filename.
	 *
	 * @param string $filename Filename.
	 *
	 * @return string
	 */
	public function asset_path( $filename ) {
		return MIHDAN_SMMBOX_URL . '/assets/' . $filename;
	}
}

static $plugin;

if ( ! $plugin ) {
	$plugin = new Core();
}

// eol.
