<?php
/****************************************

		functions.php

		テーマ内で利用する関数を定義したり、
		テーマの設定を行うためのファイルです。

*****************************************/
 /* custum header */
  $args = array (
    'width' => 940,
    'height' => 250,
    'header-text' => false,
    'default-images' => get_template_directory_uri().'/images/default-header.png',
    //'admin-head-callback' 	=> 'admin_header_style',
    'uploads' => true,
  );
  /* add custum header */
  add_theme_support('custom-header', $args);
  /* regist custum header default images */
  register_default_headers( array(
        'image1' => array(
        'url' => get_template_directory_uri() .'/images/default-header.png',
        'thumbnail_url' => get_template_directory_uri() .'/images/default-header.png',
        'description' => 'this is test images',
        ),
  ));

/** メインカラムの幅を指定する変数。下記は 600px を指定（記述推奨） */
if ( ! isset( $content_width ) ) $content_width = 600;

/** <head>内に RSSフィードのリンクを表示するコード */
add_theme_support( 'automatic-feed-links' );

/** ダイナミックサイドバーを定義するコード（CHAPTER 11）*/
register_sidebar( array(
	'name'			=> 'サイドバーウィジット-1',
	'id'			=> 'sidebar-1',
	'description'	=> 'サイドバーのウィジットエリアです。デフォルトのサイドバーと丸ごと入れ替えたいときに使ってください。',
    'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
    'after_widget'	=> '</div>',
) );

/** 複数のダイナミックサイドバーを定義するコード（CHAPTER 11）*/
/**
register_sidebar( array(
	'name'			=> 'サイドバーウィジット-2',
	'id'			=> 'sidebar-2',
	'description'	=> 'サイドバーのウィジットのテストです。',
    'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
    'after_widget'	=> '</div>',
));
*/

/** カスタムメニュー機能を有効にするコード（CHAPTER 12）*/
add_theme_support( 'menus' );

/** カスタムメニューの「場所」を設定するコード */
register_nav_menu( 'header-navi', 'ヘッダーのナビゲーション' );
// register_nav_menu( 'sidebar-navi', 'サイドバーのナビゲーション' );
// register_nav_menu( 'footer-navi', 'フッターのナビゲーション' );
?>