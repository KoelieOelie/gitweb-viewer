<?php

/**
 *
 */
class Module extends Utils
{
  protected function getData ($n,$type="t") {
    switch ($type) {
      case 'o':
        $r="";
        if (isset($this->params[$n])) {
          $r=$this->params[$n];
        }
        return $r;
        break;
      case 'r':
        $r=false;
        if (isset($this->params[$n])) {
          $r=$this->params[$n];
        }
        return $r;
        break;
      case 'g':
        return $this->params[$n];
        break;

      default:
        return isset($this->params[$n]);

        break;
    }

  }
  public function init($params=array())
  {
    //print_r($params);
    $this->params=$params;
    return $this->render();
  }
}







 ?>
