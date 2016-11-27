<?php
/* スタイル関連データベース
 * CSSやJSファイルなどを管理する
 *
 */
class StylePDO extends DbManager {

	public static function CssStyleById($select){
		try{
			self::ConnectionDB();
			self::$db -> query("SET NAMES utf8;");

			switch($select){
				case "index":
					$style_id = "ST0001";
					$sql = "select * from admin_style where style_id=:style_id";
					break;

				case "":

					break;
			}
			$stmt = self::$db -> prepare($sql);
			$stmt -> bindValue(":style_id", $style_id);
			$stmt -> execute();

			// データーの取得
			$i = 0;
			while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
				$styles[$i]['style_id'] = $row['style_id'];
				$styles[$i]['style_detaile'] = $row['style_detaile'];
				$i++;
			}

			self::CloseDB();

			if(!empty($styles) && $styles != false){
				return $styles;
			}else {
				return false;
			}

		}catch (PDOException $e){
			$e -> getMessage();
		}
	}


	public static function SideMenu($select){
		try{
			self::ConnectionDB();
			self::$db -> query("SET NAMES utf8;");

			switch($select){
				case "dashboard-top":
					$menu_id = "M0001";
					$sql = "select * from side_menu where menu_id=:menu_id";
					break;

				case "":

					break;
			}
			$stmt = self::$db -> prepare($sql);
			$stmt -> bindValue(":menu_id", $menu_id);
			$stmt -> execute();

			// データーの取得
			$i = 0;
			while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
				$menus[$i]['menu_id'] = $row['menu_id'];
				$menus[$i]['menu_name'] = $row['menu_name'];
				$menus[$i]['parma_link'] = $row['parma_link'];
				$i++;
			}

			self::CloseDB();

			if(!empty($menus) && $menus != false){
				return $menus;
			}else {
				return false;
			}

		}catch (PDOException $e){
			$e -> getMessage();
		}
	}
}