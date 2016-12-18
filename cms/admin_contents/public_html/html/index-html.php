<?php
/* HTML トップ
 *
 */
?>
<div id="login-form" >
	<div id="start-logo" ><img src="img/common/logo.png" ></div>
	<div id="login-guid" >ログインIDとパスワードを入力してください。</div>
		<div id="form-box" >
			<form action="" method="post" >
				<div class="forms" >
					<div class="login-parts titles" >ログインID</div>
					<div class="login-parts parts" >
						<input type="text" name="login_id" value="" >
					</div>
				</div><!-- #end id forms -->
				<div class="forms" >
					<div class="login-parts titles" >パスワード</div>
					<div class="login-parts parts" >
						<input type="password" name="pass" value="" >
					</div>
				</div><!-- #end id forms -->

				<div id="login-button" >
					<input type="submit" name="login" value="ログイン" >
					<input type="hidden" name="request_uri" value="login" >
				</div><!-- #end id login-button -->
			</form>
		</div><!-- #end id form-box -->
</div><!-- #end id login-form -->