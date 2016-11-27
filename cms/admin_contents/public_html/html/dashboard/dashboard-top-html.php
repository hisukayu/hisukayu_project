<?php
SessionLoader::SessionStart();
$admins = SessionLoader::getSessionName("admins");
?>

<div class="main-box-left" >
<?php getSideNavi(); ?>
</div><!-- #end class box-left -->

<div class="main-box-right" >
	<section>
		<h1>ダッシュボード</h1>

		<div id="information" >
			<section>
				<h2>お知らせ</h2>
				<div id="info-lists" >
					<dl>
						<dt><span class="date" >2016.11.01</span><span class="info-title" >お知らせタイトルを表示します。</span></dt>
						<dd>
							ここにはお知らせに関する詳細が表示されます。内容を確認してくださいね。<br />
							ここにはお知らせに関する詳細が表示されます。内容を確認してくださいね。
						</dd>
						<dt><span class="date" >2016.11.01</span><span class="info-title" >お知らせタイトルを表示します。</span></dt>
						<dd>
							ここにはお知らせに関する詳細が表示されます。内容を確認してくださいね。<br />
							ここにはお知らせに関する詳細が表示されます。内容を確認してくださいね。
						</dd>
						<dt><span class="date" >2016.11.01</span><span class="info-title" >お知らせタイトルを表示します。</span></dt>
						<dd>
							ここにはお知らせに関する詳細が表示されます。内容を確認してくださいね。<br />
							ここにはお知らせに関する詳細が表示されます。内容を確認してくださいね。
						</dd>
						<dt><span class="date" >2016.11.01</span><span class="info-title" >お知らせタイトルを表示します。</span></dt>
						<dd>
							ここにはお知らせに関する詳細が表示されます。内容を確認してくださいね。<br />
							ここにはお知らせに関する詳細が表示されます。内容を確認してくださいね。
						</dd>
					</dl>
				</div><!-- #end id info-lists -->
			</section>
		</div><!-- #end id information -->
	</section>
</div><!-- #end id box-right -->
