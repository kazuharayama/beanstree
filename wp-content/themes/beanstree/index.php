<?php
/****************************************

	index.php

	WordPressサイトには、なくてはならない
	テンプレートファイルです。

	index.php のコードに関しては、
	CHAPTER 9 で詳しく解説しています。

*****************************************/

get_header(); ?>


<!-- ImageSlide -->


<!-- AboutPanel -->
<section class="l-box Section">
	<div class="l-row">
	    <div class="l-half">
            <div class="AboutPanel">
	            <div class="AboutPanel__head">
	        	    <h3>まめの木って何？</h3>
        	    </div>
        	    <div class="l-rowAbout">
        	        <div class="AboutPanel__sub">
                        <img class="AboutPanel__thumb" src=<?php echo get_template_directory_uri().'/images/about1.png'?> alt="">
                    </div>
                    <div class="AboutPanel__main">
                        <div class="AboutPanel__body">
        	                まめの木とは子供達が好奇心と想像力を使って本当にやりたいことをして生きる力を学ぶためのスクールです。私たちは子供たちの日常の中で起こるすべてのことに学びと成長があると考えています。
                        </div>
                        <div class="AboutPanel__foot">
                            <a class="button" href="">もっと見る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="l-half">
            <div class="AboutPanel">
        	    <div class="AboutPanel__head">
        		    <h3>まめの木コミュニティー</h3>
        	    </div>
        	    <div class="l-rowAbout">
        	        <div class="AboutPanel__sub">
        		        <img class="AboutPanel__thumb" src=<?php echo get_template_directory_uri().'/images/about2.png' ?> alt="">
                    </div>
                    <div class="AboutPanel__main">
                        <div class="AboutPanel__body">
            	            まめの木は広大な自然の中にあり、子供たちに幸せに育って欲しいと願う有志が集まって始まった学校です。様々な人たちが集まってきて、オープンな環境で色んなプロジェクトを進めています。
                        </div>
                        <div class="AboutPanel__foot">
            	            <a class="button" href="">もっと見る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- EntryPanel -->
<section class="l-box Section">
	<div class="EntryPanel">
    	<div class="EntryPanel__head">
    		<h3>まめの木情報局</h3>
    	</div>
    	<div class="EntryPanel__body">
    		<div class="EntryPanel__item"><img class="EntryPanel__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>"></div>
    		<div class="EntryPanel__item"><img class="EntryPanel__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>"></div>
    		<div class="EntryPanel__item"><img class="EntryPanel__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>"></div>
	    	<div class="EntryPanel__item"><img class="EntryPanel__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>"></div>
    		<div class="EntryPanel__item"><img class="EntryPanel__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>"></div>
    		<div class="EntryPanel__item"><img class="EntryPanel__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>"></div>
    		<div class="EntryPanel__item"><img class="EntryPanel__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>"></div>
    		<div class="EntryPanel__item"><img class="EntryPanel__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>"></div>
    		<div class="EntryPanel__item"><img class="EntryPanel__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>"></div>
    		<div class="EntryPanel__item"><img class="EntryPanel__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>"></div>
    		<div class="EntryPanel__item"><img class="EntryPanel__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>"></div>
    		<div class="EntryPanel__item"><img class="EntryPanel__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>"></div>
	    	<div class="EntryPanel__item"><img class="EntryPanel__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>"></div>
    	</div>
    	<div class="EntryPanel__foot Section">
    		<a class="button" href="">もっと見る</a>
    	</div>
    	<div class="Category">
    	 	<div class="l-columnCate">
	    		<div class="Category__head">
	    			<h4>学校便り</h4>
	    		</div>
	    		<div class="Category__body">
    				<img class="Category__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>">
	    		</div>
	    	</div>
    		<div class="l-columnCate">
	    		<div class="Category__head">
	    			<h4>農業日誌</h4>
	    		</div>
	    		<div class="Category__body">
	    			<img class="Category__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>">
	    		</div>
    		</div>
    		<div class="l-columnCate">
	    		<div class="Category__head">
	    			<h4>カフェ作り</h4>
	    		</div>
	    		<div class="Category__body">
	    			<img class="Category__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>">
	    		</div>
	    	</div>
    		<div class="l-columnCate">
	    		<div class="Category__head">
	    			<h4>WWOOF便り</h4>
	    		</div>
    			<div class="Category__body">
	    			<img class="Category__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>">
	    		</div>
	    	</div>
    		<div class="l-columnCate">
	    		<div class="Category__head">
	    			<h4>まめの木祭り</h4>
    			</div>
	    		<div class="Category__body">
	    			<img class="Category__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>">
	    		</div>
    		</div>
    		<div class="l-columnCate">
    			<div class="Category__head">
    				<h4>サマーキャンプ</h4>
    			</div>
	    		<div class="Category__body">
	    			<img class="Category__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>">
		    	</div>
	    	</div>
	    	<div class="l-columnCate">
	    		<div class="Category__head">
    				<h4>まめの木の人々</h4>
	    		</div>
	    		<div class="Category__body">
    				<img class="Category__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>">
    			</div>
    		</div>
    		<div class="l-columnCate">
    			<div class="Category__head">
	    			<h4>ワークショップ</h4>
	    		</div>
    			<div class="Category__body">
	    			<img class="Category__thumb" src="<?php echo get_template_directory_uri().'/images/thumb.png' ?>">
    			</div>
    		</div>
    	</div>
	</div>
</section>


<div id="main">

	<?php
		if ( have_posts() ) :

			// ループ開始
			while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<p class="post-meta">
						<?php
							/**
							 * 下記の the_date() を the_time( get_option( 'date_format' ) ) に書き換える（CHAPTER 9）
							 */
						?>
						<span class="post-date"><?php the_date(); ?></span>
						<span class="category">Category - <?php the_category( ', ' ); ?></span>
						<span class="comment-num"><?php comments_popup_link( 'Comment : 0', 'Comment : 1', 'Comments : %' ); ?></span>
					</p>

					<?php
						/**
						 * コンテンツを表示する
						 */
						the_content( '続きを読む &raquo;', true );
					?>

				</div><!-- /#post -->

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

	<?php
		/**
		 * ページャーに the_posts_navigation() を使う場合は下記のコメントアウトを削除して有効化ください。
		 */

		//$args = array(
		//	'prev_text'          => 'PREV &raquo;',
		//	'next_text'          => '&laquo; NEXT',
		//	'screen_reader_text' => 'ページナビゲーション',
		//);

		//the_posts_navigation( $args );
	?>

	<?php
		/**
		 * ページネーション the_posts_pagination() を使う場合はコメントアウトを削除して有効化ください。
		 */

		//$args = array(
		//	'prev_text'          => '&laquo; NEXT',
		//	'next_text'          => 'PREV &raquo;',
		//	'mid_size'			 => 1,
		//	'show_all'			 => false,
		//	'screen_reader_text' => 'ページナビゲーション',
		//);

		//the_posts_pagination( $args );
	?>

</div><!-- /#main -->
<!-- / index.php -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>