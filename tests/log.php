<code style="white-space: pre;">

<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload


echo '\Console\Log::mysql("SELECT * FROM table") => '.\Console\Log::mysql("SELECT * FROM table")."\n";
echo '\Console\Log::getMysql() => ['."\n";
foreach(\Console\Log::getMysql() as $sql){
	echo '	[0] => '.$sql."\n";
}
echo ']'."\n";


echo "<br>---------------------------------------------<br><br>";
