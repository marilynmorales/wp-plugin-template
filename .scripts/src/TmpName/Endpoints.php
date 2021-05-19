<?php namespace TmpName;

use TmpName\SampleEndpoints;

class Endpoints {
  function __construct() {
    add_action( 'rest_api_init', [$this, "add"]);
  }

  function add() {
    new SampleEndpoints();    
  }
}
