<?php
session_start();
mb_language("ja");
mb_internal_encoding("UTF-8");
header("Content-Type: text/html; charset=UTF-8");

// 共通 メール情報
define('SITE_NAME','HISUKAYU');
define('ADDRESS','');
define('SITE_URL',"http://hisukayu.com");
define('REDIRECT_URL',"http://hisukayu.com/");
// define('MAIL_ADDRESS_01','contact@hisukayu.com');
// define('MAIL_ADDRESS_02','contact@hisukayu.com');
define('MAIL_ADDRESS_01','user02@blueclair.com');
define('MAIL_ADDRESS_02','user02@blueclair.com');
define('TEL','050-6869-5392');
define('FAX','');



/* ユーザー 件名
 *
 */
function UserContactMailSubject(){
	$subject = "【". SITE_NAME . "】お問合せ受付自動返信";
	return mb_convert_encoding($subject,'utf-8',mb_detect_encoding($subject));;
}

/* ユーザー ヘッダー
 *
 */
function UserMailHeader(){
	// ヘッダ作成
	$header = "From: " . mb_encode_mimeheader (SITE_NAME) . "<".MAIL_ADDRESS_01.">";
	$header .= "\nReply-To: ".MAIL_ADDRESS_01;
	$header .= "\nX-Mailer: PHP/" . phpversion();
	$header .= "\nMime-Version: 1.0";
	$header .= "\nContent-Type: text/plain; charset=iso-2022-jp";
	$header .= "\nContent-Transfer-Encoding: 7bit";
	return $header;
}


/* ユーザー お問い合わせ用 本文
 *
 */
function UserContactMailBody($user){
	$body = mb_convert_encoding($user['name1']."様\n\n","JIS","UTF-8");
	$body .= mb_convert_encoding("この度はお問合わせ頂きまして、誠にありがとうございます。\n","JIS","UTF-8");
	$body .= mb_convert_encoding("送信頂きましたメールは確認次第、追ってご連絡させていただきます。\n","JIS","UTF-8");
	$body .= mb_convert_encoding("メールの確認にお時間を要する場合がございますので、あらかじめご了承下さい。\n\n","JIS","UTF-8");
	$body .= "======================================================================\n";
	$body .= mb_convert_encoding("■お名前：". $user['name1'] ."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("■フリガナ：". $user['name2'] ."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("■企業名/事業名：". $user['company_name'] ."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("■電話番号：". $user['tell'] ."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("■メールアドレス：". $user['mail'] ."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("■お問合せ種別：". $user['type'] ."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("■その他お問合せ\n". $user['comment'] ."\n\n","JIS","UTF-8");

	$body .= mb_convert_encoding("万が一、ご連絡が遅れることがございましたら、お手数ですが、\n","JIS","UTF-8");
	$body .= mb_convert_encoding("以下のアドレスまでお知らせください。\n","JIS","UTF-8");
	$body .= mb_convert_encoding("担当：". MAIL_ADDRESS_02 ."\n\n","JIS","UTF-8");
	$body .= mb_convert_encoding("※このメールに覚えが無い方は誠に申し訳ありませんが破棄してください。\n","JIS","UTF-8");
	$body .= "===========================================================================\n\n";
	$body .= mb_convert_encoding(SITE_NAME."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("TEL ：".TEL."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("URL ：".SITE_URL."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("MAIL：".MAIL_ADDRESS_01."\n","JIS","UTF-8");
	return $body = JcodeConvert($body, 1, 3);
}






/* 店舗側 メール件名 お問い合わせ用
 *
 */
function AdminContactMailSubject($user){
	$subject = "【お知らせ】_".$user['name1']."様よりお問合せ";
	return mb_convert_encoding($subject,'utf-8',mb_detect_encoding($subject));;
}
/* 店舗側 メールヘッダー
 *
 */
function AdminMailHeader($user){
	// ヘッダ作成
	$header = "From: " . mb_encode_mimeheader ($user['name1']) . "<".$user['mail'].">";
	$header .= "\nReply-To: ".$user['mail'];
	$header .= "\nX-Mailer: PHP/" . phpversion();
	$header .= "\nMime-Version: 1.0";
	$header .= "\nContent-Type: text/plain; charset=iso-2022-jp";
	$header .= "\nContent-Transfer-Encoding: 7bit";
	return $header;
}
/* 店舗側 メール本文 お問い合わせ用
 *
 */
function AdminContactMailBody($user){
	$body = mb_convert_encoding($user['name1']."様より以下の内容でお問合せがありました。\n","JIS","UTF-8");
	$body .= "======================================================================\n";
	$body .= mb_convert_encoding("■お名前：". $user['name1'] ."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("■フリガナ：". $user['name2'] ."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("■企業名/事業名：". $user['company_name'] ."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("■電話番号：". $user['tell'] ."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("■メールアドレス：". $user['mail'] ."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("■お問合せ種別：". $user['type'] ."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("■その他お問合せ\n". $user['comment'] ."\n\n","JIS","UTF-8");
	$body .= "======================================================================\n\n";
	$body .= mb_convert_encoding(SITE_NAME."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("TEL ：".TEL."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("URL ：".SITE_URL."\n","JIS","UTF-8");
	$body .= mb_convert_encoding("MAIL：".MAIL_ADDRESS_01."\n","JIS","UTF-8");
	return $body = JcodeConvert($body, 1, 3);
}