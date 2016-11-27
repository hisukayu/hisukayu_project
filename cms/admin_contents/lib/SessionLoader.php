<?php

class SessionLoader {

	/* セッションをスタート
	 *
	 */
	public static function SessionStart(){
		session_start();
	}


	/* セッションに値をセット
	 *
	 */
	public static function setSessionName($name1, $name2, $item){
		if(!empty($name2)){
			return $_SESSION[$name1][$name2] = $item;
		}else {
			return $_SESSION[$name1] = $item;
		}
	}

	/* セットした値をゲット
	 *
	 */
	public static function getSessionName($name){
		return @$_SESSION[$name];
	}


	/* セッションは気
	 *
	 */
	public static function unsetSessionName($name){
		unset($_SESSION[$name]);
	}
}