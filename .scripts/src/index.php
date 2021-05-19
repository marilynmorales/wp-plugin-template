<?php
/*
Plugin Name: TMP_NAME
Description: tmp_name_description
Version: 1.0
Author: tmp_name_author
Author URI: tmp_name_author_uri
*/

define("TMPNAME_PLUGIN_FILE", __FILE__);
define("TMPNAME_PLUGIN_ASSETS", realpath(__DIR__ . "/assets/dist"));
define("TMPNAME_PLUGIN_URI", plugin_dir_url(__FILE__));
define("TMPNAME_PLUGIN_TABLE_NAME", "tmp_name");
define("TMPNAME_PLUGIN_SRC_FOLDER", "TmpName");
define("TMPNAME_PLUGIN_ENDPOINT_PATH", "tmp-name/v1");

require_once("TmpName/Plugin.php");
$plugin = new TmpName\Plugin();

