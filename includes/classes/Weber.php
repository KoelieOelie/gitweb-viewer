<?php

class Weber {

  public function run() {

    global $Routes_raw;
    $uri = $_SERVER['REQUEST_URI'];

    // Check if the route is in $Routes
    if (!in_array(explode('?',$uri)[0], $Routes_raw)) {
      die(file_get_contents("includes/views/error.html"));
    }
  }

}
