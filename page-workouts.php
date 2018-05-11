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

      <h1>Fitness &gt; <?php the_title(); ?></h1>

      <!-- <button id="CreateWorkout">
        New Workout
      </button> -->

      <h2>Create Workout</h2>

      <form>
        <?php get_template_part( 'parts/forms/create-workout' ); ?>
      </form>

      <h2>Workouts</h2>

      <?php
      $workouts = FitnessQuery::getWorkouts();
      ?>

      <?php if ($workouts->have_posts()) : ?>
      <div class="content-cards">
        <ul class="cards">
        <?php while ($workouts->have_posts()) : ?>
          <?php $workouts->the_post(); ?>
            <li class="card">
              <a class="card-content"
                href="/workout/<?php the_ID(); ?>/"
                title="<?php the_title(); ?>">
                <div class="icon-container">
                  <span class="material-icons">
                    fitness_center
                  </span>
                </div>
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
      </div>
      <?php else : ?>
      <p>You haven't created any workouts, yet.</p>
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

    </section>
    <!-- /section -->
  </main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
