<?php
session_start();
spl_autoload_register(function ($name) {
  if (preg_match('/Module$/', $name))
  {
    $name = "includes/modules/${name}";
  }else {
    $name = "includes/classes/${name}";
  }
  if (file_exists($name.'.php')) {
    include_once $name.'.php';
  }

});
require_once( './includes/_Globals.php' );
require_once( './includes/routes/Routes.php' );
(new Weber)->Run();
