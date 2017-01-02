<?php
SessionLoader::SessionStart();
$admins = SessionLoader::getSessionName("admins");
$info_sec = SessionLoader::getSessionName("info_sec");
$info_err = SessionLoader::getSessionName("info_err");
$infos = InfoPDO::InfoList($admins['id']);
$actives = ActionPDO::ActiveList($admins['id']);

$now_date = date('Y-m-d H:i:s', time());
$now_date = explode(' ', $now_date);
$dates = explode('-', $now_date[0]);
$times = explode(':', $now_date[1]);

?>

<div class="main-box-left" >
<?php getSideNavi("dashboard"); ?>
</div><!-- #end class box-left -->

<div class="main-box-right" >

	<div class="layout-main-box" >
		<section>
			<h1>ダッシュボード</h1>
			<div class="box-table margin-T20" >
				<div class="box-left padding-R20" >
					<div class="layout-sub-box" >
						<div id="information" >
							<section>
								<h2>お知らせ</h2>
								<div id="info-lists" class="layout-padding" >
								<?php if(!empty($infos)) : ?>
									<?php for($i = 0; $i < count($infos); $i++) :?>
									<dl>
									<dt>
										<span class="title-box" >
										<?php $reg_slice_date = explode(" ",$infos[$i]['info_regdate']); ?>
										<?php $day = day_diff(date('Y-m-d', time()), $reg_slice_date[0]); ?>
										<?php if($day < 4) : ?>
											<span class="new" >NEW</span>
										<?php endif; ?>
											<span class="date" >投稿日：<?php echo $infos[$i]['info_regdate']; ?></span>
											<span class="buttons" >
												<span class="edit" ><a href="dashboard-edit/<?php echo $infos[$i]['info_id']; ?>" title="編集する" ><img src="img/common/icon-edit-off.png" alt="編集アイコン" onmouseover="src='img/common/icon-edit-on.png'" onmouseout="src='img/common/icon-edit-off.png'" width="18px" ></a></span>
												<span class="delete" ><a href="dashboard-delete/<?php echo $infos[$i]['info_id']; ?>" title="削除する" class="del_link" ><img src="img/common/icon-delete-off.png" alt="削除アイコン" onmouseover="src='img/common/icon-delete-on.png'" onmouseout="src='img/common/icon-delete-off.png'" width="18px" ></a></span>
											</span>
										</span>
										<span class="info-title" ><a href="dashboard-edit/<?php echo $infos[$i]['info_id']; ?>" ><?php echo $infos[$i]['info_title']; ?></a></span>
									</dt>
									<dd>
										<?php echo mb_strimwidth(nl2br($infos[$i]['info_detaile']), 0, 100, "...", "UTF-8"); ?>
									</dd>
									</dl>
									<?php endfor; ?>
								<?php else :?>
									<div class="not-data" >お知らせ投稿はありません。</div>
								<?php endif; ?>
								</div><!-- #end id info-lists -->
							</section>
						</div><!-- #end id information -->
					</div><!-- #end class layout-sub-box -->
				</div><!-- #end class box-left -->

				<div class="box-right" >
				<?php if($result = SessionLoader::getSessionName('info_result') == "reg_ok") : ?>
				<script>
					$(function(){
						$('#result-box').html('<div id="result-ok">投稿完了しました。</div>').delay(3000).fadeOut(3000, "swing", function() {
							$("#result-ok").css({'display':'block'});
					    });
					});
				</script>
				<?php endif; ?>
				<?php if($result = SessionLoader::getSessionName('info_result') == "reg_ng") : ?>
				<script>
					$(function(){
						$('#result-box').html('<div id="result-ng">投稿内容に誤りがあります。</div>').delay(3000).fadeOut(3000, "swing", function() {
							$("#result-ng").css({'display':'block'});
					    });
					});
				</script>
				<?php endif; ?>
					<div id="result-box" ></div>

					<form action="request_main" method="post" >
						<div class="layout-sub-box" >
							<h2>公開</h2>
							<div class="open-set layout-padding" id="state-form" >
								<div class="set-list" >
									<div class="box-left valign-middle padding-R5" >
										<h4>公開状態：</h4>
									</div>
									<div class="box-center" id="states" >
										<select name="state" >
											<option value="open" <?php echo !empty($info_sec['info_state']) && $info_sec['info_state'] == "open" ? "selected" : "" ; ?> >公開</option>
											<option value="close" <?php echo !empty($info_sec['info_state']) && $info_sec['info_state'] == "close" ? "selected" : "" ;?> >非公開</option>
										</select>
									</div>
									<div class="box-right padding-L10" >
										<span class="err" ><?php echo !empty($info_err['info_state']) ? $info_err['info_state'] : "" ;?></span>
									</div>
								</div><!-- #end class set-list -->

								<div class="set-list" >
									<div class="box-left valign-middle padding-R5" >
										<h4>公開日時：</h4>
									</div>
									<div class="box-center" >
										<div class="form-date" >
											<div class="date-part" >
												<input type="text" name="year" value="<?php echo !empty($dates['year']) ? $info_sec['year'] : $dates[0] ; ?>" >
											</div>
											<div class="date-part-text" >
												年
											</div>
											<div class="date-part" >
												<input type="text" name="month" value="<?php echo !empty($info_sec['month']) ? $info_sec['month'] : $dates[1] ; ?>" >
											</div>
											<div class="date-part-text" >
												月
											</div>
											<div class="date-part" >
												<input type="text" name="day" value="<?php echo !empty($info_sec['day']) ? $info_sec['day'] : $dates[2] ; ?>" >
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
												<input type="text" name="hour" value="<?php echo !empty($info_sec['hour']) ? $info_sec['hour'] : $times[0] ; ?>" >
											</div>
											<div class="date-part-text" >
												:
											</div>
											<div class="date-part" >
												<input type="text" name="minute" value="<?php echo !empty($info_sec['minute']) ? $info_sec['minute'] : $times[1] ; ?>" >
											</div>
											<div class="date-part-text" >
												:
											</div>
											<div class="date-part" >
												<input type="text" name="seconds" value="<?php echo !empty($info_sec['seconds']) ? $info_sec['seconds'] : $times[2] ; ?>" >
											</div>
										</div><!-- #end class form-date -->
									</div><!-- #end class box-rgith padding-L10 -->

								</div><!-- #end set-list -->
							</div>
						</div><!-- #end layout-sub-box  -->

						<div class="layout-sub-box" >
							<section>
								<h2>お知らせ投稿フォーム</h2>
									<div id="info-reg-form" class="layout-padding" >
										<div class="forms" >
											<div class="inputBox">
												<input type="text" name="info_title" class="style1" value="<?php echo !empty($info_sec['title']) ? $info_sec['title'] : "" ; ?>" />
												<label>タイトル</label>
											</div>
											<?php echo !empty($info_err['title']) ? "<span class=\"err\" >". $info_err['title'] ."</span>" : "" ;?>
										</div><!-- #end class forms -->
										<div class="forms" >
											<div class="inputBox">
												<textarea name="info_detaile" class="style1" ><?php echo !empty($info_sec['detaile']) ? $info_sec['detaile'] : "" ; ?></textarea>
												<label>投稿内容</label>
											</div>
											<?php echo !empty($info_err['detaile']) ? "<span class=\"err\" >". $info_err['detaile'] ."</span>" : "" ;?>
										</div><!-- #end class forms -->

										<div id="reg-button" >
											<div id="button" ><input type="submit" name="info_reg" value="投稿する" ></div>
											<input type="hidden" name="request_data" value="info_reg" >
										</div>
									</div><!-- #end id info-reg-form -->
							</section>
						</div><!-- #end class layout-sub-box -->
					</form>


					<div class="layout-sub-box" >
						<section>
							<h2>アクティビティ</h2>
							<div class="activitys layout-padding" >
								<h3>最近のアクティブ</h3>
								<div class="lists" >
									<?php if(!empty($actives)) : ?>
									<ul>
									<?php for($j = 0; $j < count($actives); $j++) : ?>
										<li><?php echo $actives[$j]['active_update']; ?> <?php echo $actives[$j]['active_detaile']; ?></li>
									<?php endfor; ?>
									</ul>
									<?php else : ?>
									<div class="not-date" >最近のアクティブはありません</div>
									<?php endif; ?>
								</div>
							</div>
						</section>
					</div><!-- #end class layout-sub-box -->

				</div><!-- #end class box-right -->
			</div>
		</section>
	</div><!-- #end class layout-main-box -->

</div><!-- #end id box-right and class layout-main-box -->
<?php
SessionLoader::unsetSessionName('info_sec');
SessionLoader::unsetSessionName('info_err');
SessionLoader::unsetSessionName('info_result');
?>