<?php
/****************************************

	footer.php

	フッターを表示するための
	テンプレートファイルです。


*****************************************/
?>
<!-- footer.php -->
</div><!-- / container -->
<!-- footer -->
<div id="footer" class="Footer l-box2">
	<div class="Footer__sub">
		<img class="Footer__thumb" src=<?php echo get_template_directory_uri().'/images/footer.png'?> alt="">
	</div>
	<div class="Footer__main">
		<nav class="Footer__head">
			<?php wp_nav_menu( array('menu' => 'Footer__head', 'container' => false, 'menu_class' => 'Menu--sub') ); ?>
		</nav>
		<div class="Footer__body">
			<p id="copyright" class="wrapper">&copy; <?php bloginfo( 'name' ); ?> All Rights Reserved.</p>
		</div>
		<div class="Footer__foot">
			facebook
		</div>
	</div>
</div>
<?php wp_footer(); ?>

</body>
</html>
<!-- /footer.php -->