<?php
include"Domain.php";
include"getwebsite.php";
include"Render.php";
include"$colordir/Colorize.php";
include"$colordir/Gen.php";
include"./Modules/Header.php";
include"./Modules/Footer.php";
include"./Modules/Banner.php";
include"./Modules/Paragraph.php";
include"./Modules/Nav.php";
include"Modules/icon.php";

function _LoadWebpage($string,$GitHub="https://raw.githubusercontent.com/MrCrayfish/GitWeb-Sites/master/:extension/:Domain/:directoryindex"){
	$SubDir="";
	$urlin = explode(".", $string);
	$domain=$urlin[0];
	//print_r($urlin);
	$urlsplit = explode("/", $urlin[1]);
	$urlsplitValue=sizeof($urlsplit)-1;
	//print_r($urlsplit);
	$extension=$urlsplit[0];
	$AllouwdDomain=_Domains($extension);
	if(startsWith($domain,"webagive/p/")){
		echo"WebAgive";
		$domain=str_replace("webagive/p/","",$domain);
		$HTPPDIR=str_replace("index.php","",$_SERVER['PHP_SELF']);
		echo$_SERVER['PHP_SELF'];
		$GitHub="http://".$_SERVER['SERVER_NAME'].$HTPPDIR."WebAgive/:extension/:Domain/:directoryindex";
	}elseif(startsWith($extension,"brouwser")){
		$browser=$urlin[0];
	}
	if($urlsplitValue!=0){
		for($i=1;$i<=$urlsplitValue;$i++){
			$SubDir.=$urlsplit[$i]."/";
		}
		$URL=str_replace(":directory",$SubDir,$GitHub);
	}else{
		$URL=str_replace(":directory","",$GitHub);
	}

	$URL=str_replace(":extension",$extension,$URL);
	$URL=str_replace(":Domain",$domain,$URL);

	if($AllouwdDomain=="C"){
		//print_r(get_headers($URL, 1));
		//if(get_headers($URL, 1)=="HTTP/1.1 200 OK"){
			$data=file($URL);
		//}else{
			//$data=file("error.gitweb");
		//}
		return _RenderWebpage($data);
	}else{
		if(isset($browser)){
			return Browser($browser);
		}
	}
}

function startsWith($haystack, $needle)
{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);

    return $length === 0 ||
    (substr($haystack, -$length) === $needle);
}
?>
