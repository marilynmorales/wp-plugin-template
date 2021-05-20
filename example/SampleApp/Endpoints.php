<?php namespace SampleApp;

use SampleApp\SampleEndpoints;

class Endpoints {
  function __construct() {
    add_action( 'rest_api_init', [$this, "add"]);
  }

  function add() {
    new SampleEndpoints();    
  }
}
