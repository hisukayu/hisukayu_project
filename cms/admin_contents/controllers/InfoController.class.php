<?php
class InfoController extends SessionLoader {

	/* お知らせ投稿処理
	 *
	 */
	public static function InfoDataCheck(){
		SessionLoader::SessionStart();
		SessionLoader::unsetSessionName("info_sec");
		SessionLoader::unsetSessionName("info_err");

		$admins = SessionLoader::getSessionName("admins");

		// お知らせ投稿ID
		SessionLoader::setSessionName('info_sec','info_id',"INFO".rand(00000,99999));

		// お知らせタイトル
		if(!empty(escape($_REQUEST['info_title']))){
			$item = escape($_REQUEST['info_title']);
			SessionLoader::setSessionName("info_sec","info_title", $item);
		}else {
			SessionLoader::setSessionName("info_err", "info_title", "お知らせタイトル入力してください。");
		}

		// お知らせ内容
		if(!empty(escape($_REQUEST['info_detaile']))){
			$item = escape($_REQUEST['info_detaile']);
// 			$item = str_replace(array("\n","\r"),'<br />', $item);
// 			$item = nl2br($item);

			SessionLoader::setSessionName("info_sec","info_detaile", $item);
		}else {
			SessionLoader::setSessionName("info_err", "info_detaile", "投稿内容を入力してください。");
		}

		// お知らせ投稿日時
		SessionLoader::setSessionName('info_sec','info_regdate',date('Y-m-d H:i:s', time()));

		$sec = SessionLoader::getSessionName('info_sec');
		$err = SessionLoader::getSessionName('info_err');

// 		print_r($sec);
// 		exit;
		if(empty($err)){

			if(Models::InfoReg($admins['id'],$sec)){
				$url = "dashboard-top";
				header("Location:".$url);
				exit;
			}else {
				$url = "dashboard-top";
				header("Location:".$url);
				exit;
			}

		}else {

			$url = "dashboard-top";
			header("Location:".$url);
			exit;

		}
	}


	/* お知らせ削除
	 *
	 */
	public static function InfoDelete(){
		SessionLoader::SessionStart();

		if(!empty(escape($_REQUEST['info_id']))){
			$admins = SessionLoader::getSessionName("admins");
			$info_id = escape($_REQUEST['info_id']);


			if(Models::InfoDel($admins['id'],$info_id)){
				$url = "../dashboard-top";
				header("Location:".$url);
				exit;
			}else {
				$url = "../dashboard-top";
				header("Location:".$url);
				exit;
			}

		}else {

		}

	}
}