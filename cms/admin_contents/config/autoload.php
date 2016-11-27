<?php
/* オートローダー
 *
 *
 */
include_once('lib/functions.php');

function autoload_classes($class) {
// 	echo $class;
	if(strpos($class, "Controller")){
		include 'controllers/' . $class . '.class.php';
	}else if(strpos($class, "PDO")) {
		include 'models/' . $class . '.php';
	}else {
		include 'lib/' . $class . '.php';
	}

}
spl_autoload_register('autoload_classes');
