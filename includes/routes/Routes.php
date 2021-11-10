<?php
// This is the index page. The first route.
Route::set("", function() {
  View::load("exp.data");
});


$li=new GitwebWebsiteListClass;

foreach ($li->get() as $route) {
  Route::set($route, function($name) {
    View::load($name);
  });
}
