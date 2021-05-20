<?php namespace SampleApp;

use SampleApp\DB as SampleAppDB;

class Models {
  public $record = null;
  public static $db = null;

  public function __construct() {
    self::$db = new SampleAppDB;
  }
}
