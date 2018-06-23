<?php
function Browser($input){
switch ($input) {
	case 'Demo':
		$data=file("https://pastebin.com/raw/TETGeHJu");
		return _RenderWebpage($data);
		break;
	case 'Help':
			return GetWebsite();
			break;
	default:
		// code...
		break;
}
}
function GetWebsite(){
$data=file('https://raw.githubusercontent.com/MrCrayfish/GitWeb-Sites/master/official/welcome/websites/index');
//print_r($data);
$out="<h1>".parseMinecraftColors("accessible websites on gitweb program on the MrCrayfish Device Mod")."</h1>";
$websites=explode('\n',$data[30]);
$av=sizeof($websites)-1;
for($i=0;$i<=$av-1;$i++){
	if(isset($websites[$i])){
		if($websites[$i]==""){}else{
			$website=str_replace("text=","",$websites[$i]);
			$out.="<br><b>"._Button(parseMinecraftColors(" ".$website),"ARROW_RIGHT","Link","LinkWebsite-$i",parseMinecraftColors($website,"Clear"))."</b>";
		}
	}
}
//print_r($websites);
return $out;
}
//$text="",$icon="",$type="Submit",$id="IHaveNoId",$href=""

?>
