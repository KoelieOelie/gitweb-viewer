<?php
if (isset($_GET['Debug'])) {
  print_r($_POST);
  ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Testing tesing</title>
    </head>
    <body>
      <form class="" action="TestUrl.php?Debug" method="post">
        <?php if ($_POST["url"]!=""){
          $url=new URL($_POST["url"]);
          echo $url->GetGitHubUrl();
          echo $url->theme;
        } ?>
        <input type="text" name="url" value=""><button type="submit" name="Test">Test de url</button>
      </form>
    </body>
  </html>
  <?php
} else {

}
class URL
{
  private $domain="";
  private $extension="";
  private $directory="";
  private $github="https://raw.githubusercontent.com/MrCrayfish/GitWeb-Sites/master/:extension/:domain/:directoryindex";
  public $theme="website";
  function __construct($url)
  {
    $s1 = explode(".", $url);
    $this->domain=$s1[0];
    $extension=explode("/", $s1[1]);
    $this->extension=$extension[0];
    $this->directory=str_replace($this->extension."/","",$s1[1])."/";
    $this->github=str_replace(":domain",$this->domain,$this->github);
    $this->github=str_replace(":extension",$this->extension,$this->github);
    $this->github=str_replace(":directory",$this->directory,$this->github);
    $this->CheckUrl();
  }
  function MakeUrl($newGitHubUrl){
    $this->github=$newGitHubUrl;
    $this->github=str_replace(":domain",$this->domain,$this->github);
    $this->github=str_replace(":extension",$this->extension,$this->github);
    $this->github=str_replace(":directory",$this->directory,$this->github);
  }
  function CheckUrl(){
  	if($this->extension($this->extension)!=true){
      if($this->extension=="brouwser"){
        $this->theme="gitwebgui";
        $this->MakeUrl("./Data/:extension/:domain/index");
      }else {
        $this->theme="notExapet";
        $this->MakeUrl("./Data/error/404D");
      }
    }else {
      $array = get_headers($this->github);
      //Print_r($array);
      $string = $array[0];
      if(!strpos($string,"200"))
        //als het niet besiaat geef dan één error
        $this->theme="notFound";
        $this->MakeUrl("./Data/error/404");
      }
    }
  }
  function extension($extension,$extensions=array("official","app","wiki","craft","web")){
  	//print_r(in_array($Domain,$Domains));
  	if(in_array($extension,$extensions)=="1"){
  		return true;
  	}else{return false;}
  }
  public function GetGitHubUrl()
  {
    return $this->github;
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
