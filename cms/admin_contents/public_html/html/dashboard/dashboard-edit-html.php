<?php
SessionLoader::SessionStart();
$info_detaile = SessionLoader::getSessionName('info_detaile');
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
				<div class="layout-sub-box" >
					<h2>公開</h2>
					<div class="forms open-set layout-padding" >
						<div class="set-list" >
							<div class="box-left valign-middle padding-R5" >
								<h4>公開状態：</h4>
							</div>
							<div class="box-center" >
								<select name="state" >
									<option value="" >選択</option>
									<option value="open" <?php echo !empty($info_detaile['state']) && $info_detaile['state'] == "open" ? "selected" : "" ; ?> >公開</option>
									<option value="close" <?php echo !empty($info_detaile['state']) && $info_detaile['state'] == "clase" ? "selected" : "" ;?> >非公開</option>
								</select>
							</div>
							<div class="box-right padding-L10" >
								<span class="upbtn" ><button id="state-update-btn" data-infoid="<?php echo $info_detaile['info_id']; ?>" >OK</button></span>
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
