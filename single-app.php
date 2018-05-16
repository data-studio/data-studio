<?php get_header(); ?>

  <main role="main">
    <!-- section -->
    <section>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <?php $user_info = get_userdata( get_current_user_id() ); ?>
    <div class="back-button-container">
      <a id="BackButton"
        href="/apps"
        title="Apps">
        <span class="material-icons">
          chevron_left
        </span>
        <span>
          Apps
        </span>
      </a>
    </div>

    <h1><?php echo get_field( 'app_name', get_the_ID() ); ?></h1>

    <div id="AppNavigation"
      class="navigation-tabs-wrapper">
      <ul class="navigation-tabs">
        <li class="navigation-tab tab-design">
          <a href="#">
            <span class="spacer"></span>
            <span class="material-icons">
              category
            </span>
            <span>
              <!-- Details -->
              Design
            </span>
            <span class="spacer"></span>
          </a>
        </li>
        <li class="navigation-tab tab-discuss">
          <a href="#">
            <span class="spacer"></span>
            <span class="material-icons">
              comment
            </span>
            <span>
              Discuss
            </span>
            <span class="spacer"></span>
          </a>
        </li>
        <li class="navigation-tab tab-configure">
          <a href="#">
            <span class="spacer"></span>
            <span class="material-icons">
              settings
            </span>
            <span>
              Configure
            </span>
            <span class="spacer"></span>
          </a>
        </li>
        <li class="navigation-tab tab-build">
          <a href="#">
            <span class="spacer"></span>
            <span class="material-icons">
              build
            </span>
            <span>
              Build
            </span>
            <span class="spacer"></span>
          </a>
        </li>
      </ul>
    </div>

    <div id="AppTabbedContent"
      class="tab-contents-wrapper">
      <div class="tab-design">
        <?php get_template_part( 'parts/tabs/design-app' ); ?>
      </div>
      <div class="tab-discuss">
        <?php get_template_part( 'parts/tabs/discuss-app' ); ?>
      </div>
      <div class="tab-configure">
        <?php get_template_part( 'parts/tabs/configure-app' ); ?>
      </div>
      <div class="tab-build">
        <?php get_template_part( 'parts/tabs/build-app' ); ?>
      </div>
    </div>

    <script>
    (function ($) {"use strict";
      $.dsTabGroup({
        tabs: [
          {
            $toggleEl: $( '#AppNavigation li.tab-design' ),
            $contentEl: $( '#AppTabbedContent div.tab-design' ),
          },
          {
            $toggleEl: $( '#AppNavigation li.tab-discuss' ),
            $contentEl: $( '#AppTabbedContent div.tab-discuss' ),
          },
          {
            $toggleEl: $( '#AppNavigation li.tab-configure' ),
            $contentEl: $( '#AppTabbedContent div.tab-configure' ),
          },
          {
            $toggleEl: $( '#AppNavigation li.tab-build' ),
            $contentEl: $( '#AppTabbedContent div.tab-build' ),
          },
        ],
      })
    })(jQuery);
    </script>

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
