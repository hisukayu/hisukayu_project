<div id="side" >
<?php $menus = getSideMenu(); ?>
<nav id="side-navi" >
<ul>
<?php for($i = 0; $i < count($menus); $i++) : ?>
	<li><a href="<?php echo $menus[$i]['parma_link']; ?>" ><?php echo $menus[$i]['menu_name']; ?></a></li>
<?php endfor; ?>
</ul>
</nav>
</div><!-- #end id side -->
