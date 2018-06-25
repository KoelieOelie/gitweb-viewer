<?php
if (isset($_GET['Debug'])) {
  //print_r($_POST);
  ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Testing tesing</title>
      <?php if ($_POST["url"]!=""){
        $url=new URL($_POST["url"]);
        //echo $url->GetGitHubUrl();
        ?>
        <link rel="shortcut icon" href="<?php echo $url->icon; ?>">

      <?php } ?>

    </head>
    <body>
      <form class="" action="TestUrl.php?Debug" method="post">
        <input type="text" name="url" value=""><button type="submit" name="Test">Test de url</button>
      </form>
      <?php if ($_POST["url"]!=""){
        echo $url->extension." ".$url->domain;
        echo "<h1>".$url->GetGitHubUrl()."</h1>";
      }

        ?>

    </body>
  </html>
  <?php
} else {

}
class URL
{
  public $domain="";
  public $extension="";
  private $directory="";
  private $github="https://raw.githubusercontent.com/MrCrayfish/GitWeb-Sites/master/:extension/:domain/:directoryindex";
  public $theme="website";
  public $icon="";
  public $Respons="";
  public $extensions;
  function __construct($url)
  {
    if($url==""){
      $url="welcome.official";
    }
    $s1 = explode(".", $url);
    $this->domain=$s1[0];
    $extension=explode("/", $s1[1]);
    $urlsplitValue=sizeof($extension)-1;
    $this->extension=$extension[0];
    if($urlsplitValue!=0){
      if($urlsplitValue!=1){
  		  for($i=1;$i<=$urlsplitValue;$i++){
  			   $SubDir.=$extension[$i]."/";
  		  }
      }else {
        $SubDir=$extension[1]."/";
      }
  		$this->directory=$SubDir;
  	}else{
  		$this->directory="";
  	}
    $this->github=str_replace(":domain",$this->domain,$this->github);
    $this->github=str_replace(":extension",$this->extension,$this->github);
    $this->github=str_replace(":directory",$this->directory,$this->github);
    $this->CheckUrl();
  }
  public function GetData(){
    $data=file($this->github);
    return$data;
}


  function CheckUrl(){


  	if($this->extension($this->extension)==false){
      if($this->extension=="brouwser"){
        $this->theme="gitwebgui";
        $this->MakeUrl("./Data/:extension/:domain/index");
        $this->cicon("ok");
        $this->Respons="Load Brouwser";
      }else {
        $this->theme="notExapet";
        $this->MakeUrl("./Data/error/404D");
        $this->cicon("404");
        $this->Respons="Extension Not Suported";
      }
    }
    if($this->extension($this->extension)==true){
      $array = get_headers($this->github);
      //Print_r($array);
      $string = $array[0];
      if(strpos($string,"200")){
        $this->cicon("ok");
        $this->Respons="Load Ok";
      }if(strpos($string,"404")) {
        $this->theme="notFond";
        $this->MakeUrl("./Data/error/404");
        $this->cicon("404");
        $this->Respons="404";
      }
    }
  }

  function cicon($icon)
  {
    $Enable="https://raw.githubusercontent.com/MrCrayfish/DeviceMod-CertifiedApps/master/assets/cdm/gitweb/icon.png";
    $Disable="./Asetes/textures/icons/disable.png";
    if ($icon=="404") {
      $this->icon=$Disable;
    }
    if ($icon=="ok") {
      $this->icon=$Enable;
    }
  }

  function MakeUrl($newGitHubUrl){
    $this->github=$newGitHubUrl;
    $this->github=str_replace(":domain",$this->domain,$this->github);
    $this->github=str_replace(":extension",$this->extension,$this->github);
    $this->github=str_replace(":directory",$this->directory,$this->github);
  }
    function extension($extension,$extensions=array("official","app","wiki","craft","web")){
  	//print_r(in_array($Domain,$Domains));
    $this->extensions=$extensions[0];
    for ($i=1; $i < sizeof($extensions)-2; $i++) {
      $this->extensions.=",".$extensions[$i];
    }
    $this->extensions.=" En ".$extensions[sizeof($extensions)-1];
  	if(in_array($extension,$extensions)=="1"){
  		return true;
  	}else{return false;}
  }
  public function GetGitHubUrl()
  {
    $github="https://raw.githubusercontent.com/MrCrayfish/GitWeb-Sites/master/:extension/:domain/:directoryindex";
    $github=str_replace(":domain",$this->domain,$github);
    $github=str_replace(":extension",$this->extension,$github);
    $github=str_replace(":directory",$this->directory,$github);
    return $github;
  }
} ?>
