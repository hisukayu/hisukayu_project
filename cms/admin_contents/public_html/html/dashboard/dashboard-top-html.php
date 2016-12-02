<?php
SessionLoader::SessionStart();
$admins = SessionLoader::getSessionName("admins");
$infos = InfoPDO::InfoList();
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
								<div id="info-lists" >
									<dl>
									<?php for($i = 0; $i < count($infos); $i++) :?>
									<dt>
										<span class="title-box" >
											<span class="new" >NEW</span>
											<span class="date" ><?php echo $infos[$i]['info_regdate']; ?></span>
											<span class="buttons" >
												<span class="edit" ><a href="dashboard-edit/<?php echo $infos[$i]['id']; ?>" title="編集する" ><img src="img/common/icon-edit-off.png" alt="編集アイコン" onmouseover="src='img/common/icon-edit-on.png'" onmouseout="src='img/common/icon-edit-off.png'" width="18px" ></a></span>
												<span class="delete" ><a href="dashboard-delete/<?php echo $infos[$i]['id']; ?>" title="削除する" ><img src="img/common/icon-delete-off.png" alt="削除アイコン" onmouseover="src='img/common/icon-delete-on.png'" onmouseout="src='img/common/icon-delete-off.png'" width="18px" ></a></span>
											</span>
										</span>
										<span class="info-title" ><a href="dashboard-edit-view/<?php echo $infos[$i]['id']; ?>" ><?php echo $infos[$i]['info_title']; ?></a></span>
									</dt>
									<dd>
										<?php echo str_replace(array("\n","\n\r","\r"),"<br />",$infos[$i]['info_detaile']); ?>
									</dd>
									<?php endfor; ?>
									</dl>
								</div><!-- #end id info-lists -->
							</section>
						</div><!-- #end id information -->
					</div><!-- #end class layout-sub-box -->
				</div><!-- #end class box-left -->

				<div class="box-right" >
					<div class="layout-sub-box" >
						<section>
							<h2>お知らせ投稿</h2>
							<div id="info-reg-form" >
								<div class="forms" >
									<div class="parts-title" >
										<span>タイトル</span>
									</div>
									<div class="parts-input" >
										<span><input type="text" name="info-title" value="" ></span>
									</div>
								</div>
							</div>
						</section>
					</div><!-- #end class layout-sub-box -->
				</div><!-- #end class box-right -->
			</div>
		</section>
	</div><!-- #end class layout-main-box -->

	<div class="layout-sub-box" >
		<section>
			<h2>アクティビティ</h2>
			<div class="activitys" >
				<div class="lists" >
					<ul>
						<li><a href="">2016.12.01 23：59 Hello World！ページを作成</a></li>
						<li><a href="">2016.12.01 23：59 Hello World！ページを編集</a></li>
						<li><a href="">2016.12.01 23：59 Hello World！ページを削除</a></li>
						<li><a href="">2016.12.01 23：59 お知らせ：タイトルを新規投稿</a></li>
					</ul>
				</div>
			</div>
		</section>
	</div><!-- #end class layout-sub-box -->


</div><!-- #end id box-right and class layout-main-box -->
