<?php
class DbManager {
	public static $db;
	/* データベース
	 *
	 */
	public static function ConnectionDB(){
		return self::$db = new PDO(DNS, USER, PASS);
	}

	/* データベースクローズ
	 *
	 */
	public static function CloseDB(){
		return self::$db = null;
	}
}