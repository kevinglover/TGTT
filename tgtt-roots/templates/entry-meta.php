<div class="byline author vcard">
<!-- 	<?php echo __('By', 'roots'); ?>  -->
	<?php if(!is_author()):?>
		<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn">
			<?php 
				$id = get_the_author_meta('ID');
				$size='';
				$default='';
				$alt='';
				
				$html ='<figure class="author">';
				$html .= get_avatar( $id, $size, $default, $alt ); 
				$html .='</figure>';
				echo $html;
			?>
			<span class="published">
				<?php echo get_the_author(); ?> 
			</span>
		</a>
	<?php endif;?>
	<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php if(!is_author()):?>|<?php endif;?> <?php echo get_the_date(); ?></time>
</div> 
