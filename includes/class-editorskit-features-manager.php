<?php
/**
 * Add editor settings for EditorsKit features manager.
 *
 * @package   EditorsKit
 * @author    Jeffrey Carandang
 * @link      https://editorskit.com
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load general assets for our blocks.
 *
 * @since 1.0.0
 */
class EditorsKit_Features_Manager {


	/**
	 * This plugin's instance.
	 *
	 * @var EditorsKit_Features_Manager
	 */
	private static $instance;

	/**
	 * Registers the plugin.
	 */
	public static function register() {
		if ( null === self::$instance ) {
			self::$instance = new EditorsKit_Features_Manager();
		}
	}

	/**
	 * The base URL path (without trailing slash).
	 *
	 * @var string $url
	 */
	private $url;

	/**
	 * The Plugin version.
	 *
	 * @var string $version
	 */
	private $version;

	/**
	 * The Plugin version.
	 *
	 * @var string $slug
	 */
	private $slug;


	/**
	 * The Constructor.
	 */
	private function __construct() {
		$this->version = EDITORSKIT_VERSION;
		$this->slug    = 'editorskit';
		$this->url     = untrailingslashit( plugins_url( '/', dirname( __FILE__ ) ) );

		add_filter( 'block_editor_settings', array( $this, 'block_editor_settings' ), 10, 2 );
	}

