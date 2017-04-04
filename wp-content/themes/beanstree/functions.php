<?php
/****************************************

		functions.php

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

/* add post thumbnail　*/
add_theme_support('post-thumbnails');

/* custum menu */
add_theme_support('menus');


/* location of menus */
register_nav_menu('header-navi', 'メインナビゲーション');
register_nav_menu('header-sub-navi', 'サブナビゲーション');
register_nav_menu('footer-navi', 'フッターナビゲーション');
register_nav_menu('footer-left-column', 'フッター左カラム');
register_nav_menu('footer-center-column', 'フッターセンターカラム');
register_nav_menu('footer-right-column', 'フッター右カラム');

/* 
  get gage info for top
*/
function get_page_info($name) {
  global $page_data;
  $page_info = get_page_by_path($name);
  $page_data = get_post($page_info);
  return $page_data;
}

/* custum of commnet form for contacts */

function wp34731_move_comment_field_to_bottom( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  
  return $fields;
}
add_filter( 'comment_form_fields', 'wp34731_move_comment_field_to_bottom' );

$custum_comment_fields =  array(
//<span class="font-red">*</span>を削除
'author' => '<div class="Contact comment-form-author">' . 
  '<div class="Contact__sub"><h4><label for="author">' . 'お名前'. '</label></h4></div> ' . ( $req ? ' <span class="required">*</span>' : '' ) .
  '<div class="Contact__main"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div></div>',
//<span class="font-red">*</span>を削除
'email'  => '<div class="Contact comment-form-email">'.
  '<div class="Contact__sub"><h4><label for="email">' . 'Email'. '</label></h4></div> ' . ( $req ? ' <span class="required">*</span>' : '' ) .
  '<div class="Contact__main"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div></div>',
//ウェブサイト入力欄を廃止            
'url'    => '',
);

// global $custum_comment_args;
$custum_comment_args = array(
'fields'               => $custum_comment_fields,
//「コメント」を「お問合せ内容」に変更
'comment_field'        => '<div class="Contact comment-form-comment">'.
                          '<div class="Contact__sub"><h4><label for="comment">' .'お問い合わせ内容'. '</label></h4></div>'.
                          '<div class="Contact__main"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div></div>',
//「メールアドレスが～必須項目です」を削除
'comment_notes_before' => '<div class="Contact__head"><p>メールアドレスが公開されることはありません。入力項目は全て必須です。</p></div>',
//コメントフォームの後ろにある、使用できるHTMLについての注釈を削除
'comment_notes_after'  => '',
//「コメントを残す」を削除
'title_reply'          => '',
//「コメントを送信」を「送信」に変更
'label_submit'         => '送信',
);

/* avairable for wordpress jQuery  */
function beans_scripts() {
  	wp_deregister_script('jquery');
	  wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4');
	 // wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array(), '1.12.1');
	 // wp_enqueue_script('javascript', get_template_directory_uri().'/js/jquery-easing.js', array(), '1.13');
    wp_enqueue_script( 'javascript',get_template_directory_uri().'/js/beans.js', array('jquery'),'1.0');
    if( is_singular( 'workshops' ) ) {
				//wp_enqueue_script( 'javascript',get_template_directory_uri().'/js/beans-single-workshop.js', array('jquery'),'1.0');
		}
}
add_action( 'wp_enqueue_scripts', 'beans_scripts' );
?>
