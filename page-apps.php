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

      <h1><?php the_title(); ?></h1>

      <!-- <button id="LogEvent">
        New Event
      </button> -->

      <h2>Create App</h2>

      <form>
        <?php get_template_part( 'parts/forms/create-app' ); ?>
      </form>

      <h2>Apps</h2>

      <?php
      $apps = DataStudioQuery::getApps();
      ?>

      <?php if ($apps->have_posts()) : ?>
      <div class="content-cards">
        <ul class="cards">
        <?php while ($apps->have_posts()) : ?>
          <?php $apps->the_post(); ?>
            <li class="card wallet-list-item">
              <a class="card-content"
                href="<?php the_permalink(); ?>"
                title="<?php the_title(); ?>">
                <div class="icon-container">
                  <span class="material-icons">
                    map
                  </span>
                </div>
                <h3>
                  <span><?php echo get_field( 'app_name', get_the_ID() ); ?></span>
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
      </div>
      <?php else : ?>
      <p>You haven't created any apps, yet.</p>
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

        <h2><?php _e( 'Sorry, nothing to display.', 'data-studio' ); ?></h2>

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
