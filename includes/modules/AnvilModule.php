<?php

class AnvilModule extends ContanderModule
{
  public function render()
  {
    $BufferOut=$this->slot_o('slot-1',"36x36");
    $BufferOut.=$this->slot_o('slot-2',"36x36");
    $BufferOut.=$this->slot_r("slot-result","36x36");

  	return $this->container("anvil",$BufferOut);
  }
}





 ?>
