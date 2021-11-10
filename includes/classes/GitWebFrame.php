<?php

class GitWebFrame
{
  public $ICON_SIZE=14;
  private $BORDER=10;
  private $DEVICE_WIDTH=384;
  private $DEVICE_HEIGHT=216;
  private $SCREEN_WIDTH;
  private $SCREEN_HEIGHT;
  private $width;
  private $height;
  private $poss=array();
  function __construct($w,$h){
    $this->width=$w;
    $this->height=$h;

  }
  private function GetParams($i,$data){
    $params=array();
    $utl=new Utils;
    $finished = false;                     // we're not finished yet (we just started)
    while (!$finished):                   // while not finished
      if (isset($data[$i])) {
        $current_str=$data[$i];
        if (!$utl->startsWith($current_str,"#")) {
          $par=explode("=",$current_str);
          $key=$par[0];
          if ($key!=="") {
            $value=$par[1];

            if ($utl->startsWith($value,"{")) {
              $value=$utl->json_decoderAndFixer($value);
            }
            $params[$key]=$value;


          }
          $i++;
        }else {
          $finished = true;
        }
      }else {
        $finished = true;
      }

    endwhile;
    return $params;
    // code...
  }
  public function loadweb($url='exp.data'){

    $uri=new URI;
    $history = (isset($_SESSION["history"])) ? $_SESSION["history"] : array() ;

    if (file_exists($uri->toFile($url))) {
      $c=file_get_contents($uri->toFile($url));
    }else {
      //echo $uri->toFile($url);
      $c=file_get_contents("old/Data/error/404");
    }
    $history[]=$url;
    $_SESSION["history"]=$history;
    $out="#toolbar\r\n";
    $out.="history=".json_encode($history)."\r\n";
    $out.=$c;
    //echo "<pre>$out</pre>";
    return $this->loadstr($out);

  }
  public function loadstr($str)
  {
    $content_raw=explode("\n",str_replace(array("\r\n"),"\n",$str)."#");
    $utl=new Utils;
    $page=array();
    foreach ($content_raw as $key => $str) {
      if ($utl->startsWith($str,"#")) {
        $ModuleName=$utl->Clean_str(str_replace("#","",$str));
        if ($ModuleName!=="") {
          $page[]=array("module"=>$ModuleName,"params"=>$this->GetParams($key+1,$content_raw));
        }
      }
    }
    return $page;
  }
  public function render($data)
  {
    $div="<div id='contater'>";
    $utl=new Utils;
    foreach ($data as $item) {
      $moldule=$utl->HoofletterYay($item['module'])."Module";
      if (method_exists($moldule, 'init')) {
        $e=(new $moldule)->init($item['params']);
        if ($e!==false) {
          $div.=$e;
        }

      }else {
        $div.=(new ContanderModule)->init(array("error"=>$utl->HoofletterYay($item['module'])));
      }
      //(new $moldule)->render();
      //if (is_callable(array($moldule, 'render'))) {
        //$div.=call_user_func($moldule.'::render', "shave");
      //} else {
        //$div.=call_user_func('ErrorModule::render', $utl->HoofletterYay($item['module']));
      //}





      // code...
    }
    $div.="</div>";

    return $div;
  }
}
