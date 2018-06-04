<?php $colordir="./Asetes/systeem/color" ?>
<?php include"gitweb.php";?><!DOCTYPE html>
<html>
<head>
<style>
<?php echo(_icon("https://raw.githubusercontent.com/MrCrayfish/MrCrayfishDeviceMod/master/src/main/resources/assets/cdm/textures/gui/icons.png","Current Icons.txt",10,10,190,50));
?>
@font-face {
    font-family: Minecraft;
    src: url(Asetes/systeem/font/Binky.otf);
    font-weight: bold;
}
@font-face {
    font-family: Minecraft;
    src: url(Asetes/systeem/font/Binky Left.otf);
	font-style:italic;
    font-weight: bold;
}
@font-face {
    font-family: Minecraft;
    src: url(Asetes/systeem/font/Nor.otf);
    font-weight: normal;
}
@font-face {
    font-family: Minecraft;
    src: url(Asetes/systeem/font/Left.otf);
	font-style:italic;
    font-weight: normal;
}
*{
	font-family: Minecraft;
	margin: 0;
    padding: 0;
}
footer{
	background-color: #333d41;
}
footer h1{
	font-weight: normal;
}
div#Banner{
	background-repeat: no-repeat;
}
div#Banner h1{
	font-weight: normal;
}
#URLBAR{
	    background-image: url(./Asetes/textures/gui/Inputbox.png);
    width: 408px;
    height: 48px;
    background-repeat: no-repeat;
    border: none;
    text-align-last: center;
    font-size: xx-large;
}
a {
	text-decoration: none;
}
</style>
</head>
<body style="font-family: Minecraft;">
<div id="contander">
<?php //echo(_icon("https://raw.githubusercontent.com/MrCrayfish/MrCrayfishDeviceMod/master/src/main/resources/assets/cdm/textures/gui/icons.png","Current Icons.txt",10,10,190,50));
?>
<form>
<input id="URLBAR" name="url" value="<?php echo$url;?>" style=""></input>
<?php echo(_Button("","ARROW_RIGHT","Submit","HomePage","welcome.official")._Button("","HOME","Link","HomePage","welcome.official"));?>
<div id="frame" style="background-color:#ffa50096;"><?php 
echo(_LoadWebpage($_GET["url"])); ?></div>
</body>
</html>
