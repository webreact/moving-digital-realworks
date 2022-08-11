<?php

namespace MovingDigital;
use Carbon\Carbon;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.webreact.nl
 * @since      1.0.0
 *
 * @package    Moving_Digital_Realworks
 * @subpackage Moving_Digital_Realworks/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Moving_Digital_Realworks
 * @subpackage Moving_Digital_Realworks/admin
 * @author     Webreact (Nils Ringersma) <wordpress@webreact.nl>
 */
class Moving_Digital_Realworks_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * The options of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $options The options of this plugin.
	 */
	private $options;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Moving_Digital_Realworks_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Moving_Digital_Realworks_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/moving-digital-realworks-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Moving_Digital_Realworks_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Moving_Digital_Realworks_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/moving-digital-realworks-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add options page
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_page() {
		// This page will be under "Settings"
		add_options_page(
			'Moving Digital',
			'Moving Digital API Settings',
			'manage_options',
			'md-setting-admin',
			array( $this, 'create_admin_page' )
		);
	}

	/**
	 * Options page callback
	 *
	 * @since    1.0.0
	 */
	public function create_admin_page() {
		// Set class property
		$this->options = get_option( 'md_option' );
		?>
        <div class="wrap">
            <form method="post" action="options.php">
				<?php
				// This prints out all hidden setting fields
				settings_fields( 'md_option_group' );
				do_settings_sections( 'md-setting-admin' );
				submit_button();
				?>
            </form>
        </div>
		<?php
	}

	/**
	 * Register and add settings
	 *
	 * @since    1.0.0
	 */
	public function page_init() {
		register_setting(
			'md_option_group', // Option group
			'md_option', // Option name
			array( $this, 'sanitize' ) // Sanitize
		);

		add_settings_section(
			'setting_md', // ID
			'Moving Digital Realworks Settings', // apikey
			array( $this, 'print_section_info' ), // Callback
			'md-setting-admin' // Page
		);

		add_settings_field(
			'is_partner_key', // ID
			'Is Partner Key', // apikey
			array( $this, 'is_partner_key_callback' ), // Callback
			'md-setting-admin', // Page
			'setting_md' // Section
		);

		add_settings_field(
			'apikey',
			'API Key',
			array( $this, 'apikey_callback' ),
			'md-setting-admin',
			'setting_md'
		);
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys
	 *
	 * @return array
	 * @since    1.0.0
	 */
	public function sanitize( $input ) {
		$new_input = array();
		if ( isset( $input['is_partner_key'] ) ) {
			$new_input['is_partner_key'] = absint( $input['is_partner_key'] );
		}

		if ( isset( $input['apikey'] ) ) {
			$new_input['apikey'] = sanitize_text_field( $input['apikey'] );
		}

		return $new_input;
	}

	/**
	 * Print the Section text
	 * @since    1.0.0
	 */
	public function print_section_info() {
		print __( 'Enter your settings below:', 'moving-digital-realworks' );
	}

	/**
	 * Get the settings option array and print one of its values
	 * @since    1.0.0
	 */
	public function is_partner_key_callback() {
		echo '<input type="checkbox" id="is_partner_key" name="md_option[is_partner_key]" value="1" ' . checked( 1, $this->options['is_partner_key'], false ) . ' /><label for="is_partner_key">' . __( 'Check this box if your API Key is a partner key.', 'moving-digital-realworks' ) . '</label>';
	}

	/**
	 * Get the settings option array and print one of its values
	 * @since    1.0.0
	 */
	public function apikey_callback() {
		printf(
			'<input type="text" id="apikey" name="md_option[apikey]" value="%s" />',
			isset( $this->options['apikey'] ) ? esc_attr( $this->options['apikey'] ) : ''
		);
	}

	/**
	 * @param $realworksId
*
* @return false|string
*/
	public function moving_digital_get_anecdotes( $realworksId ) {

		$viral_details_url = 'viral-detail/?type=realworks&id=' . $realworksId;
		$viral_details_result = Moving_Digital_Realworks_Admin::moving_digital_api_get( $viral_details_url );
		$viral_details = json_decode( $viral_details_result['body'] );

		$request        = 'anecdote/?type=realworks&id=' . $realworksId;
		$result         = Moving_Digital_Realworks_Admin::moving_digital_api_get( $request );
		$responseBody   = json_decode( $result['body'] );

		$template       = PLUGIN_DIR_PATH . '/public/templates/anecdotes.php';
		$theme_files    = array( 'moving-digital-realworks/anecdotes.php' );
		$exists_in_theme = locate_template( $theme_files, false );
		$template       = ( $exists_in_theme != '' ) ? $exists_in_theme : $template ;

		if ( $viral_details ) {

			$anecdotes = $responseBody->data;
			ob_start();

			include $template;

			return ob_get_clean();
		}
	}

	/**
	 * @param $realworksId
	 *
	 * @return false|string
	 */
	public function moving_digital_get_features( $realworksId ) {

		$viral_details_url = 'viral-detail/?type=realworks&id=' . $realworksId;
		$viral_details_result = Moving_Digital_Realworks_Admin::moving_digital_api_get( $viral_details_url );
		$viral_details = json_decode( $viral_details_result['body'] );

	    $request        = 'feature/?type=realworks&id=' . $realworksId;
		$result         = Moving_Digital_Realworks_Admin::moving_digital_api_get( $request );
		$responseBody   = json_decode( $result['body'] );

		$template       = PLUGIN_DIR_PATH . '/public/templates/features.php';
		$theme_files    = array( 'moving-digital-realworks/features.php' );
		$exists_in_theme = locate_template( $theme_files, false );
		$template       = ( $exists_in_theme != '' ) ? $exists_in_theme : $template ;

		if ( $viral_details ) {

			$features = $responseBody->data;
			ob_start();

			include $template;

			return ob_get_clean();
		}
	}

	/**
	 * @param $request
	 *
	 * @return array|\WP_Error
	 */
	public function moving_digital_api_get( $request ) {

		$options = get_option( 'md_option' );

		$apiKey     = $options['apikey'];
		$apiKeyName = ( $options['is_partner_key'] ) ? 'apikey-partner' : 'apikey';

		$headers = array(
			"Content-Type" => 'application/json',
			"Accept"       => 'application/json',
			$apiKeyName    => $apiKey,
		);

		$url     = 'https://app.diorama.nl/api/public/v1.4/' . $request;
		$request = new \WP_Http;

		return $request->request( $url, array( 'method' => 'GET', 'headers' => $headers ) );
	}
}