	/**
	 * Filters the settings to pass to the block editor.
	 *
	 * @param array  $editor_settings The editor settings.
	 * @param object $post The post being edited.
	 *
	 * @return array Returns updated editors settings.
	 */
	public function block_editor_settings( $editor_settings, $post ) {
		if ( ! isset( $editor_settings['editorskit'] ) ) {

			$editor_settings['editorskit'] = array(
				'visibility' => array(
					'name'  => 'visibility',
					'label' => __( 'Visibility', 'editorskit' ),
					'items' => array(
						'acf'       => array(
							'name'  => 'acf',
							'label' => __( 'ACF Support', 'editorskit' ),
							'value' => true,
						),
						'devices'   => array(
							'name'  => 'devices',
							'label' => __( 'Devices', 'editorskit' ),
							'value' => true,
						),
						'logic'     => array(
							'name'  => 'logic',
							'label' => __( 'Display Logic', 'editorskit' ),
							'value' => true,
						),
						'userState' => array(
							'name'  => 'userState',
							'label' => __( 'User Login State', 'editorskit' ),
							'value' => true,
						),
					),
				),
				'formats'    => array(
					'name'  => 'formats',
					'label' => __( 'Formats', 'editorskit' ),
					'items' => array(
						'clearFormatting'  => array(
							'name'  => 'clearFormatting',
							'label' => __( 'Clear Formatting', 'editorskit' ),
							'value' => true,
						),
						'highlight'        => array(
							'name'  => 'highlight',
							'label' => __( 'Highlighted Text Color', 'editorskit' ),
							'value' => true,
						),
						'justify'          => array(
							'name'  => 'justify',
							'label' => __( 'Justified Alignment', 'editorskit' ),
							'value' => true,
						),
						'link'             => array(
							'name'  => 'link',
							'label' => __( 'Link with "rel" Attributes', 'editorskit' ),
							'value' => true,
						),
						'nonbreakingSpace' => array(
							'name'  => 'nonbreakingSpace',
							'label' => __( 'Nonbreaking Space', 'editorskit' ),
							'value' => true,
						),
						'subscript'        => array(
							'name'  => 'subscript',
							'label' => __( 'Subscript', 'editorskit' ),
							'value' => true,
						),
						'superscript'      => array(
							'name'  => 'superscript',
							'label' => __( 'Superscript', 'editorskit' ),
							'value' => true,
						),
						'colors'           => array(
							'name'  => 'colors',
							'label' => __( 'Text Color', 'editorskit' ),
							'value' => true,
						),
						'underline'        => array(
							'name'  => 'underline',
							'label' => __( 'Underline', 'editorskit' ),
							'value' => true,
						),
						'uppercase'        => array(
							'name'  => 'uppercase',
							'label' => __( 'Uppercase', 'editorskit' ),
							'value' => true,
						),
					),
				),
				'writing'    => array(
					'name'  => 'writing',
					'label' => __( 'Writing', 'editorskit' ),
					'items' => array(
						'readingTime'    => array(
							'name'  => 'readingTime',
							'label' => __( 'Estimated Reading Time', 'editorskit' ),
							'value' => true,
						),
						'headingLabel'   => array(
							'name'  => 'headingLabel',
							'label' => __( 'Heading Block Label', 'editorskit' ),
							'value' => true,
						),
						'markdown'       => array(
							'name'  => 'markdown',
							'label' => __( 'Markdown', 'editorskit' ),
							'value' => true,
						),
						'transformEmpty' => array(
							'name'  => 'transformEmpty',
							'label' => __( 'Transform 4 Empty Paragraphs to Spacer Block', 'editorskit' ),
							'value' => true,
						),
					),
				),
				'options'    => array(
					'name'  => 'options',
					'label' => __( 'Block Options', 'editorskit' ),
					'items' => array(
						'copy'            => array(
							'name'  => 'copy',
							'label' => __( 'Copy Selected Block(s)', 'editorskit' ),
							'value' => true,
						),
						'navigator'       => array(
							'name'  => 'navigator',
							'label' => __( 'Block Navigator', 'editorskit' ),
							'value' => true,
						),
						'export'          => array(
							'name'  => 'export',
							'label' => __( 'Export as JSON', 'editorskit' ),
							'value' => true,
						),
						'listBlockFontSize' => array(
							'name'  => 'listBlockFontSize',
							'label' => __( 'List Block Font Size', 'editorskit' ),
							'value' => true,
						),
						'listBlockTextColor' => array(
							'name'  => 'listBlockTextColor',
							'label' => __( 'List Block Text Color', 'editorskit' ),
							'value' => true,
						),
						'mediaTextLayout' => array(
							'name'  => 'mediaTextLayout',
							'label' => __( 'Media Text Block Layout', 'editorskit' ),
							'value' => true,
						),
						'mediaTextLink'   => array(
							'name'  => 'mediaTextLink',
							'label' => __( 'Media Text Block Link', 'editorskit' ),
							'value' => true,
						),
						'setAsFeatured'   => array(
							'name'  => 'setAsFeatured',
							'label' => __( 'Set Image Block as Featured', 'editorskit' ),
							'value' => true,
						),
					),
				),
				'tools'      => array(
					'name'  => 'tools',
					'label' => __( 'Tools', 'editorskit' ),
					'items' => array(
						'guidelines'          => array(
							'name'  => 'guidelines',
							'label' => __( 'Block Guide Lines', 'editorskit' ),
							'value' => true,
						),
						'codeHighlight'       => array(
							'name'  => 'codeHighlight',
							'label' => __( 'Code Editor Syntax Highlight', 'editorskit' ),
							'value' => true,
						),
						'customClassNames'    => array(
							'name'  => 'customClassNames',
							'label' => __( 'Custom Class Names', 'editorskit' ),
							'value' => true,
						),
						'dragAndDropFeatured' => array(
							'name'  => 'dragAndDropFeatured',
							'label' => __( 'Drag and Drop Featured Image', 'editorskit' ),
							'value' => true,
						),
						'height'              => array(
							'name'  => 'height',
							'label' => __( 'Editor Min-Height', 'editorskit' ),
							'value' => true,
						),
						'autosave'            => array(
							'name'  => 'autosave',
							'label' => __( 'Toggle Auto Save', 'editorskit' ),
							'value' => true,
						),
						'help'                => array(
							'name'  => 'help',
							'label' => __( 'Help, tips and tricks', 'editorskit' ),
							'value' => true,
						),
						'toggleTitle'         => array(
							'name'  => 'toggleTitle',
							'label' => __( 'Toggle Title Visibility', 'editorskit' ),
							'value' => true,
						),
						'scrollDown'          => array(
							'name'  => 'scrollDown',
							'label' => __( 'View Custom Fields', 'editorskit' ),
							'value' => true,
						),
					),
				),
				'shortcuts'  => array(
					'name'  => 'shortcuts',
					'label' => __( 'Shortcuts', 'editorskit' ),
					'items' => array(
						'selectParent' => array(
							'name'  => 'selectParent',
							'label' => __( 'Select Parent Block', 'editorskit' ),
							'value' => true,
						),
					),
				),
			);
		}

		return $editor_settings;
	}

}

EditorsKit_Features_Manager::register();