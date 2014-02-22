<?php if(has_post_thumbnail()):?>
<div class="featured-image">
  <?php the_post_thumbnail(); ?>
</div>
<div class="wrap container" role="document">
<?php else:?>
<div class="wrap container no-top-image" role="document">
<?php endif;?>

  <div class="content row">
    <div class="main <?php echo roots_main_class(); ?>" role="main">


          <article <?php post_class(); ?>>
            <div class="entry-content">

                <h2>List of authors:</h2>
                <ul>
                    <?php wp_list_authors('exclude_admin=0'); ?>
                </ul>

            </div>
            
          </article>

    </div><!-- /.main -->
  </div><!-- /.content -->
</div><!-- /.wrap -->



