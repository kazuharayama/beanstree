<?php
/****************************************

	category.php カテゴリーごとのページ一覧ページです

*****************************************/

get_header(); ?>

<?php 
  $queried_object = get_queried_object();
  //カテゴリー毎のヘッダー画像出し分けをここで処理する。
?>

<!-- index.php -->
<section class="l-box C-Section">
	<div class="SectionLabel">
    	<h3 class="SectionLabel__text">
    		<img class="SectionLabel__image" src=<?php echo get_template_directory_uri().'/images/icon_mame.png' ?> alt="">
    		<?php echo $queried_object->name; ?>
    	</h3>
    </div>
</section>
	<div class="CategoryTop__head">
		<img src=<?php echo get_template_directory_uri().'/images/slide2.jpg' ?> alt="">
	</div>
<section class="l-box Section">
	<div class="CategoryTop">
	    <div class="CategoryTop__body">
	      <p><?php echo $queried_object->description; ?></p>
	    </div>
	    <div class="EntryPanel">
		    <div class="EntryPanel__main">
	<?php
		if ( have_posts() ) :
			// ループ開始
			while ( have_posts() ) : the_post(); ?>
			    <div class="EntryPanel__item">
			    	<div class="EntryPanel__body2">
		        	    <p><?php echo date("Y年n月j日",  strtotime($post->post_date_gmt));//the_date("Y年n月j日 l g時 i分"); ?></p>
		            </div>
				    <div class="EntryPanel__body">
					    <a href="<?php echo $post->guid;?>"><?php echo get_the_post_thumbnail($post->ID, array(170,170)); ?></a>
				    </div>
				    <div class="EntryPanel__head1">
		        	    <h6 class="EntryPanel__head2"><?php echo $post->post_title;?></h6>
		            </div>
		        </div>
					<?php
						/**
						 * コンテンツを表示する
						 */
						//the_content( '続きを読む &raquo;', true );
					?>
		<?php
			// ループ終了
			endwhile;
		// ここから記事が見つからなかった場合の処理
		else :  ?>
			<div class="post">
				<h2>記事はありません</h2>
				<p>お探しの記事は見つかりませんでした。</p>
			</div>
	<?php
		// if 文終了
		endif; ?>
	<?php
		/**
		 * ページャーを表示する
		 */
		if ( $wp_query->max_num_pages > 1 ) : ?>

			<div class="posts-navigation">
				<div class="nav-next"><?php previous_posts_link( '&laquo; NEXT' ); ?></div>
				<div class="nav-previous"><?php next_posts_link( 'PREV &raquo;' ); ?></div>
			</div>

	<?php
		// if 文終了
		endif; ?>
		    
	    </div>
    </div><!-- /#main -->
</section>

<?php get_footer(); ?>