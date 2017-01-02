<?php
/* インフォメーション用データーベース
 *
 *
 */
class InfoPDO extends DbManager {


	/* お知らせ公開日時の更新
	 *
	 */
	public static function InfoDateUpdate($admin_id, $item){
		try{
			self::ConnectionDB();
			self::$db -> query("SET NAMES utf8;");
			$sql = "update information set info_regdate=:info_regdate, info_update=:info_update where admin_id=:admin_id and info_id=:info_id";
			$stmt = self::$db -> prepare($sql);
			$stmt -> bindValue(":admin_id", $admin_id);
			$stmt -> bindValue(":info_id", $item['info_id']);
			$stmt -> bindValue(":info_regdate", $item['info_regdate']);
			$stmt -> bindValue(":info_update", $item['info_update']);
			$stmt -> execute();


			// アクティブ更新
			if(ActionUpDate($admin_id, "お知らせ公開日時を更新しました。", $item['info_update'])){
				// データーの取得
				$info = self::InfoGetDetaile($admin_id, $item['info_id']);
			}

			self::CloseDB();

			if(!empty($info) && $info != false){
				return $info;
			}else {
				return false;
			}

		}catch (PDOException $e){
			$e -> getMessage();
		}
	}

	/* お知らせ公開状態の更新
	 *
	 */
	public static function InfoStateUpdate($admin_id, $item){
// 		print_r($admin_id);
// 		exit;
		try{
			self::ConnectionDB();
			self::$db -> query("SET NAMES utf8;");
			$sql = "update information set info_state=:info_state, info_update=:info_update where admin_id=:admin_id and info_id=:info_id";
			$stmt = self::$db -> prepare($sql);
			$stmt -> bindValue(":admin_id", $admin_id);
			$stmt -> bindValue(":info_id", $item['info_id']);
			$stmt -> bindValue(":info_state", $item['info_state']);
			$stmt -> bindValue(":info_update", $item['info_update']);
			$stmt -> execute();


			// アクティブ更新
			if(ActionUpDate($admin_id, "お知らせ公開状態を更新しました。", $item['info_update'])){
				// データーの取得
				$info = self::InfoGetDetaile($admin_id, $item['info_id']);
			}

			self::CloseDB();

			if(!empty($info) && $info != false){
				return $info;
			}else {
				return false;
			}

		}catch (PDOException $e){
			$e -> getMessage();
		}
	}


	/* お知らせ投稿
	 *
	 *
	 */
	public static function InfoReg($admin_id, $item){


		try{
			self::ConnectionDB();
			self::$db -> query("SET NAMES utf8;");
			$sql = "insert into information (admin_id,info_id,info_title,info_detaile,info_regdate,info_state) values (:admin_id,:info_id,:info_title,:info_detaile,:info_regdate,:info_state)";
			$stmt = self::$db -> prepare($sql);
			$stmt -> bindValue(":admin_id", $admin_id);
			$stmt -> bindValue(":info_id", $item['info_id']);
			$stmt -> bindValue(":info_title", $item['title']);
			$stmt -> bindValue(":info_detaile", $item['detaile']);
			$stmt -> bindValue(":info_regdate", $item['info_regdate']);
			$stmt -> bindValue(":info_state", $item['info_state']);
			$stmt -> execute();


			// アクティブ更新
			if(ActionUpDate($admin_id, "お知らせ新規投稿しました。", $item['info_regdate'])){
				// データーの取得
				$info = self::InfoList($admin_id);
			}

			self::CloseDB();

			if(!empty($info) && $info != false){
				return $info;
			}else {
				return false;
			}

		}catch (PDOException $e){
			$e -> getMessage();
		}
	}

