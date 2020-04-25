<?php
namespace Console;

class Log{

	public static function mysql($sql){
		if(!isset($GLOBALS["log"]["mysql"])) $GLOBALS["log"]["mysql"] = [];

		$GLOBALS["log"]["mysql"][] = $sql;
 		return $sql;
	}

	public static function getMysql(){
		return $GLOBALS["log"]["mysql"];
	}









	public static function page($page_name){
		$GLOBALS["log"]["page"] = $page_name;
 		return $GLOBALS["log"]["page"];
	}





	public static function module($sql){
		if(function_exists("log__module_add")) log__module_add($sql);
	}

}
