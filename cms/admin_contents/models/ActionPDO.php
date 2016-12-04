<?php

/* アクションに関するデータベース
 *
 * 更新作業などアクションを起こした際に
 * 操作履歴としてデータベースに記録を残します。
 *
 *
 */

class ActionPDO extends DbManager {


	/* 最近のアクティブ登録
	 *
	 */
	public static function ActiveReg($admin_id, $detaile, $update){
		try{
			self::ConnectionDB();
			self::$db -> query("SET NAMES utf8;");
			$sql = "insert into activitys (admin_id,active_detaile,active_update) values (:admin_id,:active_detaile,:active_update)";
			$stmt = self::$db -> prepare($sql);
			$stmt -> bindValue(":admin_id", $admin_id);
			$stmt -> bindValue(":active_detaile", $detaile);
			$stmt -> bindValue(":active_update", $update);
			$result = $stmt -> execute();

			self::CloseDB();

			if(!empty($result) && $result != false){
				return $result;
			}else {
				return false;
			}

		}catch (PDOException $e){
			$e -> getMessage();
		}

	}

	/* 最近のアクティブリスト取得
	 *
	 *
	 */
	public static function ActiveList($admin_id){

			try{
			self::ConnectionDB();
			self::$db -> query("SET NAMES utf8;");
			$sql = "select * from activitys where admin_id=:admin_id order by id desc limit 0,10";
			$stmt = self::$db -> prepare($sql);
			$stmt -> bindValue(":admin_id", $admin_id);
			$result = $stmt -> execute();

			$i = 0;
			while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
				$actives[$i]['id'] = $row['id'];
				$actives[$i]['admin_id'] = $row['admin_id'];
				$actives[$i]['active_detaile'] = $row['active_detaile'];
				$actives[$i]['active_update'] = $row['active_update'];
				$i++;
			}


			self::CloseDB();

			if(!empty($actives) && $actives != false){
				return $actives;
			}else {
				return false;
			}

		}catch (PDOException $e){
			$e -> getMessage();
		}

	}

}