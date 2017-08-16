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