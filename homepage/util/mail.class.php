<?php
include_once("functions.php");
if(!htmlspecialchars(empty($_POST['contacts']),ENT_QUOTES,'UTF-8')){

	$mail = new MailClass();
	$mail -> MailCheck();

}else {
	$url = "../contact.php";
	header("Location:".$url);
	exit;
}

class MailClass {

	public function MailCheck(){

		unset($_SESSION['items']);

		// お名前
		if(!htmlspecialchars(empty($_POST['name1']),ENT_QUOTES,'UTF-8')){
			$item = htmlspecialchars($_POST['name1']);
			$_SESSION['items']['sec']['name1'] = $item;
		}else {
			$_SESSION['items']['err']['name1'] = "お名前を入力してください。";
		}


		// フリガナ
		if(!htmlspecialchars(empty($_POST['name2']),ENT_QUOTES,'UTF-8')){
			$item = htmlspecialchars($_POST['name2']);
			$_SESSION['items']['sec']['name2'] = $item;
		}else {
			$_SESSION['items']['err']['name2'] = "フリガナを入力してください。";
		}

		// 会社名
		if(!htmlspecialchars(empty($_POST['company_name']),ENT_QUOTES,'UTF-8')){
			$item = htmlspecialchars($_POST['company_name']);
			$_SESSION['items']['sec']['company_name'] = $item;
		}else {
			$_SESSION['items']['sec']['company_name'] = "";
		}


		// 電話番号
		if(!htmlspecialchars(empty($_POST['tell']),ENT_QUOTES,'UTF-8')){
			$item = htmlspecialchars($_POST['tell']);
			$_SESSION['items']['sec']['tell'] = $item;
		}else {
			$_SESSION['items']['err']['tell'] = "ご連絡の取れるお電話番号を入力してください。";
		}


		// メールアドレス
		if(!htmlspecialchars(empty($_POST['mail']),ENT_QUOTES,'UTF-8')){
			$item = htmlspecialchars($_POST['mail']);
			$_SESSION['items']['sec']['mail'] = $item;
		}else {
			$_SESSION['items']['err']['mail'] = "メールアドレスを入力してください。";
		}


		// お問合せ種別
		if(!htmlspecialchars(empty($_POST['type']),ENT_QUOTES,'UTF-8')){
			$item = htmlspecialchars($_POST['type']);
			$_SESSION['items']['sec']['type'] = $item;
		}else {
			$_SESSION['items']['err']['type'] = "お問合せ種別を入力してください。";
		}

		// その他お問合せ
		if(!htmlspecialchars(empty($_POST['comment']),ENT_QUOTES,'UTF-8')){
			$item = htmlspecialchars($_POST['comment']);
			$_SESSION['items']['sec']['comment'] = $item;
		}else {
			$_SESSION['items']['sec']['comment'] = "";
		}

		$err = @$_SESSION['items']['err'];
		$data = @$_SESSION['items']['sec'];
// 		print_r($data);
// 		exit;
		if(count($err) == 0){
			include_once("inc/jcode-LE.php");
			$subject = UserContactMailSubject();
			$body = UserContactMailBody($data);
			$header = UserMailHeader();
			$result = mb_send_mail($data['mail'], $subject, $body, $header);

			if(@$result){

				$subject = AdminContactMailSubject($data);
				$body = AdminContactMailBody($data);
				$header = AdminMailHeader($data);
				mb_send_mail(MAIL_ADDRESS_01, $subject, $body, $header);

				$url = "../contact-result.php";
				header("Location:".$url);
				exit;

			}else {
				$url = "../contact.php";
				header("Location:".$url);
				exit;
			}


		}else {
			$url = "../contact.php";
			header("Location:".$url);
			exit;
		}

	}
}

?>