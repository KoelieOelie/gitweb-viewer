<?php
if (isset($_GET['Debug'])) {
  print_r($_POST);
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
  function __construct($url)
  {
    if($url!=""){
      $url="welcome.official";
    }
    $s1 = explode(".", $url);
    $this->domain=$s1[0];
    $extension=explode("/", $s1[1]);
    $urlsplitValue=sizeof($extension)-1;
    $this->extension=$extension[0];
    if($urlsplitValue!=0){
  		for($i=1;$i<=$urlsplitValue;$i++){
  			$SubDir.=$extension[$i]."/";
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
}


  function CheckUrl(){


  	if($this->extension($this->extension)==false){
      if($this->extension=="brouwser"){
        $this->theme="gitwebgui";
        $this->MakeUrl("./Data/:extension/:domain/index");
        $this->cicon("ok");
      }else {
        $this->theme="notExapet";
        $this->MakeUrl("./Data/error/404D");
        $this->cicon("404");
      }
    }
    if($this->extension($this->extension)==true){
      $array = get_headers($this->github);
      Print_r($array);
      $string = $array[0];
      if(strpos($string,"200")){
        $this->cicon("ok");
      }if(strpos($string,"404")) {
        $this->theme="notFond";
        $this->MakeUrl("./Data/error/404");
        $this->cicon("404");
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




} ?>
