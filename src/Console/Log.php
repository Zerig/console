<?php
namespace Console;

class Log{

	public static function mysql($sql){
		if(!isset($GLOBALS["log"]["mysql"])) $GLOBALS["log"]["mysql"] = [];


		// REMOVE tabs
		$array_sql = explode("\n", $sql);
		$min = 9999;

		foreach($array_sql as $line){
			$line = substr($line, 0, -1);

			$num = substr_count($line, "	");
			$min = ($num < $min && strlen($line) > 0)? $num : $min;
		}

		for($i = 0; $i < count($array_sql); $i++){
			$array_sql[$i] = substr($array_sql[$i], 0, -1);
			if(strlen($array_sql[$i]) > 0) 	$array_sql[$i] = substr($array_sql[$i], $min);
			else   							unset($array_sql[$i]);
		}

		$sql = implode("\n", $array_sql);
		// -------------


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
