<?php
/* インフォメーション用データーベース
 *
 *
 */
class InfoPDO extends DbManager {


	/* お知らせリスト
	 *
	 *
	 */
	public static function InfoList(){
		try{
			self::ConnectionDB();
			self::$db -> query("SET NAMES utf8;");
			$sql = "select * from information order by id desc";
			$stmt = self::$db -> prepare($sql);
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
