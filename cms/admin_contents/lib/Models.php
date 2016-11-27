<?php
/* Models
 * データ管理
 *
 */

class Models extends SessionLoader {


	public static function LoginCheck($login_check){
		return AdminPDO::LoginCheck($login_check);
	}


}