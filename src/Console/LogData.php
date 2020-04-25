<?php
namespace Console;

class LogData{
	public $file;
	public $line;

	// generate class from arrays values
	public function __construct(Array $properties=array()){
		foreach($properties as $key => $value){
			if(!is_numeric($key)){
				$this->{$key} = $value;
			}
		}
	}

}
