<?php
include"getwebsite.php";
include"Render.php";
include"$colordir/Colorize.php";
include"$colordir/Gen.php";
include"./Modules/Header.php";
include"./Modules/Footer.php";
include"./Modules/Banner.php";
include"./Modules/Paragraph.php";
include"./Modules/Nav.php";
include"./Modules/icon.php";
if(isset($_GET["url"])){
	if($_GET["url"]==""){
		http_response_code(400);
		$url="400.Browser";
	}else {
		if(startsWith($_GET["url"],"<")||startsWith($_GET["url"],"&lt;")){
			http_response_code(400);
			$url="400.Browser";
		}else {
			setcookie("url", $_GET["url"]);
			header("Location: ./"); /* Redirect browser */
				/* Make sure that code below does not get executed when we redirect. */
				exit;
		}
	}
}
if(isset($_POST["url"])){
	if($_POST["url"]==""){
		http_response_code(400);
		$url="400.Browser";
	}else {
		if(startsWith($_POST["url"],"<")||startsWith($_POST["url"],"&lt;")){
			http_response_code(400);
			$url="400.Browser";
		}else {
			setcookie("url", $_POST["url"]);
			header("Location: ./"); /* Redirect browser */
				/* Make sure that code below does not get executed when we redirect. */
				exit;
		}
	}
}
if(isset($_COOKIE["url"])){}else{setcookie("url", "welcome.official");
header("Location: ./"); /* Redirect browser */
	/* Make sure that code below does not get executed when we redirect. */
	exit;}

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
