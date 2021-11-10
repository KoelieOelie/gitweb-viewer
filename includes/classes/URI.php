<?php
class URI {

  public static function get($param) {

    if (strpos($_SERVER['REQUEST_URI'], '?') !== false) {
      return explode('&', explode($param.'=', $_SERVER['REQUEST_URI'])[1])[0];
    } else {
      return false;
    }

  }
  public static function toFile($url='')
  {
    if($url==""){
      $url="welcome.official";
    }
    $github="Old/Data/GITHUB/:extension/:domain/:directoryindex";
    $s1 = explode(".", $url);
    $dom=$s1[0];
    $extension=explode("/", $s1[1]);
    $urlsplitValue=sizeof($extension)-1;
    $ext=$extension[0];
    if($urlsplitValue!=0){
      if($urlsplitValue!=1){
  		  for($i=1;$i<=$urlsplitValue;$i++){
  			   $SubDir.=$extension[$i]."/";
  		  }
      }else {
        $SubDir=$extension[1]."/";
      }
  		$dir=$SubDir;
  	}else{
  		$dir="";
  	}
    $github=str_replace(":domain",$dom,$github);
    $github=str_replace(":extension",$ext,$github);
    return str_replace(":directory",$dir,$github);


  }

}
