<footer class="content-info container" role="contentinfo">
  <div class="row">
    <div class="col-lg-12">
      <?php dynamic_sidebar('sidebar-footer'); ?>
      <p class="text-muted small">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>–<?php bloginfo('description'); ?>
</p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>