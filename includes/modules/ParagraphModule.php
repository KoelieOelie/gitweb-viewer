<?php

class ParagraphModule extends Module
{
  public function generate($value='')
  {
    // code...
  }
  public function render()
  {
    $BufferOut="<div><p>";
    $text = $this->text_fixer($this->getData("text","r"));
    $BufferOut.=$text;
    $padding = $this->getData("padding","o");
    $image = $this->getData("image","o");
    //$BufferOut.=$this->slot_static("fuel");
    //$BufferOut.=$this->slot_r('slot-fuel',"36x36");
    //$BufferOut.=$this->slot_static("progress");
    //$BufferOut.=$this->slot_r("slot-result","52x52");
    $BufferOut.="</p></div>";

  	return $BufferOut;
  }
}





 ?>
