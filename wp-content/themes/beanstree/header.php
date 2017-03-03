<?php
/****************************************

	header.php

	Webサイトのヘッダー部分を表示するための
	テンプレートファイルです。

	header.php のコードについては、
	CHAPTER 8 で詳しく説明しています。

*****************************************/
?>
<!DOCTYPE html>
<html lang='ja'>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title>
	<?php if ( is_single() /** ! is_front_page() に書き換えよう！（CHAPTER 8） */ ) {
		wp_title( '::', true, 'right' );
	}
	bloginfo( 'name' ); ?>
	</title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>?ver=<?php echo date('U');?>" media="screen" />
	<link href="http://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700" rel="stylesheet" />
	<?php if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	/** コメント欄をポップアップで表示したいなら、下記を有効にする */
	// comments_popup_script();
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="container">
		<!-- header -->
		<header class="Header l-box">
			<div class="Header__head">
				<?php /** 下記の echo home_url( '/' ) を echo esc_url( home_url( '/' ) ) に書き換えよう！（CHAPTER 8） */ ?>
				<a class="Header__logo" href="<?php echo home_url( '/' ); ?>"><h1><img src=<?php echo get_template_directory_uri().'/images/logo.png' ?> alt=""></h1></a>
			</div>
			<nav class="Header__body">
				<ul class="Menu">
					<li><a class="Menu__item" href="#">まめの木について</a></li>
					<li><a class="Menu__item" href="#">1日のながれ</a></li>
					<li><a class="Menu__item" href="#">料金</a></li>
					<li><a class="Menu__item" href="#">お問合せ</a></li>
				</ul>
			</nav>
		</header>
		<!-- / header -->
<!-- /header.php -->