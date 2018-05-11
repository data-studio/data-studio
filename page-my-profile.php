<?php

if ( !is_user_logged_in() ) {
  wp_redirect( "/login" );
  exit;
}

get_header();

?>

  <main role="main">
    <!-- section -->
    <section>

      <h1>My Profile</h1>

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
      <div class="page-section-wrapper">
        <?php the_content(); ?>
      </div>
      <?php endwhile; endif; ?>

    </section>
    <!-- /section -->
  </main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
