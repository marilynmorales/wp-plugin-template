<?php namespace TmpName;

use TmpName\DB as TmpNameDB;

class Models {
  public $record = null;
  public static $db = null;

  public function __construct() {
    self::$db = new TmpNameDB;
  }
}
