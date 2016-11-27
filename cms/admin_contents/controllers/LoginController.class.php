<?php
class LoginController extends SessionLoader {

	public static function LoginCheck(){
		SessionLoader::SessionStart();
		SessionLoader::unsetSessionName("login_sec");
		SessionLoader::unsetSessionName("login_err");

		if(!empty(escape($_REQUEST['login_id']))){
			$item = escape($_REQUEST['login_id']);
			SessionLoader::setSessionName("login_sec","login_id", $item);
		}else {
			SessionLoader::setSessionName("login_err", "login_id", "ログインIDを入力してください。");
		}

		if(!empty(escape($_REQUEST['pass']))){
			$item = escape($_REQUEST['pass']);
			SessionLoader::setSessionName("login_sec","pass", $item);
		}else {
			SessionLoader::setSessionName("login_err", "pass", "パスワードを入力してください。");
		}


		$err = SessionLoader::getSessionName('login_err');
		if(empty($err)){

			if(Models::LoginCheck(SessionLoader::getSessionName('login_sec'))){
				$url = "dashboard-top";
				header("Location:".$url);
				exit;
			}else {
				$url = "./";
				header("Location:".$url);
				exit;
			}

		}else {

			$url = "./";
			header("Location:".$url);
			exit;

		}

	}
}