<?php

function read_all_files($root = '.'){
  $files  = array('gitweb_pages'=>array(),"file"=>array());
  $directories  = array();
  $last_letter  = $root[strlen($root)-1];
  $root  = ($last_letter == '\\' || $last_letter == '/') ? $root : $root.DIRECTORY_SEPARATOR;

  $directories[]  = $root;

  while (sizeof($directories)) {
    $dir  = array_pop($directories);
    if ($handle = opendir($dir)) {
      while (false !== ($file = readdir($handle))) {
        if ($file == '.' || $file == '..') {
          continue;
        }
        $file  = $dir.$file;
        if (is_dir($file)) {
          $directory_path = $file.DIRECTORY_SEPARATOR;
          array_push($directories, $directory_path);
          //$files['dirs'][]  = $directory_path;
        } elseif (is_file($file)) {
          $temp=explode(".",$file);
          if (!isset($temp[1])) {
            $stack=explode("\\",str_replace($root,"",$file));
            $extension = $stack[0];
            $domain = $stack[1];
            $new=array(0=>"");
            //unset($stack[0]);
            //unset($stack[1]);
            for ($i=2; $i < sizeof($stack) ; $i++) {
              if ($stack[$i]!=="index") {
                $new[]=$stack[$i];
              }

            }
            //print_r($new);
            $files['gitweb_pages'][]  = "$domain.$extension".join("/",$new);
            //$explode
          }else {
            $files['file'][]  = str_replace($root,"",$file);
            // code...
          }
          //print_r($temp);

        }
      }
      closedir($handle);
    }
  }

  return $files;
}
/**
 *
 */
class GitwebWebsiteListClass
{
  private $list;
  function __construct()
  {
    $this->list=read_all_files("Old\\Data\\GITHUB\\");
  }
  public function get()
  {
    return $this->list["gitweb_pages"];
  }
}





 ?>
