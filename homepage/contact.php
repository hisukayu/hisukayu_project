<?php
session_start();
$sec = @$_SESSION['items']['sec'];
$err = @$_SESSION['items']['err'];

?>
<!DOCTYPE html>
<html lang="ja" >
<head>
<meta charset="utf-8" >
<meta name="dispription" content="優しい価格で新規事業立上げのお客様を応援します。もちろんリニューアルや乗り換えの方も大歓迎！ホームページ制作についてお気軽にお問合せ下さい。" >
<meta name="keywords" content="沖縄,宮古島,全国対応,ホームページ,CMS,システム開発,ライティング,パソコン修理販売" >
<title>お問合せ｜沖縄・宮古島 ホームページ制作｜HISUKAYU</title>
<link rel="stylesheet" href="css/html5reset-1.6.1.css" >
<link rel="stylesheet" href="css/common.css" >
<link rel="stylesheet" href="css/contact.css" >
<script src="js/jquery-3.0.0.js" ></script>
<script src="js/footerFixed.js" ></script>
</head>


<div id="wrapp" >
	<div id="container" >
		<header>
			<div id="header-box" >
				<h1><a href="./" ><img src="img/common/logo.png" alt="沖縄・宮古島 ホームページ制作｜HISUKAYU｜イイ感じのものづくりを目指して。" ></a></h1>
				<h2>全国対応 ホームページ制作 HISUKAYU。<br />お客様から「イイ感じ」のお声をいただけるようなモノづくりを心がけています。</h2>
			</div>
		</header>
			<div id="index-img" >
			<div id="circle01" ><img src="img/top/circle01.png" alt="全国対応 沖縄 宮古島 ホームページ制作 HISUKAYU｜デザイン" ></div>
			<div id="circle02" ><img src="img/top/circle02.png" alt="全国対応 沖縄 宮古島 ホームページ制作 HISUKAYU｜コーディング" ></div>
			<div id="circle03" ><img src="img/top/circle03.png" alt="全国対応 沖縄 宮古島 ホームページ制作 HISUKAYU｜プログラム" ></div>
			</div>
			<div id="contents" >
				<div id="box01" >
					<section>
						<h2>
						お客様から「イイ感じ」のお声をいただけるモノづくりを目指します。
						</h2>
					</section>
				</div><!-- #end id box01 -->

				<div id="contact-frm" >
					<section>
						<h2>ホームページ制作についてお悩みなどお気軽にご相談ください。</h2>

						<div id="form" >
							<form action="util/mail.class.php" method="post" >
								<div id="forms" >
									<div class="form-box" >
										<div class="title" >お名前　<span class="hissu" >※</span></div>
										<div class="parts" >
											<input type="text" name="name1" value="<?php echo !empty($sec['name1']) ? $sec['name1'] : "" ;?>" placeholder="例）山田太郎" >
											<?php echo !empty($err['name1']) ? "<span class=\"err\" >".$err['name1']."</span>" : "" ;?>
										</div>
									</div><!-- #end class form-box -->
									<div class="form-box" >
										<div class="title" >フリガナ　<span class="hissu" >※</span></div>
										<div class="parts" >
											<input type="text" name="name2" value="<?php echo !empty($sec['name2']) ? $sec['name2'] : "" ;?>" placeholder="例）ヤマダタロウ" >
											<?php echo !empty($err['name2']) ? "<span class=\"err\" >".$err['name2']."</span>" : "" ;?>
										</div>
									</div><!-- #end class form-box -->
									<div class="form-box" >
										<div class="title" >企業名/事業名</div>
										<div class="parts" >
											<input type="text" name="company_name" value="<?php echo !empty($sec['company_name']) ? $sec['company_name'] : "" ;?>" placeholder="例）企業名/事業名を入力して下さい。" >
											<?php echo !empty($err['company_name']) ? "<span class=\"err\" >".$err['company_name']."</span>" : "" ;?>
										</div>
									</div><!-- #end class form-box -->
									<div class="form-box" >
										<div class="title" >電話番号　<span class="hissu" >※</span></div>
										<div class="parts" >
											<input type="text" name="tell" value="<?php echo !empty($sec['tell']) ? $sec['tell'] : "" ;?>" placeholder="例）090-1234-5678" >
											<?php echo !empty($err['tell']) ? "<span class=\"err\" >".$err['tell']."</span>" : "" ;?>
										</div>
									</div><!-- #end class form-box -->
									<div class="form-box" >
										<div class="title" >メールアドレス　<span class="hissu" >※</span></div>
										<div class="parts" >
											<input type="text" name="mail" value="<?php echo !empty($sec['mail']) ? $sec['mail'] : "" ;?>" placeholder="例）mail@example.com" >
											<?php echo !empty($err['mail']) ? "<span class=\"err\" >".$err['mail']."</span>" : "" ;?>
										</div>
									</div><!-- #end class form-box -->
									<div class="form-box" >
										<div class="title" >お問合せ種別　<span class="hissu" >※</span></div>
										<div class="parts" >
											<div class="parts-box" >
												<div class="parts-left" ><input type="radio" name="type" value="ホームページ制作について" <?php echo !empty($sec['type']) && $sec['type'] == "ホームページ制作について" ? "checked" : "" ;?> ></div>
												<div class="parts-right" >ホームページ制作について</div>
											</div><!-- #end class parts-box -->

											<div class="parts-box" >
												<div class="parts-left" ><input type="radio" name="type" value="ホームページの更新・管理について" <?php echo !empty($sec['type']) && $sec['type'] == "ホームページの更新・管理について" ? "checked" : "" ;?> ></div>
												<div class="parts-right" >ホームページの更新・管理について</div>
											</div><!-- #end class parts-box -->

											<div class="parts-box" >
												<div class="parts-left" ><input type="radio" name="type" value="その他" <?php echo !empty($sec['type']) && $sec['type'] == "その他" ? "checked" : "" ;?> ></div>
												<div class="parts-right" >その他</div>
											</div><!-- #end class parts-box -->

											<?php echo !empty($err['type']) ? "<span class=\"err\" >".$err['type']."</span>" : "<span class=\"sec\">どれかひとつお選びください。</span>" ;?>
										</div>
									</div><!-- #end class form-box -->
									<div class="form-box" >
										<div class="title" >その他お問合せ</div>
										<div class="parts" >
											<textarea name="comment" placeholder="例）ドメイン・サーバーとは何のことでしょうか？" ><?php echo !empty($sec['comment']) ? str_replace(array("\n","\n\r","\r"),"<br />",$sec['comment'])  : "" ;?></textarea>
											<?php echo !empty($err['comment']) ? "<span class=\"err\" >".$err['comment']."</span>" : "" ;?>
										</div>
									</div><!-- #end class form-box -->
								</div><!-- #end id forms -->

								<div id="buttons" >
									<input type="image" src="img/contact/send-btn.gif" value="この内容で送信する" >
									<input type="hidden" name="contacts" value="contact" >
								</div><!-- #end id buttons -->
							</form>
						</div>
					</section>
				</div><!-- #end id contact-frm -->

			</div><!-- #end contents -->
		<footer id="footer" >
			<div id="footer-box" >
				<div class="foot-left" ><a href="./" ><img src="img/common/footer-logo.gif" alt="イイ感じのモノづくり。Manufacturing of good feeling｜沖縄・宮古島 全国対応 ホームページ制作｜HISUKAYU" ></a></div>
				<div class="foot-right" ><a href="tel:050-6869-5392" ><img src="img/common/tell.gif" alt="ホームページ制作についてお気軽にお問合せ下さい。｜沖縄・宮古島 全国対応ホームページ制作｜HISUKAYU" ></a></div>
			</div><!-- #end id footer-box -->
		</footer>
	</div><!-- #end id container -->
</div><!-- #end id wrapp -->

</html>