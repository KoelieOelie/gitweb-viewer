<?php
function Footer($data,$color=""){
	//print_r($data);

	$DataGala=sizeof($data)-1;
	for($i=0;$i<=$DataGala;$i++){
		$Settings = explode("=", $data[$i]);
		//echo$Settings[1];
		switch ($Settings[0]) {
			case "title":
				$title=$Settings[1];
				break;
			case "sub-title":
				$Sub_title=$Settings[1];
				break;
			case "home-page":
				$home=$Settings[1];
				break;
			case "color":
				$color=$Settings[1];
				break;
			default:

		}
	}
	$BufferOut="<footer style='display: block;'>";
	$BufferOut.="<h1>".$title."</h1>";
	$BufferOut.="<h2>".$Sub_title."</h2>";
	$BufferOut.=_Button("","HOME","Link","NaarHome",$home)._Button("","ARROW_UP","Link","BtnNaarBoven","#top");
	$BufferOut.="</footer>";
	return$BufferOut;
}
//Footer($title(R),Sub-title(R),home-page(R),color(O))
?>
