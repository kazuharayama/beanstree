<?php
/****************************************

	page.php

	固定ページを表示するための
	テンプレートファイルです。

	page.php のコードに関しては、
	CHAPTER 12 で詳しく解説しています。

*****************************************/

get_header(); ?>
<!-- page.php -->
<div id="main">
	<?php if ( have_posts() ) : /** WordPress ループ */
		while ( have_posts() ) : the_post(); /** 繰り返し処理開始 */ ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_content(); ?>
			</div>
		<?php endwhile; /** 繰り返し処理終了 */
	else: /** ここから記事が見つからなかった場合の処理 */ ?>
			<div class="post page">
				<h2>ページがありません</h2>
				<p>お探しのページは見つかりませんでした。</p>
			</div>
	<?php endif; /** WordPress ループここまで */ ?>
</div>
<!-- /main -->
<!-- /page.php -->
<?php get_sidebar();
get_footer(); ?>