<?php get_header(); ?>

  <main role="main">
    <!-- section -->
    <section>
      <h1><?php the_title(); ?></h1>
      <?php global $wp_query; ?>/
      [model_logic_group_id=<?php echo $wp_query->query_vars['model_logic_group_id']; ?>]
      [command_logic_group_id=<?php echo $wp_query->query_vars['command_logic_group_id']; ?>]
      [query_logic_group_id=<?php echo $wp_query->query_vars['query_logic_group_id']; ?>]
    </section>
    <!-- /section -->
  </main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
