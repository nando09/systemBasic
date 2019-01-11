<?php
// 	spl_autoload_register(function ($class_name) {
// 		include_once $class_name . '.php';
// 	});

spl_autoload_register(function($teste){
	$file = str_replace('\\', '/', $teste);

	$file .= ".php";

	// echo $file;
	if(file_exists($file)){
		require_once $file;
	}
});
