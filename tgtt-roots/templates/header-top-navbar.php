<header class="banner navbar navbar-inverse navbar-black-trans navbar-static-top" role="banner">
<div class="topbar hidden-xs">
    <h1 class="site-title">The Game's the Thing</h1>
    <?php get_search_form(true); ?>
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
