<?php namespace TmpName;

class Enqueue {
	function __construct() {
		add_action("wp_enqueue_scripts", [$this, 'enqueue']);
	}			
  
  function getDist($file) {
    $dist = TMPNAME_PLUGIN_URI ."assets/dist"; 
    $files = json_decode(file_get_contents($dist . "/assets-manifest.json"));
    $dist_file = $file;
    if(!is_null($files) && $files->{$file}) {
      $dist_file = $files->{$file};
    } else {
      return null;
    }
    return $dist . "/" . $dist_file;
	}

	function enqueue() {
    $script = $this->getDist("main.js");
    $style = $this->getDist("main.css");
    wp_enqueue_script("tmp-name", $script, [], null, true);
    if(!is_null($style)) {
      wp_enqueue_style("tmp-name", $style, [], false, "all");
    }
  }
}
