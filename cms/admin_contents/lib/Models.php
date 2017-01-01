<?php
/* Models
 * データ管理
 *
 */

class Models extends SessionLoader {


	public static function LoginCheck($login_check){
		return AdminPDO::LoginCheck($login_check);
	}

	public static function InfoReg($admin_id, $info_check){
		return InfoPDO::InfoReg($admin_id, $info_check);
	}

	public static function InfoDel($admin_id, $info_id){
		return InfoPDO::InfoDel($admin_id, $info_id);
	}

	public static function InfoGetDetaile($admin_id, $info_id){
		return InfoPDO::InfoGetDetaile($admin_id, $info_id);
	}

	public static function InfoStateUpdate($admins_id, $item){
		return InfoPDO::InfoStateUpdate($admins_id, $item);
	}

	public static function InfoDateUpdate($admins_id, $item){
		return InfoPDO::InfoDateUpdate($admins_id, $item);
	}

	public static function InfoUpDate($admins_id, $item){
		return InfoPDO::InfoUpDate($admins_id, $item);
	}
}