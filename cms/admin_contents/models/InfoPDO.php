<?php
/* インフォメーション用データーベース
 *
 *
 */
class InfoPDO extends DbManager {


	/* お知らせ投稿
	 *
	 *
	 */
	public static function InfoReg($admin_id, $item){


		try{
			self::ConnectionDB();
			self::$db -> query("SET NAMES utf8;");
			$sql = "insert into information (admin_id,info_id,info_title,info_detaile,info_regdate) values (:admin_id,:info_id,:info_title,:info_detaile,:info_regdate)";
			$stmt = self::$db -> prepare($sql);
			$stmt -> bindValue(":admin_id", $admin_id);
			$stmt -> bindValue(":info_id", $item['info_id']);
			$stmt -> bindValue(":info_title", $item['title']);
			$stmt -> bindValue(":info_detaile", $item['detaile']);
			$stmt -> bindValue(":info_regdate", $item['info_regdate']);
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

}
