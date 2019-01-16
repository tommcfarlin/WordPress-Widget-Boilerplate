<?php
/**
 * WordPress Widget Boilerplate
 *
 * The WordPress Widget Boilerplate is an organized, maintainable boilerplate for building
 * widgets using WordPress best practices.
 *
 * @package   Widget_Name
 * @author    Your Name <email@example.com>
 * @license   GPL-3.0+
 * @link      http://example.com
 * @copyright 2018 - 2019 Your Name or Company Name
 *
 * @wordpress-plugin
 * Plugin Name:       @TODO
 * Plugin URI:        @TODO
 * Description:       @TODO
 * Version:           1.0.0
 * Author:            @TODO
 * Author URI:        @TODO
 * Text Domain:       widget-name
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path:       /lang
 * GitHub Plugin URI: https://github.com/<owner>/<repo>
 */

namespace WordPressWidgetBoilerplate;

use WordPressWidgetBoilerplate\Utilities;

// Prevent this file from being called directly.
defined('WPINC') || die;

// Include the autoloader.
require_once __DIR__ . '/inc/autoload.php';

// Setup a filter so we can retrieve the registry throughout the plugin.
$registry = new Registry();
add_filter('wpWidgetRegistry', function () use ($registry) {
    return $registry;
});
