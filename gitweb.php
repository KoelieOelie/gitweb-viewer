<?php 
include"Domain.php";
include"getwebsite.php";
include"$colordir/Colorize.php";
include"$colordir/Gen.php";
include"./Modules/Header.php";
include"./Modules/Footer.php";
include"./Modules/Banner.php";
include"./Modules/Paragraph.php";
include"./Modules/Nav.php";
include"Modules/icon.php";
//include"Comect.txt";
//print($_GET["url"]);
if(isset($_GET["url"])){
	$url=$_GET["url"];
}

function _LoadWebpage($string,$GitHub="https://raw.githubusercontent.com/MrCrayfish/GitWeb-Sites/master/:extension/:Domain/:directoryindex"){
	$SubDir="";
	$urlin = explode(".", $string);
	$domain=$urlin[0];
	print_r($urlin);
	$urlsplit = explode("/", $urlin[1]);
	$urlsplitValue=sizeof($urlsplit)-1;
	print_r($urlsplit);
	$extension=$urlsplit[0];
	$AllouwdDomain=_Domains($extension);
	if(startsWith($domain,"webagive/p/")){
		echo"WebAgive";
		$domain=str_replace("webagive/p/","",$domain);
		$HTPPDIR=str_replace("index.php","",$_SERVER['PHP_SELF']);
		echo$_SERVER['PHP_SELF'];
		$GitHub="http://".$_SERVER['SERVER_NAME'].$HTPPDIR."WebAgive/:extension/:Domain/:directoryindex";
	}elseif(startsWith($domain,"brouwser")){
		$browser=$urlsplit;
		echo$domain;
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
	//echo $URL;

	if($AllouwdDomain=="C"){
		//print_r(get_headers($URL, 1));
		$ChekCeck=get_headers($URL, 1);
		if($ChekCeck[0]="HTTP/1.1 200 OK"){
			$data=file($URL);
		}else{
			$data=file("error.gitweb");
		}
		return _RenderWebpage($data);
	}else{
		if(isset($browser)){
			return Browser($Browser);		
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


function _RenderWebpage($data){
	$dataBuffer="";
	//echo "<pre>";
	//print_r($data);
	//echo "</pre>";
	//echo"<hr>";
	$DataGala=sizeof($data)-1;
	for($i=0;$i<=$DataGala;$i++){
		if(startsWith($data[$i],"#")){
			$CMod=str_replace("#","",$data[$i]);
			$cleanedstr = preg_replace(
    "/(\t|\n|\v|\f|\r| |\xC2\x85|\xc2\xa0|\xe1\xa0\x8e|\xe2\x80[\x80-\x8D]|\xe2\x80\xa8|\xe2\x80\xa9|\xe2\x80\xaF|\xe2\x81\x9f|\xe2\x81\xa0|\xe3\x80\x80|\xef\xbb\xbf)+/",
    "",
    $CMod
);
			switch ($cleanedstr) {
				case "footer":
					//if()
						$input=array();
						for($y=1;$y<=4;$y++){
							if(isset($data[$i+$y])){
								array_push($input,$data[$i+$y]);
							}
						}
						$dataBuffer.=Footer($input);
					break;
				case "header":
					//if()
						$input=array();
						for($y=1;$y<=4;$y++){
							if(isset($data[$i+$y])){
								array_push($input,$data[$i+$y]);
							}
						}
						//$dataBuffer.=HeaderFun($input);
					break;
				case "banner":
					//if()
						$input=array();
						for($y=1;$y<=2;$y++){
							if(isset($data[$i+$y])){
								array_push($input,$data[$i+$y]);
							}
						}
						$dataBuffer.=banner($input);
					break;
				case "paragraph":
					//if()
						$input=array();
						for($y=1;$y<=3;$y++){
							if(isset($data[$i+$y])){
								array_push($input,$data[$i+$y]);
							}
						}
						$dataBuffer.=paragraph($input);
					break;
				case "divider":
					//if()
						$input=array();
						for($y=1;$y<=2;$y++){
							if(isset($data[$i+$y])){
								array_push($input,$data[$i+$y]);
							}
						}
						//$dataBuffer.=paragraph($input);
					break;
				case "navigation":
					//if()
						$input=array();
						for($y=1;$y<=30;$y++){
							if(isset($data[$i+$y])){
								if(startsWith($data[$i+$y],"item-")){
								array_push($input,$data[$i+$y]);
								}
							}
						}
						$dataBuffer.=nav($input);
					break;
				default:
					$dataBuffer.="<span>".$cleanedstr.":Deze Module is nog niet tovegoegt aan deze php bestand, Sorry. werk er nog aan ;-)</span>"."<br>";
			}
		}
	}
	return$dataBuffer;
}
?>