
<?php  
function Nav($data,$color=""){
	$link=array();
	$label=array();
	$icon=array();
	//echo '<pre>';
	//print_r($data);
	//echo '</pre>';
	$DataGala=sizeof($data)-1;
	for($i=0;$i<=$DataGala;$i++){
		$Settings = explode("=", $data[$i]);
		if(startsWith($Settings[0],"item-link-")){
		array_push($link,$Settings[1]);
		}
		if(startsWith($Settings[0],"item-label-")){
		array_push($label,$Settings[1]);
		}
		if(startsWith($Settings[0],"item-icon-")){
		array_push($icon,$Settings[1]);
		}
	}
	$BufferOut="<nav>";
	$out="";
	for($NavI=0;$NavI<=10;$NavI++){
		if(isset($label[$NavI])){
			$Clabel=$label[$NavI];
		}else{
			$Clabel="";
		}
		if(isset($icon[$NavI])){
			$Cicon=$icon[$NavI];
		}else{
			$Cicon="";
		}
		if(isset($link[$NavI])){
		$out.=_Button($Clabel,$Cicon,"Link","item$NavI",$link[$NavI]);
		}
		//$text="",$icon="",$type="Submit",$id="IHaveNoId",$href=""
	}
	$BufferOut.=$out."</nav>";
	//echo '<pre>';
	//print_r($link);
	//print_r($label);
	//print_r($icon);
	//echo '</pre>';
	return$BufferOut;
	
}
//Banner(image(R),text(O))
?>