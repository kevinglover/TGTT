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

      <?php while (have_posts()) : the_post(); ?>
        <div class="container">
          <article <?php post_class(); ?>>
            <header>
              <h1 class="entry-title"><?php the_title(); ?></h1>
              <?php get_template_part('templates/entry-meta'); ?>
            </header>
            <div class="entry-content">
              <?php the_content(); ?>
            </div>
            <footer>
              <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
            </footer>
            <?php //comments_template('/templates/comments.php'); ?>
          </article>
        </div>
      <?php endwhile; ?>
    </div><!-- /.main -->

    <?php if (roots_display_sidebar()) : ?>
      <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
        <?php include roots_sidebar_path(); ?>
      </aside><!-- /.sidebar -->
    <?php endif; ?>
  </div><!-- /.content -->
</div><!-- /.wrap -->