	/* お知らせ削除
	 *
	 */
	public static function InfoDel($admin_id, $info_id){

		try{
			self::ConnectionDB();
			self::$db -> query("SET NAMES utf8;");
			$sql = "delete from information where admin_id=:admin_id and info_id=:info_id";
			$stmt = self::$db -> prepare($sql);
			$stmt -> bindValue(":admin_id", $admin_id);
			$stmt -> bindValue(":info_id", $info_id);
			$stmt -> execute();

			// データーの取得
			$info = self::InfoList($admin_id);

			self::CloseDB();

			if(!empty($info) && $info != false){
				return $info;
			}else {
				return false;
			}

		}catch (PDOException $e){
			$e -> getMessage();
		}
	}


	/* お知らせ情報取得
	 *
	 */
	public static function InfoGetDetaile($admin_id, $info_id){

		try{
			self::ConnectionDB();
			self::$db -> query("SET NAMES utf8;");
			$sql = "select * from information where admin_id=:admin_id and info_id=:info_id";
			$stmt = self::$db -> prepare($sql);
			$stmt -> bindValue(':admin_id', $admin_id);
			$stmt -> bindValue(':info_id', $info_id);
			$stmt -> execute();

			// データーの取得
			if($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
				SessionLoader::unsetSessionName('info_detaile');
				SessionLoader::setSessionName('info_detaile', "id", $row['id']);
				SessionLoader::setSessionName('info_detaile', "info_id", $row['info_id']);
				SessionLoader::setSessionName('info_detaile', "title", $row['info_title']);
				SessionLoader::setSessionName('info_detaile', "detaile", $row['info_detaile']);
				SessionLoader::setSessionName('info_detaile', "info_regdate", $row['info_regdate']);
				SessionLoader::setSessionName('info_detaile', "state", $row['info_state']);
			}

// 			$infos = SessionLoader::getSessionName("info_detaile");
// 			print_r($infos);
// 			exit;

			self::CloseDB();

			if(!empty($row) && $row != false){
				return true;
			}else {
				return false;
			}

		}catch (PDOException $e){
			$e -> getMessage();
		}
	}


	/* お知らせリスト
	 *
	 *
	 */
	public static function InfoList($admin_id){
		try{
			self::ConnectionDB();
			self::$db -> query("SET NAMES utf8;");
			$sql = "select * from information where admin_id=:admin_id order by id desc limit 0,5";
			$stmt = self::$db -> prepare($sql);
			$stmt -> bindValue(':admin_id', $admin_id);
			$stmt -> execute();

			// データーの取得
			$i = 0;
			while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
				$info[$i]['id'] = $row['id'];
				$info[$i]['info_id'] = $row['info_id'];
				$info[$i]['info_title'] = $row['info_title'];
				$info[$i]['info_detaile'] = $row['info_detaile'];
				$info[$i]['info_regdate'] = $row['info_regdate'];
				$info[$i]['info_state'] = $row['info_state'];
				$i++;
			}

			self::CloseDB();

			if(!empty($info) && $info != false){
				return $info;
			}else {
				return false;
			}

		}catch (PDOException $e){
			$e -> getMessage();
		}
	}

	/* お知らせ更新
	 *
	 */
	public static function InfoUpDate($admin_id, $info_id, $item){

		try{
			self::ConnectionDB();
			self::$db -> query("SET NAMES utf8;");
			$sql = "update information set info_title=:info_title, info_detaile=:info_detaile, info_update=:info_update where admin_id=:admin_id and info_id=:info_id";
			$stmt = self::$db -> prepare($sql);
			$stmt -> bindValue(":admin_id", $admin_id);
			$stmt -> bindValue(":info_id", $info_id);
			$stmt -> bindValue(":info_title", $item['title']);
			$stmt -> bindValue(":info_detaile", $item['detaile']);
			$stmt -> bindValue(":info_update", $item['info_update']);
			$stmt -> execute();


			// アクティブ更新
			if(ActionUpDate($admin_id, "お知らせ公開状態を更新しました。", $item['info_update'])){
				// データーの取得
				$info = self::InfoGetDetaile($admin_id, $info_id);
			}

			self::CloseDB();

			if(!empty($info) && $info != false){
				return true;
			}else {
				return false;
			}

		}catch (PDOException $e){
			$e -> getMessage();
		}
	}


}
