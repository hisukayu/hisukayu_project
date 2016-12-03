<?php
ini_set('display_errors', 1);
mb_language("ja");
mb_internal_encoding("UTF-8");
header("Content-Type: text/html; charset=UTF-8");
date_default_timezone_set('Asia/Tokyo');
/* サイトURL
 *
 */
define('SITE_URL','http://localhost/hisukayu_project/cms/');
/* サイトバージョン
 *
 */
define('SITE_VERSION','1.0.5');
/* サイト名
 *
 */
define('SITE_NAME','HISUKAYU CUSTOMER MANEGEMENT CYSTEM');
/* デフォルトディレクトリ名
 *
*/
define('DEFAULT_DIR','index');
/* デフォルトファイル名
 *
*/
define('DEFAULT_FILE','index');
/* DB ホスト
 *
 */
define('DNS','mysql:host=127.0.0.1;dbname=hisukayu_cms');
/* DB データベース名
 *
*/
// define('DB_NAME','mmyk_cms');
/* DB ユーザー名
 *
*/
define('USER','root');
/* DB パスワード
 *
*/
define('PASS','k1nj0u0');
