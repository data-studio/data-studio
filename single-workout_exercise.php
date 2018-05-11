<?php get_header(); ?>

  <main role="main">
    <!-- section -->
    <section>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <h1>
      <a href="/workout/<?php echo get_post_meta( get_the_ID(), 'workout_id' )[0]; ?>/"
        title="<?php echo get_the_title( get_post_meta( get_the_ID(), 'workout_id' )[0] ); ?>">
        <?php echo get_the_title( get_post_meta( get_the_ID(), 'workout_id' )[0] ); ?>
      </a>
      &gt;
      <?php the_title(); ?>
    </h1>

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

    <h2>Create Entry</h2>

    <form>
      <?php get_template_part( 'parts/forms/create-entry' ); ?>
      <input name="EntryExerciseID"
        type="hidden"
        value="<?php the_ID(); ?>">
    </form>

    <?php
    $exercise_id = get_the_ID();
    $entries = FitnessQuery::getEntriesByExercise( $exercise_id );
    ?>

    <h2>Exercises</h2>

    <?php if ($entries->have_posts()) : ?>
    <div class="content-cards">
      <ul class="cards">
      <?php while ($entries->have_posts()) : ?>
        <?php $entries->the_post(); ?>
          <li class="card">
            <a class="card-content"
              href="/entry/<?php the_ID(); ?>/"
              title="<?php the_title(); ?>">
              <div class="icon-container">
                <span class="material-icons">
                  fitness_center
                </span>
              </div>
              <div class="card-text">
                <ul class="workout exercise-entry-stats">
                  <li class="exercise-entry-stat">
                    <span class="stat-value">
                      <?php echo get_post_meta( get_the_ID(), 'entry_sets' )[0]; ?>
                    </span>
                    <span class="stat-label">
                      Sets
                    </span>
                  </li>
                  <li class="exercise-entry-stat">
                    <span class="stat-value">
                      <?php echo get_post_meta( get_the_ID(), 'entry_reps' )[0]; ?>
                    </span>
                    <span class="stat-label">
                      Reps
                    </span>
                  </li>
                  <li class="exercise-entry-stat">
                    <span class="stat-value">
                      <?php echo json_decode(get_post_meta( get_the_ID(), 'entry_weight' )[0])->Units; ?>
                    </span>
                    <span class="stat-label">
                      Weight (<?php echo json_decode(get_post_meta( get_the_ID(), 'entry_weight' )[0])->Measurement; ?>)
                    </span>
                  </li>
                </ul>
                <p>
                  Date: <?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?>
                </p>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </ul>
    </div>
    <?php else : ?>
    <p>You haven't added any entries for this exercise.</p>
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
