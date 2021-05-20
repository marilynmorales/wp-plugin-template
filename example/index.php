<?php
/*
Plugin Name: Sample App
Description: Plugin description
Version: 1.0
Author: Marilyn Morales
Author URI: https://marilynmorales.com
*/

define("SAMPLEAPP_PLUGIN_FILE", __FILE__);
define("SAMPLEAPP_PLUGIN_ASSETS", realpath(__DIR__ . "/assets/dist"));
define("SAMPLEAPP_PLUGIN_URI", plugin_dir_url(__FILE__));
define("SAMPLEAPP_PLUGIN_TABLE_NAME", "sample_app");
define("SAMPLEAPP_PLUGIN_SRC_FOLDER", "SampleApp");
define("SAMPLEAPP_PLUGIN_ENDPOINT_PATH", "sample-app/v1");

require_once("SampleApp/Plugin.php");
$plugin = new SampleApp\Plugin();

