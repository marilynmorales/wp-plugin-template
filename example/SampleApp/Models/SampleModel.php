<?php namespace SampleApp\Models;

use SampleApp\Models;

class SampleModel extends Models {
  
  public $record = null;

  function __construct() {
    parent::__construct();
    $this->table_name = self::$db::getTableName();
  }
  
  function get() {
    $tablename = $this->table_name;
    $query = "select * from $tablename";
    $atts = [];
    $record = self::$db::select($query, $atts);
    if(count($record) > 0) {
      $this->record = $record[0];
      return $this->record;
    }
    return null;
  }
  
}
