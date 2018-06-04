<?php  
function _Domains($Domain,$Domains=array("official","app","wiki","craft","web")){
	//print_r(in_array($Domain,$Domains));
	if(in_array($Domain,$Domains)=="1"){
		return "C";
	}else{return "404";}
}
//echo(_Domains("official"));


?>