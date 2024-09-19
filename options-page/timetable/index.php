<?php
/**
 * Plugin Name: Sample Timetable Plugin
 * Description: A plugin that allows you to manage a simple timetable.
 * Version: 1.0
 * Author: Piotr Kostrzewski
 */
defined('ABSPATH') or die();

require_once plugin_dir_path(__FILE__) . 'callback.php';
require_once plugin_dir_path(__FILE__) . 'sanitizing.php';
require_once plugin_dir_path(__FILE__) . 'timetable_menu.php';
require_once plugin_dir_path(__FILE__) . 'timetable_page.php';
require_once plugin_dir_path(__FILE__) . 'timetable_settings.php';
add_action('admin_menu', 'timetable_menu');
add_action('admin_init', 'register_timetable_settings');
