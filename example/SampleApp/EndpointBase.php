<?php namespace SampleApp;

class EndpointBase {
  public static $url = SAMPLEAPP_PLUGIN_ENDPOINT_PATH;
  
  function createEndpoint($method, $url, $callback):void {
    register_rest_route(self::$url, $url, [
      "methods" => $method,
      "callback" => $callback
    ]);
  }
}
