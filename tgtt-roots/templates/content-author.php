
 <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>

    <dl>
    	<dt>Profile</dt>
        <dd><?php echo $curauth->user_description; ?></dd>
        <dt>Website</dt>
        <dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
    </dl>

    <ul>
   <header><h2>Articles</h2></header>
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>

  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>