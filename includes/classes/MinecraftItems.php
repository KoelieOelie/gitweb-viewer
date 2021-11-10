<?php

/**
 *
 */
class MinecraftItems
{
  private $content=array();
  private $name;
  private $dir;
  private function load_data()
  {
    $filename=$this->dir."/".$this->name;
    $content = (file_exists($filename)) ? json_decode(file_get_contents($filename),true) : array("items"=>array()) ;
    foreach ($content["items"] as $item) {
      if (isset($item["id"])) {
        $this->content[$item["id"]]=array("src"=>$item["texture"],"label"=>$item["readable"]);
      }
    }
  }
  function __construct($version="1.12",$dir="static/assets/mcitems")
  {
    $this->dir=$dir;
    $this->name=$version.".json";
    $this->load_data();
  }
  public function SetVersion($version)
  {
    $this->name=$version.".json";
    $this->load_data();
  }
  public function get_item($value)
  {

    return (isset($this->content[$value])) ? $this->content[$value] : array("src"=>"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAAXNSR0IArs4c6QA".
    "AAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAACrSURBVFhH7ZfRCYAwDESruFX36RL97l796VxKgicSKFoVY7AP5MD+JNc70CGEMDtFxlXV2ByIMfKLt0gpsao70AfoAzS3AOmVtLboMy2YVj0EE2P".
    "TUgorkOdnseOA3Nx7zwpyzqy18xr2akib7beju6eHHGq9f8JOBiS1Vpy9e6DuwO3vgaubw0F7LQBIv2xFK3YdQO8pA8jBFew6AP6bgafoA6gP8Pe/Y+cWdMtG+zHVpVwAAAAASUVORK5CYII=","label"=>"Unknow minecraft id");
  }

}








 ?>
