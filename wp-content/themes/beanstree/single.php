<?php
/****************************************

	single.php

*****************************************/
?>

<?php get_header(); ?>

<!-- single.php -->

<section class="l-box">
	
	<?php
		// ループ開始
		while ( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="HeadSpace"></div>
		<div class="SectionLabel">
			<h3 class="SectionLabel__text">
				<img class="SectionLabel__image" src=<?php echo get_template_directory_uri().'/images/icon_mame.png' ?> alt="">
				<?php the_category( ', ' ) ?>
			</h3>
		</div>
		<div class="Single">
			<div class="Single__sub">
				<div class="Single__head">
				    <h4><?php the_title(); ?></h4>
			    </div>
			    <div class="Single__body">
				    <p><?php the_date("Y年n月j日 l g時 i分"); ?></p>
			    </div>
			</div>
		    <div class="Single__main">

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
		    <div class="Single__foot">
				<p>投稿者 :<?php the_author(); ?></p>
			</div>
        </div>
	</div><!-- /#post -->
</section>

<section class="l-box Section">
			
	    <?php
		    // ループ終了
		    endwhile; ?>
	<div class="EntryPanel">
	    <div class="EntryPanel__sub">
	    	<h4>このカテゴリーのその他の記事</h4>
	    </div>
		<div class="EntryPanel__main">
		        <?php
			        $cat_id = null;
			        foreach( ( get_the_category() ) as $category ) { 
			          $cat_id = $category->cat_ID;
			        }
			        $args = array(
			          'category__and' =>array($cat_id),
			          'post__not_in' => array($post->ID),
			          'posts_per_page' =>-1
			        );
		    	    $posts = get_posts($args);
		    	    foreach ($posts as $post) {
		    	    	if (mb_strlen($post->post_title) > 20) {
		  		          $post->post_title = mb_substr($post->post_title, 0, 20);
		  				  $post->post_title = $post->post_title.'...';
						}
		    	    ?>
		    <div class="EntryPanel__item">
		    	<div class="EntryPanel__body2">
		    		<p>
		        		<?php echo date("Y年n月j日",  strtotime($post->post_date_gmt));//the_date("Y年n月j日 l g時 i分"); ?>
		        	</p>
		    	</div>
			    <div class="EntryPanel__body">
			    	<a href="<?php echo $post->guid;?>"><?php echo get_the_post_thumbnail($post->ID); ?></a>
			    </div>
			    <div class="EntryPanel__head1">
			    	<h6 class="EntryPanel__head2"><?php echo $post->post_title; ?></h6>
			    </div>
			</div>
		        <?php
			      }
		        ?>
		</div>
	</div>
	
	<div class="Category">
    	<div class="Category__title">
    		<h4 class="Category__title--text">カテゴリー</h4>
    	</div>
    	<?php
    	 $cat_args = array (
		  'orderby' => 'name',
		  'order'   => 'ASC'
		  );
		  /* get category */
		  $categories = get_categories($cat_args);
	    ?>
		<?php
		  foreach ($categories as $category) {
		  	$image = get_field('category-image', 'category_' . $category->term_id);
		?>
		  <div class="l-columnCate">
		  	<div class="Category__head">
		  		<h5 class="Category__head--text"><?php echo $category->name; ?></h5>
		  	</div>
	   		<div class="Category__body">
    			<a href="<?php echo site_url('/'.strval($category->taxonomy).'/'.strval($category->slug));?>">
    			<?php
    			  echo wp_get_attachment_image($image['id']);
    			?>
    			</a>
	   		</div>
	      </div>
		<?php
		  }
		?>
    </div>
</section>
<!-- /single.php -->

<?php get_footer(); ?>