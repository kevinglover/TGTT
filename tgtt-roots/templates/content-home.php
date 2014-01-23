<div class="wrap container" role="document">
	<div class="content row">
		<?php while (have_posts()) : the_post(); ?>
			<article class="col-xs-12">
				<h2>This is the content of the page</h2>
				<?php the_content(); ?>
			</article>
		<?php endwhile; ?>

		<div class="col-sm-9" id="feed">
			<?php 
			$editor_pick_cat = get_category_by_slug( 'editor-pick' )->term_id;

		// the query
			$args = array(
				'posts_per_page' => 1,
				'category__in'=> array($editor_pick_cat)
				);

				$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>
				<div class="row">
					<header class="col-xs-12"><h2>Editor's Pick</h2></header>
					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<?php write_article();?>
					<?php endwhile; ?>
					<!-- end of the loop -->
				</div>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>

			<?php 
	// the query
			$args = array(
				'posts_per_page' => 5,
				'category__not_in'=> array($editor_pick_cat)
				);

				$the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>
					<div class="row">
						<header class="col-xs-12"><h2>Most Recent</h2></header>
						<!-- the loop -->
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php write_article();?>
						<?php endwhile; ?>
						<!-- end of the loop -->

						<?php wp_reset_postdata(); ?>

					</div>
				<?php endif; ?>

			</div><!-- #feed -->
			<aside class="col-sm-3" id="sidebar">
					<?php dynamic_sidebar( 'home-sidebar' ); ?>
			</aside>
		</div><!-- /.content -->
  </div><!-- /.wrap -->

<?php 
	function write_article()
	{
		$author_id = get_the_author_meta('ID');
		$author_name = get_the_author_meta('first_name').' '.get_the_author_meta('last_name');

		$categories = get_the_category();
		$cats='';
		$separator = ' + ';
		$output = '';
		if($categories){
			foreach($categories as $category) {
				$cats .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
			}
		$categories= ' in '. trim($cats, $separator);
		}

		$html ='';

		$html .= '<article>';
			$html .= '<section class="col-xs-12 col-sm-10">';
				$html .= '<h2><a href="'. get_permalink().'">'.get_the_title().'</a></h2>';
				$html .='<p class="excerpt">'.get_the_excerpt().'</p>';
				$html .='<p class="meta">';
				 	$html.='<span class="author"><a href="'.get_author_posts_url($author_id).'" title="Post by '.$author_name.'">'.$author_name.'</a> </span>';
				 	$html.='<span class="categories">'.$categories.'</span>';
				$html .='</p>';
			$html .='</section>';
			$html .='<figure class="col-xs-12 col-sm-2 author">';

				$id = get_the_author_meta('ID');
				$size ='';
				$default ='';
				$alt = get_the_author_meta('firstname') . ' '.get_the_author_meta('lastname');

				$html .=get_avatar( $id, $size, $default, $alt );
			$html .='</figure>';
		$html .='</article>';
		echo $html;
	}
?>