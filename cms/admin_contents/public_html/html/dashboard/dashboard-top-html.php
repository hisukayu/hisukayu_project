<?php
SessionLoader::SessionStart();
$admins = SessionLoader::getSessionName("admins");
$info_reg = SessionLoader::getSessionName("info_item_reg");
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
							<h2>お知らせ投稿フォーム</h2>
							<form action="" method="post" >
								<div id="info-reg-form" >
									<div class="forms" >
										<div class="parts-input" >
											<input class="parts-textbox" type="text" name="" value="" placeholder="タイトルを入力してください" >
											<?php echo !empty($info_reg['sec']['title']) ? "<span class=\"err\" >". $info_reg['sec']['title'] ."</span>" : "" ;?>
										</div>
									</div><!-- #end class forms -->
									<div class="forms" >
										<textarea class="parts-textarea"  name="info-detaile" placeholder="投稿する内容を入力してください" ></textarea>
										<?php echo !empty($info_reg['sec']['detaile']) ? "<span class=\"err\" >". $info_reg['sec']['detaile'] ."</span>" : "" ;?>
									</div><!-- #end class forms -->
								</div><!-- #end id info-reg-form -->

								<div id="reg-button" >
									<div id="button" ><input type="submit" name="info-reg" value="投稿する" ></div>
								</div>
							</form>
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
