<?php
namespace Console;

class Log{

	public static function mysql($sql){
		$GLOBALS["log"]["mysql"] = $sql;
 		return $GLOBALS["log"]["mysql"];
	}

	public static function getMysql($sql){
		return $GLOBALS["log"]["mysql"];
	}









	public static function include($page_name){
		$GLOBALS["log"]["include"] = $page_name;
 		return $GLOBALS["log"]["include"];
	}





	public static function module($sql){
		if(function_exists("log__module_add")) log__module_add($sql);
	}

}
