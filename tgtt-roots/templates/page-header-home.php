<div class="page-header">
	<?php
		// the query

		$podcast = get_category_by_slug('podcast')->term_id;
		$blog = get_category_by_slug('blog')->term_id;

		$args = array(
			'posts_per_page' => 1,
			'category__in' => array($podcast)
		);

		$latest_podcast = new WP_Query( $args );

		$args = array(
			'posts_per_page' => 1,
			'category__in' => array($blog)
		);

		$latest_blog = new WP_Query( $args );
	?>
	<?php if ( $latest_podcast->have_posts() || $latest_blog->have_posts() ) : ?>

		<?php
			if ( $latest_blog->have_posts() && !$latest_podcast->have_posts() ) {
				$latest_post = $latest_blog;
			} elseif ( $latest_podcast->have_posts() ) {
				$latest_post = $latest_podcast;
			} 
		?>

		<!-- the loop -->
		<?php while ( $latest_blog->have_posts() ) : $latest_blog->the_post(); ?>
			<?php 
				$post_id = $post->ID;
				$key = "background_color";
				$single = true;
				$custom_bg = get_post_meta($post_id, $key, $single); 
				if ($custom_bg == ''){
					$custom_bg = 'default';
				}
				$feat_image_bg = '';
			?>
			<?php if(has_post_thumbnail()): ?>
				<?php
					$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					$feat_image_bg='background-image:url('.$feat_image_url.');';
				?>
			<?php endif;?>
			
			<article id="recent-blog" class="recent <?php echo $custom_bg; ?>">
				<div class="container">
					<h2 class="title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
					<section class="lead">
						<?php the_excerpt();?>
					</section>
					<?php
						//$content = str_replace(strip_shortcodes(get_the_content()),"",get_the_content());
						$pattern = get_shortcode_regex();
						preg_match('/'.$pattern.'/s', $post->post_content, $matches);
						if (is_array($matches) && $matches[2] == 'audio') {
							$shortcode = $matches[0];
							echo do_shortcode($shortcode);
						}
					?>
				</div>
			</article>
		<?php endwhile; ?>
		<!-- end of the loop -->


		<!-- the loop -->
		<?php while ( $latest_podcast->have_posts() ) : $latest_podcast->the_post(); ?>
			<?php 
				$post_id = $post->ID;
				$key = "background_color";
				$single = true;
				$custom_bg = get_post_meta($post_id, $key, $single); 
				$feat_image_bg = '';
			?>
			<?php if(has_post_thumbnail()): ?>
				<?php
					$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					$feat_image_bg='background-image:url('.$feat_image_url.');';
				?>
			<?php endif;?>

			<article id="recent-podcast" class="recent <?php echo $custom_bg; ?>" style="<?php echo $feat_image_bg?>">
				<div class="container">
					<h2 class="title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
					<section class="lead">
						<?php the_excerpt();?>
					</section>
					<?php
						//$content = str_replace(strip_shortcodes(get_the_content()),"",get_the_content());
						$pattern = get_shortcode_regex();
						preg_match('/'.$pattern.'/s', $post->post_content, $matches);
						if (is_array($matches) && $matches[2] == 'audio') {
							$shortcode = $matches[0];
							echo do_shortcode($shortcode);
						}
					?>
				</div>
			</article>
		<?php endwhile; ?>
		<!-- end of the loop -->


	<?php endif; ?>

	<?php wp_reset_postdata(); ?>


</div>