<?php
/**
 * WordPress Widget Boilerplate
 *
 * The WordPress Widget Boilerplate is an organized, maintainable boilerplate for building
 * widgets using WordPress best practices.
 *
 * @package   WordPressWidgetBoilerplate
 * @author    Your Name <email@example.com>
 * @license   GPL-3.0+
 * @link      http://example.com
 * @copyright 2011 - 2019 Your Name or Company Name
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Widget Boilerplate
 * Plugin URI:        https://github.com/tommcfarlin/wordpress-widget-boilerplate
 * Description:       An object-oriented foundation for building WordPress Widgets.
 * Version:           2.0.0
 * Author:            Tom McFarlin
 * Author URI:        https://tommcfarlin.com
 * Text Domain:       widget-name
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path:       /languages
 */

namespace WordPressWidgetBoilerplate;

use WordPressWidgetBoilerplate\Utilities\Registry;
use WordPressWidgetBoilerplate\Plugin;
use WordPressWidgetBoilerplate\Subscriber\WidgetSubscriber;
use WordPressWidgetBoilerplate\Subscriber\DeleteWidgetCacheSubscriber;

// Prevent this file from being called directly.
defined('WPINC') || die;

// Include the autoloader.
require_once __DIR__ . '/vendor/autoload.php';

// Setup a filter so we can retrieve the registry throughout the plugin.
$registry = new Registry();
add_filter('wpwBoilerplateRegistry', function () use ($registry) {
    return $registry;
});

// Add subscribers.
$registry->add('deleteWidgetCacheSubscriber', new DeleteWidgetCacheSubscriber('flush_widget_cache'));

// Add the Widget base class to the Registry.
$registry->add('widgetSubscriber', new WidgetSubscriber('widgets_init'));

// Start the machine.
(new Plugin($registry))->start();
