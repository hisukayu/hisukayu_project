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


}