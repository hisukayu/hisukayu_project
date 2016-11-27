<!DOCTYPE html>
<html lang="ja" >
<head>
<meta charset="UTF-8" >
<title>HISUKAYU - <?php getTitle(); ?></title>
<link rel="stylesheet" href="css/common.css" >
<link rel="stylesheet" href="css/html5reset-1.6.1.css" >
<link rel="stylesheet" href="css/import.css" >
<script src="js/jquery-3.0.0.js" ></script>
<!-- <script src="js/footerFixed.js" ></script> -->

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