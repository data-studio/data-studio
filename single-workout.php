<?php get_header(); ?>

  <main role="main">
    <!-- section -->
    <section>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <h1><a href="/workouts/">Workouts</a> &gt; <?php the_title(); ?></h1>

    <p style="margin-top: -12px;margin-left: 12px;">
      <span class="date"
        style="display:flex;align-items:center;color:rgba(0,0,0,0.38);">
        <span class="material-icons"
          style="font-size: 16px;">
          event
        </span>
        <span style="font-weight: 400;margin-left: 4px;">
          <?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?>
        </span>
      </span>
    </p>

    <!-- <button id="CreateWorkout">
      New Workout
    </button> -->

    <h2>Create Exercise</h2>

    <form>
      <?php get_template_part( 'parts/forms/create-exercise' ); ?>
      <input name="ExerciseWorkoutID"
        type="hidden"
        value="<?php the_ID(); ?>">
    </form>

    <?php
    $workout_id = get_the_ID();
    $exercises = FitnessQuery::getExercisesByWorkout( $workout_id );
    ?>

    <h2>Exercises</h2>

    <?php if ($exercises->have_posts()) : ?>
    <div class="content-cards">
      <ul class="cards">
      <?php while ($exercises->have_posts()) : ?>
        <?php $exercises->the_post(); ?>
          <li class="card">
            <a class="card-content"
              href="/exercise/<?php the_ID(); ?>/"
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
    <p>You haven't added any exercises to this workout.</p>
    <?php endif; ?>

    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <!-- post thumbnail -->
      <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_post_thumbnail(); // Fullsize image for the single post ?>
        </a>
      <?php endif; ?>
      <!-- /post thumbnail -->

      <!-- post title -->
      <!-- <h1>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Workout &gt; <?php the_title(); ?></a>
      </h1> -->
      <!-- /post title -->

      <!-- post details -->
      <!-- <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
      <span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
      <span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span> -->
      <!-- /post details -->

      <?php //the_content(); // Dynamic Content ?>

      <?php //the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

      <!-- <p><?php //_e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p> -->

      <!-- <p><?php //_e( 'This post was written by ', 'html5blank' ); the_author(); ?></p> -->

      <h2>Comments</h2>

      <?php comments_template(); ?>

    </article>
    <!-- /article -->

  <?php endwhile; ?>

  <?php else: ?>

    <!-- article -->
    <article>

      <h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

    </article>
    <!-- /article -->

  <?php endif; ?>

  </section>
  <!-- /section -->
  </main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
