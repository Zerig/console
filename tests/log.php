<code style="white-space: pre;">

<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload


echo '\Console\Log::mysql("SELECT * FROM table") => "'.\Console\Log::mysql("
	SELECT *
	FROM table
").'"'."\n";

echo '\Console\Log::mysql("SELECT * FROM table") => "'.\Console\Log::mysql("
	INSERT INTO table
	(id)
	VALUES (5)
").'"'."\n";
echo '\Console\Log::getMysql() => ['."\n";
$i = 0;
foreach(\Console\Log::getMysql() as $sql){
	$first = true;
	foreach(explode("\n", $sql) as $line){

		if($first){
			echo '	['.$i.'] =>	'.$line."\n";
			$first = false;
		}else{
			echo '		'.$line."\n";
		}
	}
	$i++;
}
echo ']'."\n";


echo "<br>---------------------------------------------<br><br>";
