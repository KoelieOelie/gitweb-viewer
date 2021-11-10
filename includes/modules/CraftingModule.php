<?php

class CraftingModule extends ContanderModule
{
  public function render()
  {
    $BufferOut="";
      for ($i=0; $i <9 ; $i++) {
        $BufferOut.=$this->slot_o('slot-'.($i+1));
      }
      $BufferOut.=$this->slot_r("slot-result","52x52");
  	return $this->container("crafting_table",$BufferOut);
  }
}





 ?>
