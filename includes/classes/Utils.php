<?php

class Utils
{
  public function HoofletterYay($str='')
  {
    $length = strlen($str);
    $str_tmp=strtoupper(substr($str, 0, 1));
    $str_tmp.=substr($str, 1, $length);
    return $str_tmp;
  }
  function replace($match)
  {
    $key = trim($match[1]);
    $val = trim($match[2]);
    //var_dump(intval($val));
    if (intval($val)!==0) {
      $val=intval($val);
    }else {
      if (!$this->startsWith($val,'"')) {
        $val='"'.$val;
      }
      if (!$this->endsWith($val,'"')) {
        $val=$val.'"';
      }
    }
    //if (!$this->startsWith($key,',')) {
      //$j
      //$key='"'.$key;
    //}
    if ($this->startsWith($match[0],',')) {
      $str=substr($key,1,strlen($key));
      if (!$this->startsWith($str,'"')) {
        //$retVal = (!$this->startsWith($key,',')) ? '"'.$key : b ;
        $key=',"'.$str;
      }
    }else {
      if (!$this->startsWith($key,'"')) {
        //$retVal = (!$this->startsWith($key,',')) ? '"'.$key : b ;
        $key='"'.$key;
      }
    }
    if (!$this->endsWith($key,'"')) {
      $key=$key.'"';
    }




    //echo $key.":".$val."<br>";
    return $key.":".$val;
  }
  public function startsWith($haystack, $needle)
  {
       $length = strlen($needle);
       //echo substr($haystack, 0, $length)."===".$needle."=>".((substr($haystack, 0, $length) === $needle) ? "true" : "false")."<br>";
       return (substr($haystack, 0, $length) === $needle);
  }
  protected function mccolors($string) {

          preg_match_all("/[^§&]*[^§&]|[§&][0-9a-z][^§&]*/", $string, $broken_up_strings);
          $return_string = "";
          foreach ($broken_up_strings as $results)
          {
              $ending = '';
              foreach ($results as $individual)
              {
                  $code = preg_split("/[&§][0-9a-z]/", $individual);
                  preg_match("/[&§][0-9a-z]/", $individual, $prefix);
                  if (isset($prefix[0]))
                  {
                      $actualcode = substr($prefix[0], 1);
                      switch ($actualcode)
                      {
                          case '0':
                              $return_string = $return_string . '<span class="mc-color mc-0">';
                              $ending = $ending . "</span>";
                              break;

                          case "1":
                              $return_string = $return_string . '<span class="mc-color mc-1">';
                              $ending = $ending . "</span>";
                          break;

                          case "2":
                              $return_string = $return_string . '<span class="mc-color mc-2">';
                              $ending = $ending . "</span>";
                          break;

                          case "3":
                              $return_string = $return_string . '<span class="mc-color mc-3">';
                              $ending = $ending . "</span>";
                          break;

                          case "4":
                              $return_string = $return_string . '<span class="mc-color mc-4">';
                              $ending = $ending . "</span>";
                          break;

                          case "5":
                              $return_string = $return_string . '<span class="mc-color mc-5">';
                              $ending = $ending . "</span>";
                          break;

                          case "6":
                              $return_string = $return_string . '<span class="mc-color mc-6">';
                              $ending = $ending . "</span>";
                          break;

                          case "7":
                              $return_string = $return_string . '<span class="mc-color mc-7">';
                              $ending = $ending . "</span>";
                          break;

                          case "8":
                              $return_string = $return_string . '<span class="mc-color mc-8">';
                              $ending = $ending . "</span>";
                          break;

                          case "9":
                              $return_string = $return_string . '<span class="mc-color mc-9">';
                              $ending = $ending . "</span>";
                          break;

                          case "a":
                              $return_string = $return_string . '<span class="mc-color mc-a">';
                              $ending = $ending . "</span>";
                          break;

                          case "b":
                              $return_string = $return_string . '<span class="mc-color mc-b">';
                              $ending = $ending . "</span>";
                          break;

                          case "c":
                              $return_string = $return_string . '<span class="mc-color mc-c">';
                              $ending = $ending . "</span>";
                          break;

                          case "d":
                              $return_string = $return_string . '<span class="mc-color mc-d">';
                              $ending = $ending . "</span>";
                          break;
                          case "e":
                              $return_string = $return_string . '<span class="mc-color mc-e">';
                              $ending = $ending . "</span>";
                          break;

                          case "f":
                              $return_string = $return_string . '<span class="mc-color mc-f">';
                              $ending = $ending . "</span>";
                          break;

                          case "l":
                              $return_string = $return_string . '<span class="mc-l">';
                              $ending = "</span>" . $ending;
                          break;

                          case "m":
                              $return_string = $return_string . '<span class="mc-m">';
                              $ending = "</span>" . $ending;
                          break;

                          case "n":
                              $return_string = $return_string . '<span class="mc-n">';
                              $ending = "</span>" . $ending;
                          break;

                          case "o":
                              $return_string = $return_string . '<span class="mc-o">';
                              $ending = "</span>" . $ending;
                          break;
                          case "p":
                              $return_string = $return_string . '<span class="mc-p">';
                              $ending = "</span>" . $ending;
                          break;

                          case "r":
                              $return_string = $return_string . '<span class="mc-r">';
                              $ending = '</span>';
                          break;

                          case 'k':
                              $return_string = $return_string . '<span class="mc-k">';
                              $ending = '</span>';
                          break;
                      }
                      if (isset($code[1]))
                      {
                          $return_string = $return_string . $code[1];
                          if (isset($ending) && strlen($individual) > 2)
                          {
                              $return_string = $return_string . $ending;
                              $ending = '';
                          }
                      }
                  }
                  else
                  {
                      $return_string = $return_string . $individual;
                  }

              }
          }

          return $return_string;

      }

