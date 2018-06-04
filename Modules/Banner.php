<?php  
function Banner($data,$color=""){
	//print_r($data);
	
	$DataGala=sizeof($data)-1;
	for($i=0;$i<=$DataGala;$i++){
		$Settings = explode("=", $data[$i]);
		echo$Settings[1];
		switch ($Settings[0]) {
			case "text":
				$title=parseMinecraftColors($Settings[1]);
				break;
			case "image":
				$Sub_title=$Settings[1];
				break;
			default:
				
		}
	}
	$BufferOut="<div id='Banner' style='background-image: url($Sub_title);'>";
	$BufferOut.="<h1>".$title."</h1>";
	$BufferOut.="</div>";
	return$BufferOut;
}
//Banner(image(R),text(O))
?>
