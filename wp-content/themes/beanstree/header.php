<?php
/****************************************

	header.php

	Webサイトのヘッダー部分を表示するための
	テンプレートファイルです。

*****************************************/
?>
<!DOCTYPE html>
<html lang='ja'>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title>
	<?php if ( is_single() ) {
		wp_title( '::', true, 'right' );
	}
	bloginfo( 'name' ); ?>
	</title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>?ver=<?php echo date('U');?>" media="screen" />
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700" rel="stylesheet" />
	<?php if ( is_singular() ) {
				wp_enqueue_script( 'comment-reply' );
		  }
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="container">
		<!-- header -->
		<header class="Header l-box">
			<div class="Header__head">
				<?php /** 下記の echo home_url( '/' ) を echo esc_url( home_url( '/' ) ) に書き換えよう！（CHAPTER 8） */ ?>
				<a class="Header__logo" href="<?php echo home_url( '/' ); ?>">
					<h1>
						<img class="Header__thumb" src=<?php echo get_template_directory_uri().'/images/logo.png' ?> alt="">
				    </h1>
				</a>
			</div>
			<nav class="Header__body">
				<?php wp_nav_menu( array('menu' => 'Header__body', 'container' => false, 'menu_class' => 'Menu') ); ?>
			</nav>
		</header>
		<!-- / header -->
<!-- /header.php -->