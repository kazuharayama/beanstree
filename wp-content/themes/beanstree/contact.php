<?php
/****************************************

	Template Name: contact

	固定ページを表示するための
	テンプレートファイルです。

	まめの木ついてのリンク先

*****************************************/

get_header(); ?>

<section class="l-box">
	<div class="HeadSpace"></div>
	<div class="SectionLabel">
        <h3 class="SectionLabel__text">
        	<img class="SectionLabel__image" src=<?php echo get_template_directory_uri().'/images/icon_mame.png' ?> alt="">
        	お問い合わせ
        </h3>
    </div>
    <div id="main">
	    <?php if ( have_posts() ) : /** WordPress ループ */
	    	while ( have_posts() ) : the_post(); /** 繰り返し処理開始 */ ?>
	    			<?php the_content(); ?>
	    	<?php endwhile; /** 繰り返し処理終了 */
    	else: /** ここから記事が見つからなかった場合の処理 */ ?>
	    		<div class="post page">
	    			<h2>ページがありません</h2>
    				<p>お探しのページは見つかりませんでした。</p>
	    		</div>
	    <?php endif; /** WordPress ループここまで */ ?>
    </div>
    <div id="comments" class="comments-area">
      <?php comment_form($custum_comment_args); ?>
    </div>
</section>


<?php get_footer(); ?>