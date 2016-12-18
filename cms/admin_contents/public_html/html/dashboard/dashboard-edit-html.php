<?php
SessionLoader::SessionStart();
$info_detaile = SessionLoader::getSessionName('info_detaile');
?>

<div class="main-box-left" >
<?php getSideNavi("dashboard"); ?>
</div><!-- #end class box-left -->

<div class="main-box-right" >

	<div class="layout-main-box" >
		<section>
			<h1>ダッシュボード</h1>
			<div class="box-table margin-T20" >
				<div class="layout-sub-box" >
					<section>
						<h2>お知らせ投稿フォーム</h2>
						<form action="request_main" method="post" >
							<div id="info-reg-form" class="layout-padding" >
								<div class="forms" >
									<div class="inputBox">
										<input type="text" name="info_title" class="style1" value="<?php echo !empty($info_detaile['title']) ? $info_detaile['title'] : "" ; ?>" />
										<label>タイトル</label>
									</div>
									<?php echo !empty($info_err['title']) ? "<span class=\"err\" >". $info_err['title'] ."</span>" : "" ;?>
								</div><!-- #end class forms -->
								<div class="forms" >
									<div class="inputBox">
										<textarea name="info_detaile" class="style1" ><?php echo !empty($info_detaile['detaile']) ? $info_detaile['detaile'] : "" ; ?></textarea>
										<label>投稿内容</label>
									</div>
									<?php echo !empty($info_err['detaile']) ? "<span class=\"err\" >". $info_err['detaile'] ."</span>" : "" ;?>
								</div><!-- #end class forms -->

								<div id="reg-button" >
									<div id="button" ><input type="submit" name="info_update" value="内容を変更する" ></div>
									<input type="hidden" name="request_data" value="info_update" >
								</div>
							</div><!-- #end id info-reg-form -->
						</form>
					</section>
				</div><!-- #end class layout-sub-box -->
			</div>
		</section>
	</div><!-- #end class layout-main-box -->

</div><!-- #end id box-right and class layout-main-box -->
