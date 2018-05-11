<?php get_header(); ?>

  <main role="main">
    <!-- section -->
    <section>

      <h2>Existing users</h2>

      <div class="page-section-wrapper">
        <?php echo do_shortcode( '[wppb-login]' ); ?>
      </div>

      <h2>New users</h2>

      <div class="page-section-wrapper">
        <a href="/create-account/">Create an account</a>
      </div>

    </section>
    <!-- /section -->
  </main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
