<header class="banner navbar navbar-inverse navbar-black-trans navbar-static-top" role="banner">
<div class="container topbar">
  <div class="col-xs-12 col-sm-5 col-sm-offset-2 col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
    <h1 class="site-title"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
  </div>
  <div class="hidden-xs col-sm-4 col-sm-offset-1 col-md-3 col-md-offset-0 col-lg-3 col-lg-offset-1">
    <?php get_search_form(true); ?>
  </div>
</div>

  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>/"><img src="<?php echo get_theme_mod('tgtt_logo'); ?>" alt="<?php bloginfo('name'); ?>"/></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
      <div class="visible-xs">
        <?php get_search_form(true); ?>
      </div>
    </nav>
  </div>
</header>