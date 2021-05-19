<?php namespace TmpName;

use TmpName\Plugin;

class DB {
  public static function getDB() {
    global $wpdb;
    return $wpdb;
  }
  public static function getPrefix():string {
    return static::getDB()->prefix;
  }

  public static function getTableName():string {
    return static::getPrefix() . Plugin::table_name;
  }

  public static function getCharset():string {
    return static::getDB()->get_charset_collate();
  }

  public static function query($query, $data = []) {
    $db = static::getDB();
    $prep = $db->prepare($query, ...$data);
    return static::getDB()->query($prep);
  }
  
  public static function insert($tablename, $data):int {
    return static::getDB()->insert($tablename, $data);
  }

  public static function select($query, $data = []):array {
    $db = static::getDB();
    $prep = $db->prepare($query, ...$data);
    return $db->get_results($prep); 
  }
}
