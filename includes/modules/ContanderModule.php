<?php
/** item_slot
 *
 */
class ContanderModule extends Module
{
  protected $params;
  protected function get_data ($n) {
    $mcitems=New MinecraftItems();
    //print_r($this->params);echo "=>$n<hr>";
    if (isset($this->params[$n])) {
      $data=$this->params[$n];
      $item=$mcitems->get_item($data["id"]);
      $data["src"]=$item["src"];
      $data["Count"]=strval($data["Count"]);
      $data["tooltip"]=$item["label"];
      return $data;
    } else {
      return false;
    }

  }
  public function slot_o($naam,$empty="",$size="36x36")
  {

    $data=$this->get_data($naam);
    $slotr="";
    if ($data!==false) {
      $slotr.='<div class="have_item_in_slot '.$naam.'">';
      $src=$data["src"];
      $count=$data["Count"];
      $tooltip=$data["tooltip"];
      $key=$data["id"];
      $slotr.='<span class="count num'.$count.'" size="'.$size.'"></span>';
      $slotr.='<span class="item" data-tooltip_label="'.$tooltip.'" data-tooltip_key="'.$key.'" style="background:url('.$src.')"></span>';
      $slotr.="</div>";
    } else {
      if ($empty!=="") {
        $slotr.='<div class="'.$naam.'">';
        $slotr.='<span class="'.$empty.'" size="'.$size.'"></span>';
        $slotr.="</div>";
      }
    }
    return $slotr;

  }
  public function slot_r($naam,$size="36x36")
  {
    //print_r($params);
    $data=$this->get_data($naam);
    $enabled = ($data!==false) ? 'have_item_in_slot ' : "" ;
    $slotr='<div class="'.$enabled.$naam.'">';
    if ($data!==false) {
      $src=$data["src"];
      $count=$data["Count"];
      $tooltip=$data["tooltip"];
      $key=$data["id"];
      $slotr.='<span class="count num'.$count.'" size="'.$size.'"></span>';
      $slotr.='<span class="item" data-tooltip_label="'.$tooltip.'" data-tooltip_key="'.$key.'" style="background:url('.$src.')"></span>';
    } else {
      $slotr.='<span class="count num65" size="'.$size.'"></span>';
    }
    $slotr.="</div>";
    return $slotr;
  }
  public function slot_static($naam)
  {
    return '<div class="'.$naam.'"></div>';
  }
  public function container($ModuleName='Empty',$content="")
  {

    //$title=$this->text_fixer($params['text']);
    //$dic=$this->text_fixer($params['dic']);
      $out='<div class="ModuleContaner">';
      if ($this->getData("title")||$this->getData("desc")) {
        $retVal = ($this->getData("desc")) ? " floatr" : "" ;
        $out='<div class="ModuleContaner'.$retVal.'">';
        //print_r($this->params);
        if ($this->getData("title")) {
          $title=$this->text_fixer("&p&r".$this->getData("title","g"));
          $out.='<h1>'.$title.'</h1>';
        }
        if ($this->getData("desc")) {
          $out.='<p>'.$this->getData("desc","g").'</p>';
        }
      }
      $out.='<div class="slot-contander '.$ModuleName.'">';
        $out.=$content;
      $out.='</div>';
    $out.='</div>';
    return $out;
  }
  public function render()
  {
    if (isset($this->params["error"])) {
      return "<span>".$this->params["error"].":This Module is not yet done, Sorry. work on it ;-)</span><br>";
    }

  }

}

/*.count[size="#{$w}x#{$h}"].num#{$i} {
  @debug "x:#{$x},y:#{$y}";
  background-position: 0px 0px;
}*/






 ?>
