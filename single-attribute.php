<?php get_header(); ?>

  <main role="main">
    <!-- section -->
    <section>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <?php $back_id = (int) get_field( 'attribute_model_id', get_the_ID() )->ID; ?>
    <div class="back-button-container">
      <a id="BackButton"
        href="<?php the_permalink( $back_id ); ?>"
        title="<?php echo get_field( 'model_name', $back_id ); ?>">
        <span class="material-icons">
          chevron_left
        </span>
        <span>
          <?php echo get_field( 'model_name', $back_id ); ?>
          Model
        </span>
      </a>
    </div>

    <h1>
      <?php echo get_field( 'model_name', $back_id ); ?>
      <?php echo get_field( 'attribute_name', get_the_ID() ); ?>
      &lt;<?php echo get_field( 'model_name', $back_id ); ?>.<?php echo get_field( 'attribute_name', get_the_ID() ); ?>&gt;
    </h1>

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
