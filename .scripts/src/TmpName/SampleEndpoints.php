<?php namespace TmpName;

use TmpName\EndpointBase;

class SampleEndpoints extends EndpointBase {
  /*
  For more info on creating endpoints go to: https://developer.wordpress.org/rest-api/extending-the-rest-api/adding-custom-endpoints/
  */
  function __construct() {
    $this->createEndpoint("GET", "/sample", [$this, 'get']);
  }

  function get($request) {
    echo json_encode(["msg" => "We have an endpoint!"]);
  }
  
}
