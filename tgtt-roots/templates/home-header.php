<div class="page-header">
	<?php
		// the query
		$podcast = get_category_by_slug('podcast')->term_id;
		$args = array(
			'posts_per_page' => 1,
			'category__in' => array($podcast)
			);
		$the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>
			<div class="wrap container" role="document">
    			<div class="content">
					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<article id="recent-podcast">
				            <h1 id="title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
				            <p id="excerpt"><?php the_excerpt();?></p>

				            <?php 
				            	if(sizeof(get_post_custom_values('podcast_url'))>1){
					            	$podcast_url = get_post_custom_values('podcast_url')[0];
					        	}
					        ?>
					        <?php if($podcast_url!=''):?>
				            	<audio src="<?php echo $podcast_url;?>" preload="auto" controls></audio>
				        	<?php endif;?>
						</article>
					<?php endwhile; ?>
					<!-- end of the loop -->
				</div>
			</div>
		<?php endif; ?>
	<?php wp_reset_postdata(); ?>


</div>