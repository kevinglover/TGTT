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
			<!-- the loop -->
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<?php 
					$post_id = $post->ID;
					$key = "background_color";
					$single = true;
					$custom_bg = get_post_meta($post_id, $key, $single); 
					$feat_image_bg='';
				?>
				<?php if(has_post_thumbnail()): ?>
					<?php
						$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						$feat_image_bg='background-image:url('.$feat_image_url.');';
					?>
				<div class="bg-image" style="<?php echo $feat_image_bg;?>"></div>
				<?php endif;?>

				<div class="wrap container" role="document">
					<div class="content">
						<article id="recent-podcast" class="<?php echo $custom_bg; ?>">
							
							<h1 id="title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
							<section class="lead">
								<?php the_excerpt();?>
							</p>

							<?php 
							$podcast_url = get_post_custom_values('podcast_url');
							$podcast_url = $podcast_url[0];
							?>
							<?php if($podcast_url!=''):?>
								<audio src="<?php echo $podcast_url;?>" preload="auto" controls></audio>
							<?php endif;?>
						</article>
					</div>
				</div>
			<?php endwhile; ?>
			<!-- end of the loop -->

		<?php endif; ?>
		<?php wp_reset_postdata(); ?>


	</div>