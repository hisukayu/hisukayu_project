<?php
/* ログイン用データーベース
 *
 * @LoginCheck
 *
 */
class AdminPDO extends DbManager {


	/* ログインチェックPDO
	 *
	 *
	 */
	public static function LoginCheck($login_check){
// 		print_r($login_check);
// 		exit;
		try{
			self::ConnectionDB();
			self::$db -> query("SET NAMES utf8;");
			$sql = "select * from admin where admin_id=:id and admin_pass=:pass";
			$stmt = self::$db -> prepare($sql);
			$stmt -> bindValue(":id", $login_check['login_id']);
			$stmt -> bindValue(":pass", $login_check['pass']);
			$stmt -> execute();

			// データーの取得
			if($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
				SessionLoader::setSessionName("admins", "id", $row['admin_id']);
				SessionLoader::setSessionName("admins", "pass", $row['admin_pass']);
				SessionLoader::setSessionName("admins", "name", $row['admin_name']);
			}

			self::CloseDB();

			$result = SessionLoader::getSessionName("admins");

			if(!empty($result) && $result != false){
				return true;
			}else {
				return false;
			}

		}catch (PDOException $e){
			$e -> getMessage();
		}
	}

	/* ログインデータを毎回確認
	 *
	 */
	public static function LoginDataCheck($admin){
		try{
			self::ConnectionDB();
			self::$db -> query('SET NAMES utf8;');
			$sql = "select * from dlife_admin where admin_id=:id and pass_hash=:pass";
			$stmt = self::$db -> prepare($sql);
			$stmt -> bindParam(':id',$admin['id']);
			$stmt -> bindParam(':pass',$admin['pass_hash']);
			$result = $stmt -> execute();
		}catch(PDOException $e){
			echo "ERROR:".$e -> getMessage();
		}
		self::CloseDB();
		if(!empty($result) && $result != false){
			return true;
		}else {
			return false;
		}
	}

}
