<?php $colordir="./Asetes/systeem/color";
include"./TestUrl.php";
$class=new URL($_COOKIE["url"]);
?>
<?php include"gitweb.php";?>
<!DOCTYPE html>
<html>
<head>
  <title>GitWeb - <?php echo $_COOKIE["url"];?></title>
  <link rel="shortcut icon" href="<?php echo $class->icon;?>">
<style>
<?php
echo(_icon("https://raw.githubusercontent.com/MrCrayfish/MrCrayfishDeviceMod/master/src/main/resources/assets/cdm/textures/gui/icons.png","Current Icons.txt",2));
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
  background-size: contain;
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
<?php if ($_COOKIE["url"]=="Demo.brouwser"): ?>
#contander{
background-image: url(./Asetes/textures/gui/Template.png);
  height: 663px;
}
<?php else: ?>
#contander{
background-image: url(./Asetes/textures/gui/NRJ.png);
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
form a, form input[type=Submit]{
  height: 54px;
    width: 54px;}
nav a{
  display: inline-block;
position: relative;
top: 0px;
margin: 9px;
height: 54px;
width: 140px;
background-color: aliceblue;
margin-right: 3px;
margin-left: 10px;
color: #fff;
}
nav a i{
  position: relative;
    top: 7px;
    left: 7px;
    opacity: 0.5;
      filter: alpha(opacity=50);
}
nav a span{
  position: relative;
    top: -4px;
    left: 13px;
    font-size: 30px;}
    img {
      image-rendering: pixelated;
    }
    #infotext{color: #fff;
    display: block;
    position: relative;
    top: -28px;
    left: 51px;
    font-size: 30px;}
</style>
</head>
<body style="font-family: Minecraft;">
<div id="contander" class="<?php echo$class->theme ;?>">
<form method="post">
<input id="URLBAR" name="url" value="<?php echo$_COOKIE["url"];?>" style=""></input>
<?php echo(_Button("","ARROW_RIGHT","Submit","Subbje","")._Button("","HOME","Link","HomePage","welcome.official"));?>
</form>
<span id="infotext">GitWeb - <?php echo $_COOKIE["url"];?>
<?php if ($class->Respons!="Extension Not Suported"||$class->Respons!="404"): ?>

<?php else: ?>
  :-S
<?php endif; ?>
</span>
<div id="frame" style="background-color:#ffa50096;">
<span id="top"></span>
<?php
//print_r($class->GetData());
$out=str_replace(":CE",$class->extensions,_RenderWebpage($class->GetData()));
echo($out); ?></div>
<img src="<?php echo $class->icon;?>" alt="" style="position: relative;
    top: 507px;
    left: 238px;
    width: 47px;">
</body>
</html>
