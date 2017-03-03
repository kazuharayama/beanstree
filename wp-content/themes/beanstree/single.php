<?php
/****************************************

	single.php

	個別記事ページを表示するための
	テンプレートファイルです。

	single.php のコードに関しては、
	CHAPTER 10 で詳しく解説しています。

*****************************************/
?>

<?php get_header(); ?>

<!-- single.php -->
<div id="main">

	<?php
		// ループ開始
		while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="post-meta">
					<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					<span class="category">Category - <?php the_category( ', ' ) ?></span>
					<span class="comment-num"><?php comments_popup_link( 'Comment : 0', 'Comment : 1', 'Comments : %' ); ?></span>
				</p>

				<?php
					/**
					 * コンテンツを表示する
					 */
					the_content();

					/**
					 * ページリンクを表示する（投稿を複数ページに分けた場合のリンクです）
					 */
					$args = array(
						'before'	  => '<div class="page-link">',
						'after'		  => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					);
					wp_link_pages( $args ); ?>

				<p class="footer-post-meta">
					<?php the_tags( 'Tag : ', ', ' ); ?>
					<span class="post-author">作成者 :
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
							<?php the_author(); ?>
						</a>
					</span>
				</p>

			</div><!-- /#post -->

		<?php
			/**
			 * 投稿ナビゲーション（次の記事へ、前の記事へのリンク）
			 */
		?>
			<div class="post-navigation">

				<?php
					if ( get_next_post() ) : ?>
						<div class="nav-next"><?php next_post_link( '%link', '&laquo; %title' ); ?></div>
				<?php
					endif;

					if ( get_previous_post() ) : ?>
						<div class="nav-previous"><?php previous_post_link( '%link', '%title &raquo;' ); ?></div>
				<?php
					endif; ?>

			</div><!-- /.post-navigation -->

			<?php
				/**
				 * 投稿ナビゲーションに the_post_navigation() を使い場合はコメントアウトを削除してください。
				 */

				//$args = array(
				//	'prev_text' => '%title &raquo;',
				//	'next_text' => '&laquo; %title',
				//	'screen_reader_text' => '投稿ナビゲーション',
				//);
				//the_post_navigation( $args );
			?>

			<?php
				/**
				 * comments.php の読み込み
				 */
				comments_template();
			?>

	<?php
		// ループ終了
		endwhile; ?>

</div><!-- /#main -->
<!-- /single.php -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>