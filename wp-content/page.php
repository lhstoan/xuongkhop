<?php
if ( have_posts() ):
	while( have_posts() ): 
		the_post();

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
	                    <li><?php echo strip_tags(get_the_title()); ?></li>
	                </ul>
                </div>
            </div>
	    	<div id="content">
	    		<div class="inner">
	    			<h3 class="center"><?php the_title(); ?></h3>
		    		<?php the_content(); ?>
	    		</div>
	    	</div>
	    </main>

        <?php
		get_footer();
		
	endwhile;
endif;
?>