  public function endsWith($haystack, $needle)
  {
      $length = strlen($needle);
      return $length === 0 || (substr($haystack, -$length) === $needle);
  }
  public function Clean_str($str)
  {
    return preg_replace("/(\t|\n|\v|\f|\r| |\xC2\x85|\xc2\xa0|\xe1\xa0\x8e|\xe2\x80[\x80-\x8D]|\xe2\x80\xa8|\xe2\x80\xa9|\xe2\x80\xaF|\xe2\x81\x9f|\xe2\x81\xa0|\xe3\x80\x80|\xef\xbb\xbf)+/","",$str);
  }
  public function json_decoderAndFixer($data='')
  {
    if (json_decode($data,true)===null) {
      $data = preg_replace_callback("#([^{:]*):([^,}]*)#i",'Utils::replace',$data);
    }
    //echo $preg."<br>";
    return json_decode($data,true);
  }
  protected function text_fixer($text='')
  {
    return str_replace("\\n","<br>",$this->mccolors($text));
  }
  protected function toColor($n)
  {
    $colors_minecraft=array(
          "0"=>"000",
          "1"=>"00a",
          "2"=>"0a0",
          "3"=>"0aa",
          "4"=>"a00",
          "5"=>"a0a",
          "6"=>"faa",
          "7"=>"aaa",
          "8"=>"555",
          "9"=>"55f",
          "a"=>"5f5",
          "b"=>"5ff",
          "c"=>"f55",
          "d"=>"f5f",
          "e"=>"ff5",
          "f"=>"fff"
    );
    return ("background-color:#".substr("000000".dechex($n),-6).";");
  }
  protected function icon($value)
  {
    $icons=json_decode(file_get_contents("includes/classes/current_icons.json"),true);
    if (in_array($value,$icons)) {
      return '<i id="icon" class="'.$value.'"></i>';
    } else {
      return '<i id="icon" class="NoVallidIcon"></i>';
    }


  }
}




 ?>
