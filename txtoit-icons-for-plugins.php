<?php
/*
* Plugin Name: Icons for Plugins - TxToIT
* Plugin URI: https://github.com/thanks-to-it/icons-for-plugins
* Description: Displays icons for WordPress plugins
* Version: 1.0.3
* Author: Pablo Pacheco
* Author URI: https://github.com/pablo-sg-pacheco
* License: GNU General Public License v3.0
* License URI: http://www.gnu.org/licenses/gpl-3.0.html
* Text Domain: txtoit-icons-for-plugins
* Domain Path: /languages
*/

use Pablo_Pacheco\WP_Namespace_Autoloader\WP_Namespace_Autoloader;

// Autoload classes
require_once( "vendor/autoload.php" );
$autoloader = new WP_Namespace_Autoloader( array(
	'directory'        => __DIR__,
	'namespace_prefix' => 'TxToIT\IFP',
	'classes_dir'      => 'plugin\classes',
) );
$autoloader->init();

// Initializes plugin
$plugin = \TxToIT\IFP\Core::get_instance();
$plugin->set_args( array(
	'plugin_file_path' => __FILE__,
	'action_links'     => array(
		array(
			'url'  => admin_url( 'options-general.php?page=txtoit-icons-for-plugins' ),
			'text' => __( 'Settings', 'txtoit-icons-for-plugins' ),
		),
	),
	'translation'      => array(
		'text_domain' => 'txtoit-icons-for-plugins',
	),
) );
$plugin->init();