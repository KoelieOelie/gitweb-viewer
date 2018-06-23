<?php
function _Button($text="",$icon="",$type="Submit",$id="IHaveNoId",$href=""){
	switch ($type) {
		case "Link":
			if($href!="#top"){
				if($icon!=""){
				$ButtonBuffer="<a href='index.php?url=".$href."'><i id='icon' class='".$icon."'></i>$text</a>";
				}else{
					$ButtonBuffer="<a href='index.php?url=".$href."'>$text</a>";
				}
			}
			else{
				$ButtonBuffer="<a href='".$href."'><i id='icon' class='".$icon."'></i>$text</a>";
			}
			break;
		case "Submit":
			$ButtonBuffer="<input type='submit' value='' id='".$icon."'></input>";
			break;
		default:
			$ButtonBuffer="<i id='icon' class='WARNING'></i> The choice '$type' is still in the making. So wait a moment for pls <i id='icon' class='WARNING'></i>";
	}
	return $ButtonBuffer;

}
function _icon($url,$namesurl="CurrentIcons.txt",$width=10,$height=10,$dx=190,$dy=50){
	$icons=file($namesurl);
	$split_values="";
	$buffer="i#icon,input[type=submit] {
		    display: inline-block;
			background-image: url($url);
			background-repeat: no-repeat;
			width: 		".$width."px;
			height: 	".$height."px;
			background-position-x: -".$dx."px;
			background-position-y: -".$dy."px;
			font-style: normal;
			border: none;
	} ";
	//echo "<pre>";
	//print_r($icons);
	//echo "</pre>";
	//echo"<hr>";
	$aantalicons=sizeof($icons)-1;
	$txt="";
	for ($i=0; $i <= $aantalicons; $i=$i+20) {
		for ($g=0; $g <= 19; $g++) {
			if($g!=19){
				if(isset($icons[$i+$g])){
					$split_values.=$icons[$i+$g].":";
				}
			}else{
				if(isset($icons[$i+$g])){
					$split_values.=$icons[$i+$g].";";
				}
			}
		}
	}


$row=explode(";", $split_values);
$rows=sizeof($row)-1;
for ($y=0; $y <= $rows; $y++) {
	$CY=($width*$y);
	$CRow=explode(":", $row[$y]);
	//echo "<pre>";
	//print_r($CRow);
	$item=sizeof($CRow)-1;
	//echo "</pre><br>";
	for ($x=0; $x <= $item; $x++) {
		$CX=($height*$x);
		If($CRow[$x]!=""){
			$buffer.="i#icon.".$CRow[$x].",input[type=submit]#".$CRow[$x]." {
				background-position-x: -".$CX."px;
				background-position-y: -".$CY."px;
			}";
		}
	}
}
//echo"<hr>";
//echo "<pre>";
	//print_r($row);
	//echo "</pre>";


	return $buffer;


}
?>
