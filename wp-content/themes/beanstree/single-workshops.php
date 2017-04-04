<?php
/****************************************

	single.php

*****************************************/
?>

<?php get_header(); ?>

<!-- single.php -->
<section class="l-box">
	<div class="HeadSpace"></div>
<div id="main">

	<?php
		// ループ開始
		while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="SectionLabel">
                    <h3 class="SectionLabel__text">
                    	<img class="SectionLabel__image" src=<?php echo get_template_directory_uri().'/images/icon_mame.png' ?> alt=""><?php the_title(); ?>
                    </h3>
                </div>
                <div class="Event__mainImage">
                	<?php  echo get_the_post_thumbnail($post->ID, array(1160,390)); ?>
                </div>
                <div class="Event">
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

				    
                </div>
			</div><!-- /#post -->

		<?php
			/**
			 * 投稿ナビゲーション（次の記事へ、前の記事へのリンク）
			 */
		?>
			

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
				//comments_template();
			?>

	<?php
		// ループ終了
		endwhile; ?>

</div><!-- /#main -->
</section>
<!-- /single.php -->

<?php get_footer(); ?>