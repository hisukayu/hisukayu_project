<?php
SessionLoader::SessionStart();
$info_detaile = SessionLoader::getSessionName('info_detaile');
$info_up_sec = SessionLoader::getSessionName('info_up_sec');
$info_up_err = SessionLoader::getSessionName('info_up_err');

$date_time = explode(' ',$info_detaile['info_regdate']);
// 日付
$dates = explode('-',$date_time[0]);
// 時間
$times = explode(':',$date_time[1]);
?>
<div class="main-box-left" >
<?php getSideNavi("dashboard"); ?>
</div><!-- #end class box-left -->

<div class="main-box-right" >

	<div class="layout-main-box" >
		<section>
			<h1>ダッシュボード</h1>

			<div class="box-table margin-T20" >
			<?php if($result = SessionLoader::getSessionName('info_result') == "reg_ok") : ?>
			<script>
				$(function(){
					$('#result-box').html('<div id="result-ok">内容を更新しました。</div>').delay(3000).fadeOut(3000, "swing", function() {
						$("#result-ok").css({'display':'block'});
				    });
				});
			</script>
			<?php endif ; ?>
			<?php if($result = SessionLoader::getSessionName('info_result') == "reg_ng") : ?>
			<script>
				$(function(){
					$('#result-box').html('<div id="result-ng">編集内容に誤りがあります。</div>').delay(3000).fadeOut(3000, "swing", function() {
						$("#result-ng").css({'display':'block'});
				    });
				});
			</script>
			<?php endif ; ?>
			<div id="result-box" ></div>



				<div class="layout-sub-box " >
					<h2>公開</h2>
					<div class="open-set layout-padding" id="state-form" >
						<div class="set-list" >
							<div class="box-left valign-middle padding-R5" >
								<h4>公開状態：</h4>
							</div>
							<div class="box-center" id="states" >
								<select name="state" >
									<option value="open" <?php echo !empty($info_detaile['state']) && $info_detaile['state'] == "open" ? "selected" : "" ; ?> >公開</option>
									<option value="close" <?php echo !empty($info_detaile['state']) && $info_detaile['state'] == "close" ? "selected" : "" ;?> >非公開</option>
								</select>
							</div>
							<div class="box-center padding-L10" >
								<span class="upbtn" ><button id="state-update-btn" data-infoid="<?php echo $info_detaile['info_id']; ?>" >OK</button></span>
							</div>
							<div class="box-right padding-L10" >
								<span id="state-result" ></span>
							</div>
						</div><!-- #end class set-list -->

						<div class="set-list" >
							<div class="box-left valign-middle padding-R5" >
								<h4>公開日時：</h4>
							</div>
							<div class="box-center" >
								<div class="form-date" >
									<div class="date-part" >
										<input type="text" name="year" value="<?php echo $dates[0]; ?>" >
									</div>
									<div class="date-part-text" >
										年
									</div>
									<div class="date-part" >
										<input type="text" name="month" value="<?php echo $dates[1]; ?>" >
									</div>
									<div class="date-part-text" >
										月
									</div>
									<div class="date-part" >
										<input type="text" name="day" value="<?php echo $dates[2]; ?>" >
									</div>
									<div class="date-part-text" >
										日
									</div>
								</div>
							</div>
							<div class="box-right padding-L10" >
								<div class="form-date" >
									<div class="date-part-text valign-middle padding-R5" >
										@
									</div>
									<div class="date-part" >
										<input type="text" name="hour" value="<?php echo $times[0]; ?>" >
									</div>
									<div class="date-part-text" >
										:
									</div>
									<div class="date-part" >
										<input type="text" name="minute" value="<?php echo $times[1]; ?>" >
									</div>
									<div class="date-part-text" >
										:
									</div>
									<div class="date-part" >
										<input type="text" name="seconds" value="<?php echo $times[2]; ?>" >
									</div>
								</div><!-- #end class form-date -->
							</div><!-- #end class box-rgith padding-L10 -->
							<div class="box-right padding-L10" >
								<span class="upbtn" ><button id="date-update-btn" data-infoid="<?php echo $info_detaile['info_id']; ?>" >OK</button></span>
							</div>
							<div class="box-right padding-L10" >
								<span id="date-result" ></span>
							</div>
						</div><!-- #end set-list -->
					</div>
				</div><!-- #end layout-sub-box  -->
			</div><!-- #end class box-table margin-T20 -->

			<div class="box-table margin-T20" >
				<div class="layout-sub-box" >
					<section>
						<h2>お知らせ投稿フォーム</h2>
						<form action="request_main" method="post" >
							<div id="info-reg-form" class="layout-padding" >
								<div class="forms" >
									<div class="inputBox">
										<input type="text" name="info_title" class="style1" value="<?php echo !empty($info_up_sec['title']) ? $info_up_sec['title'] : $info_detaile['title'] ; ?>" />
										<label>タイトル</label>
									</div>
									<?php echo !empty($info_up_err['title']) ? "<span class=\"err\" >". $info_up_err['title'] ."</span>" : "" ;?>
								</div><!-- #end class forms -->
								<div class="forms" >
									<div class="inputBox">
										<textarea name="info_detaile" class="style1" ><?php echo !empty($info_up_sec['detaile']) ? $info_up_sec['detaile'] : $info_detaile['detaile'] ; ?></textarea>
										<label>投稿内容</label>
									</div>
									<?php echo !empty($info_up_err['detaile']) ? "<span class=\"err\" >". $info_up_err['detaile'] ."</span>" : "" ;?>
								</div><!-- #end class forms -->

								<div id="reg-button" >
									<div id="button" ><input type="submit" name="info_update" value="内容を変更する" ></div>
									<input type="hidden" name="request_data" value="info_update" >
									<input type="hidden" name="info_id" value="<?php echo $info_detaile['info_id']; ?>" >
								</div>
							</div><!-- #end id info-reg-form -->
						</form>
					</section>
				</div><!-- #end class layout-sub-box -->
			</div>
		</section>
	</div><!-- #end class layout-main-box -->

</div><!-- #end id box-right and class layout-main-box -->
<?php
SessionLoader::unsetSessionName('info_up_sec');
SessionLoader::unsetSessionName('info_up_err');
SessionLoader::unsetSessionName('info_result');
?>