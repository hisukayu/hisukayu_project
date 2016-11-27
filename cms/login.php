<?php
$server_request = $_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI'];
$search = "login.php";
if(strpos($server_request, $search)){
	$server = explode("/",$server_request);
	$server = end($server);
	if(strpos($server, "?") === false) {
		$url = "admin_contents/index.php";
		header("Location:".$url);
		exit;
	}else {
		echo "不明なパラメータが含まれています。再度アクセスをやり直してください。";
		exit;
	}
}else {
	echo "不正なアクセスです。";
	exit;
}

?>