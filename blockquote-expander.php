<?php /*
Plugin Name: Blockquote Expander 
Plugin URI:  @todo
Description: If a blockquote gets too long this plugin will provide a snippet of the blockquote that your readers can skip or choose to expand.
Version:     0.1.0
Author:      mrmadhat
Author URI:  http://mrmadhat.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: blockquote-expander
*/
namespace MrMadHat\BlockquoteExpander;

require_once('titan-framework/titan-framework-embedder.php');
use \TitanFramework;

define( __NAMESPACE__ . '\VERSION', '0.1.0' );
define(__NAMESPACE__ . '\PLUGINURL', plugins_url('', __FILE__) );

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\add_scripts_and_styles');

function add_scripts_and_styles() {
	wp_register_style( 'bq-expander-style', PLUGINURL . '/assets/dist/css/bq-expander.css', false, VERSION );
	wp_enqueue_style( 'bq-expander-style' );

	wp_register_script( 'bq-expander-script', PLUGINURL . '/assets/dist/js/bq-expander.min.js', false, '0.1.0', VERSION );
	wp_enqueue_script( 'bq-expander-script' );
}

//Testing Titan framework for use in this project
add_action('tf_create_options', __NAMESPACE__ . '\create_options');

function create_options() {
	$titan = TitanFramework::getInstance('mytheme');

	$section = $titan->createThemeCustomizerSection( array (
		'name' => __('Footer Colors', 'blockquote-expander'),
		));

	$section->createOption( array(
			'name' => __('Background Color', 'blockquote-expander'),
			'id' => 'footer_bg',
			'type' => 'color',
			'default' => '#222222',
			'css' => 'footer { background: value}',
		) );
}