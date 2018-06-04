<?php
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
						$input=array();
						for($y=1;$y<=4;$y++){
							if(isset($data[$i+$y])){
								array_push($input,$data[$i+$y]);
							}
						}
						$dataBuffer.=Footer($input);
					break;
				case "header":
						$input=array();
						for($y=1;$y<=4;$y++){
							if(isset($data[$i+$y])){
								array_push($input,$data[$i+$y]);
							}
						}
						//$dataBuffer.=HeaderFun($input);
					break;
				case "banner":
						$input=array();
						for($y=1;$y<=2;$y++){
							if(isset($data[$i+$y])){
								array_push($input,$data[$i+$y]);
							}
						}
						$dataBuffer.=banner($input);
					break;
				case "paragraph":
						$input=array();
						for($y=1;$y<=3;$y++){
							if(isset($data[$i+$y])){
								array_push($input,$data[$i+$y]);
							}
						}
						$dataBuffer.=paragraph($input);
					break;
				case "divider":
					
						$input=array();
						for($y=1;$y<=2;$y++){
							if(isset($data[$i+$y])){
								array_push($input,$data[$i+$y]);
							}
						}
						//$dataBuffer.=paragraph($input);
					break;
				case "navigation":					
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
					$dataBuffer.="<span>".$cleanedstr.":This Module is not yet adding to this php file, Sorry. work on it ;-)</span>"."<br>";
			}
		}
	}
	return$dataBuffer;
}
?>