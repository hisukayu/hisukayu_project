<?php
/* Controllers
 * リクエスト振り分け
 *
 *
 */
class Controllers {

	public static function Requests(){

		if(isset($_REQUEST['request_uri'])){
			$request = escape($_REQUEST['request_uri']);
			$request = explode("_", $request);
			$select = $request[0];
			$request = end($request);
		}else {
			$request = "view";
			$select = "index";
		}


		if($request == "view"){
			Views::view_select($select);
		}else {
			Controllers::ControllersRequest($select);
		}
	}


	public static function ControllersRequest($select){

		switch($select){
			case "login":
				LoginController::LoginCheck();
				break;
		}
	}
}