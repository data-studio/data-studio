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

      <h1>To-Do &gt; <?php the_title(); ?></h1>

      <!-- <button id="LogEvent">
        New Event
      </button> -->

      <h2>Create List</h2>

      <form>
        <?php get_template_part( 'parts/forms/create-todo-list' ); ?>
      </form>

      <h2>Lists</h2>

      <?php
      $lists = TodoQuery::getLists();
      ?>

      <?php if ($lists->have_posts()) : ?>
      <div class="content-cards">
        <ul class="cards">
        <?php while ($lists->have_posts()) : ?>
          <?php $lists->the_post(); ?>
            <li class="card todo-list-list-item">
              <a class="card-content"
                href="/todo-list/<?php the_ID(); ?>/"
                title="<?php the_title(); ?>">
                <h3>
                  <span><?php echo get_the_title(); ?></span>
                </h3>
                <span class="spacer"></span>
                <span class="material-icons">
                  chevron_right
                </span>
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      <?php else : ?>
      <p>You haven't created any to-do lists, yet.</p>
      <?php endif; ?>

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>

      <!-- article -->
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php the_content(); ?>

        <?php comments_template( '', true ); // Remove if you don't want comments ?>

        <br class="clear">

        <?php edit_post_link(); ?>

      </article>
      <!-- /article -->

    <?php endwhile; ?>

    <?php else: ?>

      <!-- article -->
      <article>

        <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

      </article>
      <!-- /article -->

    <?php endif; ?>

    <?php



    ?>

    </section>
    <!-- /section -->
  </main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
