<?php
namespace SampleApp;

class Plugin {
  
  static public $table_name = SAMPLEAPP_PLUGIN_TABLE_NAME;
  static public $src_folder = SAMPLEAPP_PLUGIN_SRC_FOLDER;

  function __construct() {
    $this->init_autoloader();
    register_activation_hook(SAMPLEAPP_PLUGIN_FILE, [$this, 'init_activation']);
    new Filters();
		new Endpoints();
		new Enqueue();
		new Shortcodes();
  }
  
  function init_autoloader() {
    spl_autoload_register(function ($class_name) {
      $classPath = explode("\\", $class_name);
      if ($classPath[0] != static::$src_folder) {
        return;
      }
      $filePath = dirname(SAMPLEAPP_PLUGIN_FILE) . '/' . implode('/', $classPath) . '.php';
      if (file_exists($filePath)) {
        require_once($filePath);
      }
    });
  }

  function init_activation() {
      $register = new Register();
      $register->init();  
  }
}