<code style="white-space: pre;">
<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
?>

<div style="display:flex;justify-content:space-around">
<div>
<?php
echo "<h2>CONSOLE \ LOG</h2>";
echo "<hr>";

						echo '\Console\Log::mysql("SELECT * FROM table") => "'.\Console\Log::mysql("
							SELECT *
							FROM table

							WHERE id=5
						").'"'."\n";
echo "\n";
echo '\Console\Log::mysql("SELECT * FROM table") => "'.\Console\Log::mysql("
	INSERT INTO table
	(id)
	VALUES (5)
").'"'."\n";
echo "\n";
echo '\Console\Log::getMysql() => ['."\n";
$i = 0;
foreach(\Console\Log::getMysql() as $sql){
	$first = true;
	foreach(explode("\n", $sql) as $line){

		if($first){
			echo "\n";
			echo '	['.$i.'] =>	'."\n";
			echo '	'.$line."\n";
			$first = false;
		}else{
			echo '	'.$line."\n";
		}
	}
	$i++;
}
echo ']'."\n";


echo "<br>---------------------------------------------<br><br>";

?>

</div>
</div>
