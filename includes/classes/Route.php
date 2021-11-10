<?php
class Route {

  /*
   * Checks if the current route is valid. Checks the route
   * against the global $Routes array.
  */
  public static function isRouteValid() {
    global $Routes;
    $uri = $_SERVER['REQUEST_URI'];

    if (!in_array(explode('?',$uri)[0], $Routes)) {
      return 0;
    } else {
      return 1;
    }
  }

  // Insert the route into the $Routes array.
  private static function registerRoute($route) {

    global $Routes;
    $Routes[] = BASEDIR.$route;

  }
  private static function registerRoute_raw($route) {

    global $Routes_raw;
    $Routes_raw[] = BASEDIR.$route;

  }

  // This method creates dynamic routes.
  public static function dyn($dyn_routes) {
    // Split the route on '/', i.e user/<1>
    $route_components = explode('/', $dyn_routes);
    // Split the URI on '/', i.e user/francis
    $uri_components = explode('/', substr($_SERVER['REQUEST_URI'], strlen(BASEDIR)-1));

    // Loop through $route_components, this allows infinite dynamic parameters in the future.
    for ($i = 0; $i < count($route_components); $i++) {
      // Ensure we don't go out of range by enclosing in an if statement.
      if ($i+1 <= count($uri_components)-1) {
        // Replace every occurrence of <n> with a parameter.
        $route_components[$i] = str_replace("<$i>", $uri_components[$i+1], $route_components[$i]);
      }
    }
    // Join the array back into a string.
    $route = implode('/',$route_components);
    // Return the route.
    return $route;
  }

  // Register the route and run the closure using __invoke().
  public static function set($route, $fallback) {
      if ($_SERVER['REQUEST_URI'] == BASEDIR.$route) {
        self::registerRoute($route);
        $fallback->__invoke($route);
      } else if (explode('?', $_SERVER['REQUEST_URI'])[0] == BASEDIR.$route) {
        self::registerRoute($route);
        $fallback->__invoke($route);
      } else {
        if (isset($_GET['url'])) {
          if ($_GET['url'] === explode('/', $route)[0]) {
            self::registerRoute(self::dyn($route));
            $fallback->__invoke($route);
          }
        }
      }

      self::registerRoute_raw($route);
  }
}
