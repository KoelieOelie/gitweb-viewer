<?php
if (isset($_GET["Size"])) {
  $Size=$_GET["Size"];
  if($_GET["Size"]<=9){
    $Size=$_GET["Size"];
  }else {
    $Size=9;
  }
}else{$Size=0;}
if (isset($_GET["url"])) {
  $urllink=$_GET["url"];
}else{$urllink="https://raw.githubusercontent.com/MrCrayfish/MrCrayfishDeviceMod/master/src/main/resources/assets/cdm/textures/gui/icons.png";}
_Risise($urllink,$Size);
function _Risise($url,$size){
$size=$size+1;
$source_image = imagecreatefrompng($url);
$source_imagex = imagesx($source_image);
$source_imagey = imagesy($source_image);
$imagex=$source_imagex*$size;
$imagey=$source_imagey*$size;

$dest_image = imagecreatetruecolor($imagex, $imagey);

imagecopyresampled($dest_image, $source_image, 0, 0, 0, 0, $imagex,
$imagey, $source_imagex, $source_imagey);
if (function_exists('imagealphablending'))
{
				imagealphablending($dest_image, false);
		imagesavealpha($dest_image, true);
	}
header("Content-Type: image/png");
imagepng($dest_image,NULL,9);
}



?>
