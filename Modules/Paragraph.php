
<?php  
function paragraph($data,$color=""){
	//print_r($data);
	
	$DataGala=sizeof($data)-1;
	for($i=0;$i<=$DataGala;$i++){
		$Settings = explode("=", $data[$i]);
		//echo$Settings[1];
		switch ($Settings[0]) {
			case "text":
				$title=$Settings[1];
				break;
			case "padding":
				$padding=$Settings[1];
				break;
			case "image":
				$image=$Settings[1];
				break;
			default:
				
		}
	}
	if(isset($Sub_title)){
		$BufferOut="<div id='Para' style='background-image: url($Sub_title);'>";
	}else{
		$BufferOut="<div id='Para' style=''>";
	}
	$BufferOut.="<h1>".parseMinecraftColors($title)."</h1>";
	$BufferOut.="</div>";
	return$BufferOut;
}
//Banner(image(R),text(O))
?>