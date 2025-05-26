<?php
if ( have_posts() ):
	while( have_posts() ): 
		the_post();

		// Get post category/taxonomy
		$terms = wp_get_post_terms($post->ID, 'blog-category', '');

		// ID of <body> 
		$GLOBALS['bodyID'] = "";

		// Class of <body>
		$GLOBALS['bodyClass'] = "under";

		get_header();
		?>

        <main id="main">
            <div class="breadcrumb">
                <div class="inner">
                	<ul class="breadcrumb-list">
	                    <li><a href="<?php echo home_url(); ?>">HOME</a></li>
	                    <li><a href="<?php echo home_url('blog/'); ?>">Blog</a></li>

						<?php if (count($terms)) : ?>
		                    <li><a href="<?php echo home_url('blog-category/'. $taxonomy_slug .'/'); ?>"><?php echo $taxonomy_name; ?></a></li>
						<?php endif; ?>

	                    <li><?php the_title(); ?></li>
	                </ul>
                </div>
            </div>
	    	<div id="content">
	    		<div class="inner">
	    			<h3 class="center"><?php the_title(); ?></h3>
		    		<?php the_content(); ?>



		    		<!-- Next/prev post -->
		    		<section>
	                	<?php
	                	// Get previous post
						$hidePrev = "";
						$prev_url = "";
	                	$prev_post = get_previous_post(true, '', 'blog-category');
						if($prev_post) :
						   $prev_url = get_permalink($prev_post->ID);
						else:
							$hidePrev = "hidden";
						endif;

						// Get next post
						$hideNext = "";
						$next_url = "";
						$next_post = get_next_post(true, '', 'blog-category');
						if($next_post) :
						   $next_url = get_permalink($next_post->ID);
						else: 
							$hideNext = "hidden";
						endif;
	                	?>
	                	<ul class="post-related-pagination">
	                		<li class="<?php echo $hidePrev; ?>"><a href="<?php echo $prev_url; ?>">＜ 前の記事へ</a></li>
	                		<li><a href="<?php echo home_url('case/'); ?>">View More</a></li>
	                		<li class="<?php echo $hideNext; ?>"><a href="<?php echo $next_url; ?>">次の記事へ ＞</a></li>
	                	</ul>
	                </section>
	    		</div>
	    	</div>
	    </main>

        <?php
		get_footer();
		
	endwhile;
endif;
?>