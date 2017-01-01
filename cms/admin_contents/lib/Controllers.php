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
			if(isset($_REQUEST['request_main'])){
				$request = escape($_REQUEST['request_main']);
				$select = escape($_REQUEST['request_data']);
			}else {
				$request = "view";
				$select = "index";
			}
		}

// 		echo $_REQUEST['request_main'];
// 		exit;

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
			case "info_reg":
				InfoController::InfoDataCheck();
				break;
			case "info_edit":
				InfoController::InfoEdit();
				break;
			case "info_delete":
				InfoController::InfoDelete();
				break;
			case "info_state_update":
				InfoController::InfoStateUpdate();
				break;
			case "info_date_update":
				InfoController::InfoDateUpdate();
				break;
			case "info_update":
				InfoController::InfoDetailUpDate();
				break;
		}
	}
}