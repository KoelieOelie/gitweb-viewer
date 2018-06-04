<?php
function Browser(){
$data=file('https://raw.githubusercontent.com/MrCrayfish/GitWeb-Sites/master/official/welcome/websites/index');
print_r($data);
$out="<h1>accessible websites on gitweb program on the MrCrayfish Device Mod</h1>";
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
print_r($websites);
return $out;
}
function GetWebsite(){
$data=file('https://raw.githubusercontent.com/MrCrayfish/GitWeb-Sites/master/official/welcome/websites/index');
print_r($data);
$out="<h1>accessible websites on gitweb program on the MrCrayfish Device Mod</h1>";
$websites=explode('\n',$data[30]);
$av=sizeof($websites);
for($i=0;$i<=$av;$i++){
	if(isset($websites[$i])){
		if($websites[$i]==""){}else{
			$out.=_Button($websites[$i],"ARROW_RIGHT","LinkWebsite-$i",$websites[$i]);
		}
	}
}
print_r($websites);
return $out;
}
//$text="",$icon="",$type="Submit",$id="IHaveNoId",$href=""

?>