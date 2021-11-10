<?php
class View {
  public static function make($view,$name="welcome.official") {

    if (Route::isRouteValid()) {
        // Create the view and the view controller.
        require_once( './includes/controllers/'.$view.'.php' );
        require_once( './includes/views/'.$view.'.php' );
        return 1;
    }

  }
  public static function load($name='welcome.official')
  {
    require_once( './includes/views/Root.php' );
  }

}
