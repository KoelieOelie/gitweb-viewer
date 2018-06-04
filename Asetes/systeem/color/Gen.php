<?php
use \Spirit55555\Minecraft\MinecraftColors;
function parseMinecraftColors($text,$Clear="HTML")
{
	if($Clear=="HTML"){
		return MinecraftColors::convertToHTML($text, true);
	}
	if($Clear=="Clear"){
		return MinecraftColors::clean($text);
	}
}

?>