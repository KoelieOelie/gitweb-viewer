<?php

class FurnaceModule extends ContanderModule
{
  public function render()
  {
    $BufferOut=$this->slot_r('slot-input',"36x36");
    $BufferOut.=$this->slot_static("fuel");
    $BufferOut.=$this->slot_r('slot-fuel',"36x36");
    $BufferOut.=$this->slot_static("progress");
    $BufferOut.=$this->slot_r("slot-result","52x52");

  	return $this->container("furnace",$BufferOut);
  }
}





 ?>
