<?php
SessionLoader::SessionStart();
$admins = SessionLoader::getSessionName("admins");
$info_sec = SessionLoader::getSessionName("info_sec");
$info_err = SessionLoader::getSessionName("info_err");
$infos = InfoPDO::InfoList($admins['id']);
$actives = ActionPDO::ActiveList($admins['id']);
?>

<div class="main-box-left" >
<?php getSideNavi(); ?>
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
											<span class="date" ><?php echo $infos[$i]['info_regdate']; ?></span>
											<span class="buttons" >
												<span class="edit" ><a href="dashboard-edit/<?php echo $infos[$i]['info_id']; ?>" title="編集する" ><img src="img/common/icon-edit-off.png" alt="編集アイコン" onmouseover="src='img/common/icon-edit-on.png'" onmouseout="src='img/common/icon-edit-off.png'" width="18px" ></a></span>
												<span class="delete" ><a href="dashboard-delete/<?php echo $infos[$i]['info_id']; ?>" title="削除する" class="del_link" ><img src="img/common/icon-delete-off.png" alt="削除アイコン" onmouseover="src='img/common/icon-delete-on.png'" onmouseout="src='img/common/icon-delete-off.png'" width="18px" ></a></span>
											</span>
										</span>
										<span class="info-title" ><a href="dashboard-edit-view/<?php echo $infos[$i]['info_id']; ?>" ><?php echo $infos[$i]['info_title']; ?></a></span>
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
					<div class="layout-sub-box" >
						<section>
							<h2>お知らせ投稿フォーム</h2>
							<form action="request_main" method="post" >
								<div id="info-reg-form" class="layout-padding" >
									<div class="forms" >
										<div class="custom01" >
											<p>
												<input class="custom01" type="text" name="info_title" value="<?php echo !empty($info_sec['title']) ? $info_sec['title'] : "" ; ?>" >
												<label for="custom01" >タイトル</label>
												<?php echo !empty($info_err['title']) ? "<span class=\"err\" >". $info_err['title'] ."</span>" : "" ;?>
											</p>
										</div>
									</div><!-- #end class forms -->
									<div class="forms margin-T30" >
										<div class="custom01" >
											<p>
												<textarea class="custom01" name="info_detaile" ><?php echo !empty($info_sec['detaile']) ? $info_sec['detaile'] : "" ; ?></textarea>
												<label for="custom01" >投稿内容</label>
												<?php echo !empty($info_err['detaile']) ? "<span class=\"err\" >". $info_err['detaile'] ."</span>" : "" ;?>
											</p>
										</div>
									</div><!-- #end class forms -->

									<div id="reg-button" >
										<div id="button" ><input type="submit" name="info_reg" value="投稿する" ></div>
										<input type="hidden" name="request_data" value="info_reg" >
									</div>
								</div><!-- #end id info-reg-form -->
							</form>
						</section>
					</div><!-- #end class layout-sub-box -->

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
?>