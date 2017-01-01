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
			SessionLoader::setSessionName("info_sec","title", $item);
		}else {
			SessionLoader::setSessionName("info_err", "title", "お知らせタイトル入力してください。");
		}

		// お知らせ内容
		if(!empty(escape($_REQUEST['info_detaile']))){
			$item = escape($_REQUEST['info_detaile'].PHP_EOL);
			$item = rtrim($item, "\r\n");
			SessionLoader::setSessionName("info_sec","detaile", $item);
		}else {
			SessionLoader::setSessionName("info_err", "detaile", "投稿内容を入力してください。");
		}

		// お知らせ投稿日時
		SessionLoader::setSessionName('info_sec','info_regdate',date('Y-m-d H:i:s', time()));

		$sec = SessionLoader::getSessionName('info_sec');
		$err = SessionLoader::getSessionName('info_err');

		if(empty($err)){

			if(Models::InfoReg($admins['id'],$sec)){
				SessionLoader::unsetSessionName('info_sec');
				SessionLoader::unsetSessionName('info_err');
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
			$url = "../dashboard-top";
			header("Location:".$url);
			exit;
		}

	}


	/* お知らせ編集
	 * データ取得
	 *
	 */
	public static function InfoEdit(){
		SessionLoader::SessionStart();

		if(!empty(escape($_REQUEST['info_id']))){
			$admins = SessionLoader::getSessionName("admins");
			$info_id = escape($_REQUEST['info_id']);

			if(Models::InfoGetDetaile($admins['id'],$info_id)){
				$url = "../dashboard-edit-view";
				header("Location:".$url);
				exit;
			}else {
				$url = "../dashboard-top";
				header("Location:".$url);
				exit;
			}

		}else {
			$url = "../dashboard-top";
			header("Location:".$url);
			exit;
		}
	}

	/* お知らせ 公開状態を変更
	 *
	 */
	public static function InfoStateUpdate(){
		SessionLoader::SessionStart();
		if(!empty(escape($_REQUEST['state']))){
			$admins = SessionLoader::getSessionName("admins");
			$item['info_id'] = escape($_REQUEST['info_id']);
			$item['info_state'] = escape($_REQUEST['state']);
			$item['info_update'] = date('Y-m-d H:i:s', time());
		}else {
			echo "no data";
		}

		if(!empty($item)){
			if(Models::InfoStateUpdate($admins['id'], $item)){
				echo "seccess update";
			}else {
				echo "not update";
			}
		}
	}

	/* お知らせ 公開日時を変更
	 *
	 */
	public static function InfoDateUpdate(){
		SessionLoader::SessionStart();
		$admins = SessionLoader::getSessionName("admins");
		$item['info_id'] = escape($_REQUEST['info_id']);

		if(!empty(escape($_REQUEST['year']))) {
			$year = escape($_REQUEST['year']);
		}else {
			$year = date('Y',time());
		}
		if(!empty(escape($_REQUEST['month']))) {
			$month = escape($_REQUEST['month']);
		}else {
			$month = date('m',time());
		}
		if(!empty(escape($_REQUEST['day']))) {
			$day = escape($_REQUEST['day']);
		}else {
			$day = date('d',time());
		}

		if(!empty(escape($_REQUEST['hour']))) {
			$hour = escape($_REQUEST['hour']);
		}else {
			$hour = date('H',time());
		}
		if(!empty(escape($_REQUEST['minute']))) {
			$minute = escape($_REQUEST['minute']);
		}else {
			$minute = date('i',time());
		}
		if(!empty(escape($_REQUEST['seconds']))) {
			$seconds = escape($_REQUEST['seconds']);
		}else {
			$seconds = date('s',time());
		}

		$item['info_regdate'] = $year."-".$month."-".$day." ".$hour.":".$minute.":".$seconds;
		$item['info_update'] = date('Y-m-d H:i:s', time());

		if(!empty($item)){
			if(Models::InfoDateUpdate($admins['id'], $item)){
				echo "seccess update";
			}else {
				echo "no data";
			}
		}else {
			echo "no data";
		}
	}


	/* お知らせ内容を更新
	 *
	 */
	public static function InfoDetailUpDate(){
		SessionLoader::SessionStart();
		SessionLoader::unsetSessionName("info_up_sec");
		SessionLoader::unsetSessionName("info_up_err");

		$admins = SessionLoader::getSessionName("admins");

		// お知らせ投稿ID
		SessionLoader::setSessionName('info_up_sec','info_id',"INFO".rand(00000,99999));

		// お知らせタイトル
		if(!empty(escape($_REQUEST['info_title']))){
			$item = escape($_REQUEST['info_title']);
			SessionLoader::setSessionName("info_up_sec","title", $item);
		}else {
			SessionLoader::setSessionName("info_up_err", "title", "お知らせタイトル入力してください。");
		}

		// お知らせ内容
		if(!empty(escape($_REQUEST['info_detaile']))){
			$item = escape($_REQUEST['info_detaile'].PHP_EOL);
			$item = rtrim($item, "\r\n");
			SessionLoader::setSessionName("info_up_sec","detaile", $item);
		}else {
			SessionLoader::setSessionName("info_up_err", "detaile", "投稿内容を入力してください。");
		}

		// お知らせ投稿日時
		SessionLoader::setSessionName('info_up_sec','info_update',date('Y-m-d H:i:s', time()));

		$sec = SessionLoader::getSessionName('info_up_sec');
		$err = SessionLoader::getSessionName('info_up_err');

		if(empty($err)){

			if(Models::InfoUpDate($admins['id'],$sec)){
				SessionLoader::unsetSessionName('info_up_sec');
				SessionLoader::unsetSessionName('info_up_err');
				$url = "dashboard-edit-view";
				header("Location:".$url);
				exit;
			}else {
				$url = "dashboard-edit-view";
				header("Location:".$url);
				exit;
			}
		}else {
			$url = "dashboard-edit-view";
			header("Location:".$url);
			exit;
		}
	}

}