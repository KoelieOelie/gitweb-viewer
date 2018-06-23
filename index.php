<?php $colordir="./Asetes/systeem/color";
if (isset($_POST["url"])) {
  $url=$_POST["url"];
}
?>
<?php include"gitweb.php";?><!DOCTYPE html>
<html>
<head>
<style>
<?php echo(_icon("./Asetes/textures/gui/icons_290.png","Current Icons.txt",14,14,190,50));
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
    /*text-shadow: 2px 2px #FF0000;8*/
}
footer{
	background-color: #333d41;
}
footer h1{
	font-weight: normal;
}
div#Banner{
	background-repeat: no-repeat;
  height: 150px;
}
div#Banner h1{
  font-weight: normal;
    position: relative;
    top: 36px;
    left: 345px;
    width: fit-content;
    font-size: 60px;
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
<?php if ($url=="Demo.brouwser"): ?>
#contander{
background-image: url(./Asetes/textures/gui/demo.jpg);
  height: 663px;
}
<?php endif; ?>
#frame{
  position: absolute;
    top: 139px;
    left: 45px;
    width: 1089px;
    height: 429px;
        overflow-y: scroll;
}
#frame span#txt{
  position: relative;
top: 9px;
left: 14px;
font-size: 30px;
width: 1021px;
display: block;
}
form{
  position: relative;
    top: 80px;
    left: 50px;
}
nav a{
  display: inline-block;
position: relative;
top: 0px;
/* left: 0px; */
margin: 9px;
height: 54px;
width: fit-content;
background-color: aliceblue;
}
</style>
</head>
<body style="font-family: Minecraft;">
<div id="contander">
<form method="post">
<input id="URLBAR" name="url" value="<?php echo$url;?>" style=""></input>
<?php echo(_Button("","ARROW_RIGHT","Submit","HomePage","welcome.official")._Button("","HOME","Link","HomePage","welcome.official"));?>
</form>
<div id="frame" style="background-color:#ffa50096;"><?php
echo(_LoadWebpage($url)); ?></div>
</body>
</html>
