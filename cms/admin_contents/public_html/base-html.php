<!DOCTYPE html>
<html lang="ja" >
<head>
<meta charset="UTF-8" >
<title>HISUKAYU - <?php getTitle(); ?></title>
<link rel="stylesheet" href="css/common.css" >
<link rel="stylesheet" href="css/html5reset-1.6.1.css" >
<link rel="stylesheet" href="css/import.css" >
<script src="js/jquery-3.0.0.js" ></script>
<script src="js/actions.js" ></script>
<script src="js/footerFixed.js" ></script>
<script src="js/autosize.js"></script>
<script>
$(function(){
	$(".style1").focusout(function(){
	    if($(this).val() != ""){
	    	$(this).addClass("isVal");
	    }else{
	    	$(this).removeClass("isVal");
	    }
	});
	var input_txt = $('.inputBox input').val();
	var textarea_txt = $('.inputBox textarea').val();
	if(input_txt != "") {
		$('.inputBox input').addClass("isVal");
	}
	if(textarea_txt != "") {
		$('.inputBox textarea').addClass("isVal");
	}

	autosize(document.querySelectorAll('textarea'));
});
</script>

</head>

<body>
<div id="wrapper" >
<div id="container" >
<?php getHeader(); ?>
<div id="contents" >
<?php getContents($select); ?>
</div><!-- #end id contents -->
<?php getFooter();?>
</div><!-- #end id container -->
</div><!-- #end id wrapper -->
</body>
</html>