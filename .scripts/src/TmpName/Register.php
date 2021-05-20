<?php namespace TmpName;

use TmpName\DB;

class Register {
  function __construct() {
    global $wpdb;
    $this->db = $wpdb;
  }
  
  function getTableName() {
    return DB::getTableName(); 
  }
  
  function getCharset() {
    return DB::getCharset();
  }

  function init() {
    $table_name = $this->getTableName();
    $charset_collate = $this->getCharset();
    $sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY  (id)
    ) $charset_collate";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
  }
  
}
