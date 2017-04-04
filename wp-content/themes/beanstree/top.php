<?php
/****************************************

	Template Name: top

*****************************************/

get_header(); ?>

<!-- ImageSlide -->

<div class="ImageSlide">
	<div class="ImageSlide__cover--main">
		<ul>
			<li><img src="<?php echo get_template_directory_uri().'/images/slide1.jpg'?>" alt=""></li>
			<li><img src="<?php echo get_template_directory_uri().'/images/slide2.jpg'?>" alt=""></li>
			<li><img src="<?php echo get_template_directory_uri().'/images/slide3.jpg'?>" alt=""></li>
		</ul>
	</div>
</div>

	
<!-- AboutPanel -->
<?php 
	$school_data = get_page_info('school');
	$community_data = get_page_info('community');
?>
<section class="l-box2 Section">
	<div class="l-row">
	    <div class="l-half">
            <div class="AboutPanel">
	            <div class="AboutPanel__head">
	        	    <h3 class="AboutPanel__head--title"><?php echo $school_data->post_title; ?></h3>
        	    </div>
        	    <div class="l-rowAbout">
        	        <div class="AboutPanel__sub">
                        <img class="AboutPanel__thumb" src=<?php echo get_template_directory_uri().'/images/about1.png'?> alt="">
                    </div>
                    <div class="AboutPanel__main">
                        <div class="AboutPanel__body">
                        	<?php echo $school_data->post_content; ?>
                        </div>
                        <div class="AboutPanel__foot">
                            <a class="button-w" href="<?php echo $school_data->guid; ?>">もっと見る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="l-half">
            <div class="AboutPanel">
        	    <div class="AboutPanel__head">
        		    <h3 class="AboutPanel__head--title"><?php echo $community_data->post_title; ?></h3>
        	    </div>
        	    <div class="l-rowAbout">
        	        <div class="AboutPanel__sub">
        		        <img class="AboutPanel__thumb" src=<?php echo get_template_directory_uri().'/images/about2.png' ?> alt="">
                    </div>
                    <div class="AboutPanel__main">
                        <div class="AboutPanel__body">
                        	<?php echo $community_data->post_content; ?>
                        </div>
                        <div class="AboutPanel__foot">
            	            <a class="button-w" href="<?php echo $community_data->guid; ?>">もっと見る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- EntryPanel -->
<section class="l-box Section">
	<div class="SectionLabel">
    	<h3 class="SectionLabel__text">
    		<img class="SectionLabel__image" src=<?php echo get_template_directory_uri().'/images/icon_mame.png' ?> alt="">
    		<span class="SectionLabel__color">まめの木</span>通信
    	</h3>
    </div>
 	<div class="EntryPanel">
    	<div class="EntryPanel__main">
		<?php
		  global $post;
		  $args = array ('posts_pre_page' => -1);
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
		        	<a href="<?php echo $post->guid;?>"><?php echo get_the_post_thumbnail($post->ID, array(170,170)); ?></a>
		        </div>
		        <div class="EntryPanel__head1">
		        	<h6 class="EntryPanel__head2"><?php echo $post->post_title;?></h6>
		        </div>
		    </div>
		  <?php 
		  } 
		  ?>
		</div>
		<div class="EntryPanel__foot">
    		<a class="button-g" href="https://colorfulbeans-kazuuuyuki.c9users.io/index/">もっと見る</a>
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
    			  echo wp_get_attachment_image($image['id'], array(150, 150));
    			?>
    			</a>
	   		</div>
	      </div>
		<?php
		  }
		?>
    </div>
</section>

<!-- EventPanel -->
<section class="l-box Section">
	<div class="EventPanel__head">
			<h3 class="SectionLabel">
				<img class="SectionLabel__image" src=<?php echo get_template_directory_uri().'/images/icon_mame.png' ?> alt="">
				みんなで遊ぶ<span class="SectionLabel__color">まめの木</span>
			</h3>
	</div>
	<div class="EventPanel">
		
			<?php
			  $args = array (
			  	'posts_pre_page' => -1,
			  	'orderby'          => 'date',
	            'order'            => 'DESC',
	            'post_type'        => 'workshops'
			  	);
			  $posts_array = get_posts( $args );
			  foreach ($posts_array as $post) {
			?>
		<div class="EventPanel__main">
			<div class="EventPanel__title">
				<h4 class="EventPanel__title--text"><?php echo $post->post_title; ?></h4>
			</div>
			<div class="EventPanel__body">
				<a href="<?php echo $post->guid;?>"><?php echo get_the_post_thumbnail($post->ID, array(1160,390)); ?></a>
			</div>
			<div class="EventPanel__foot">
				<?php
					if (mb_strlen($post->post_content) > 35) {
			  			$post->post_content = mb_substr($post->post_content, 0, 35);
			  			$post->post_content = $post->post_content.'...';
			  		}
					echo $post->post_content;
				?>
			</div>
		</div>
			<?php
			  }
			?>
		
	</div>
</section>

<!-- / index.php -->

<?php get_footer(); ?>