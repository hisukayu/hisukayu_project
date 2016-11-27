<?php
include_once('config/config.php');
/* リクエストされた値をエスケープ対応
 *
 */
function escape($s){
	return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
/* ページタイトルを取得
 *
 *
 */
function getTitle(){
	if(isset($_REQUEST['title'])){
		echo escape($_REQUEST['title']);
	}else {
		echo "ログイン";
	}
}

/* ページごとのスタイルを取得 仮機能
 * CSSファイル
 * JSファイル
 * JSコード
 *
 */
function getStyle($select){
	$styles = StylePDO::CssStyleById($select);
	for($i = 0; $i < count($styles); $i++) {
		if($i == 0){
			$stylesheet = "<link rel=\"stylesheet\" href=\"". $styles[$i]['style_detaile'] ."\" >\n";
		}else {
			$stylesheet .= "<link rel=\"stylesheet\" href=\"". $styles[$i]['style_detaile'] ."\">\n";
		}
	}
	return $stylesheet;
}


/* ヘッダーを取得
 *
 */
function getHeader(){
	$uri = escape($_SERVER['REQUEST_URI']);
	$path = explode("/", $uri);
	$path = end($path);
	if(!empty($path) && $path == "index.php" ){
		include_once("public_html/html/temp/header-top.php");
	}else {
		if($path != "index.php" && !empty($path) ){
			include_once("public_html/html/temp/header-sub.php");
		}
	}
}

/* グローバルナビを取得
 *
 */
function getGnavi(){
	$uri = escape($_SERVER['REQUEST_URI']);
	$path = explode("/", $uri);
	$path = end($path);
	if(!empty($path) && $path != "index.php"){
		include_once("public_html/html/temp/gnavi.php");
	}
}
/* サイドメニューを取得
 *
 */
function getSideNavi(){
	$uri = escape($_SERVER['REQUEST_URI']);
	$path = explode("/", $uri);
	$path = end($path);
	if(!empty($path) && $path != "index.php"){
		include_once("public_html/html/temp/side-top.php");
	}
}

function getSideMenu(){
	$uri = escape($_SERVER['REQUEST_URI']);
	$path = explode("/", $uri);
	$path = end($path);
	$result = StylePDO::SideMenu($path);
	return $result;
}

/* コンテンツを取得
 *
 */
function getContents($select){
	if(isset($_REQUEST['filename'])){
		$filename = escape($_REQUEST['filename']);
		include_once("public_html/html/" . $select . "/" . $select . "-" . $filename . "-html.php");
	}else {
		include_once("public_html/html/index-html.php");
	}
}

/* フッターを取得
 *
 */
function getFooter(){
	include_once("public_html/html/temp/footer.php");
}

/* HTTPメソッドかPOSTかの判定メソッド
 *
 */
function isPost(){
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		return true;
	}
	return false;
}

/* $_GET変数から値を取得するメソッド
 * 第2引数にはキーが存在しない場合のデフォルト値を設定できる世にしています。
 *
 */
function getGet($name, $default = null){
	if(isset($_GET[$name])){
		return $_GET[$name];
	}
	return $default;
}

/* $_POST変数から値を取得するメソッド
 * 第2引数にはキーが存在しない場合のデフォルト値を設定できる世にしています。
 *
 */
function getPost($name, $default = null){
	if(isset($_POST[$name])){
		return $_POST[$name];
	}
	return $default;
}

/* サーバーのホスト名を取得するメソッド
 *
 *
 */
function getHost(){
	if(!empty($_SERVER['HTT`_HOST'])){
		return $_SERVER['HTTP_HOST'];
	}
	return $_SERVER['SERVER_NAME'];
}

/* HTTPSでアクセスされたかどうかの判定メソッド
 * アクセスされた場合、$_SERVER['HTTPS']に'on'という文字が含まれるので、それを判定
 *
 */
function isSsl(){
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
		return true;
	}
	return false;
}

/* URLの制御メソッド
 * リクエストされたURLの情報が格納されます。
 *
 */
function getRequestUri(){
	return $_SERVER['REQUEST_URI'];
}