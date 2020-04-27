<?php
namespace Console;

class Log{

	public static function mysql($sql){
		if(!isset($GLOBALS["log"]["mysql"])) $GLOBALS["log"]["mysql"] = [];


		$sql = self::removeTabs($sql);
		$bt = debug_backtrace();
		$caller = array_shift($bt);

		$GLOBALS["log"]["mysql"][] = new LogData([
			"sql" 	=> $sql,
			"file" 	=> $caller['file'],
			"line" 	=> $caller['line']
		]);
 		return end($GLOBALS["log"]["mysql"]);
	}


	public static function removeTabs($sql){
		// REMOVE tabs
		$array_sql = explode("\r\n", $sql);
		$min = 9999;

		foreach($array_sql as $line){
			$line = substr($line, 0, -1);

			$num = substr_count($line, "	");
			$notab_line = str_replace("	", "", $line);


			$min = ($num < $min && strlen($line) > 0 && strlen($notab_line) > 0)? $num : $min;
		}

		$new_array_sql = [];
		for($i = 0; $i < count($array_sql); $i++){
			$notab_line = str_replace("\t", "", $array_sql[$i]);

			if($i == 0 || $i == count($array_sql) - 1){
				if(strlen($array_sql[$i]) > 0 && strlen($notab_line) > 0)	$new_array_sql[] = substr($array_sql[$i], $min);
			}else{
				$new_array_sql[] = substr($array_sql[$i], $min);
			}

		}

		return implode("\n", $new_array_sql);
		// -------------
	}

	public static function getMysql(){
		if(!isset($GLOBALS["log"]["mysql"])) return [];
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
