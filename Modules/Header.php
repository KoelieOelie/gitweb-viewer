<?php  
function HeaderFun($data,$color=""){
	//print_r($data);
	
	$DataGala=sizeof($data)-1;
	for($i=0;$i<=$DataGala;$i++){
		$Settings = explode("=", $data[$i]);
		echo$Settings[1];
		switch ($Settings[0]) {
			case "text":
				$title=$Settings[1];
				break;
			case "scale":
				if(isset($Settings[1])){
				$Sub_title=$Settings[1];
				}
				break;
			case "align":
				$home=$Settings[1];
				break;
			case "padding":
				$color=$Settings[1];
				break;
			default:
				
		}
	}
	$BufferOut="<footer style='display: block;'>";
	$BufferOut.="<h1>".parseMinecraftColors($title)."</h1>";
	$BufferOut.="</footer>";
	return$BufferOut;
}
//Footer($text(R),scale(O),align(O),padding(O))
?>