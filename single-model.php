<?php get_header(); ?>

  <main role="main">
    <!-- section -->
    <section>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <h1>Model &gt; <?php echo get_field( 'model_name', get_the_ID() ); ?></h1>

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

    <h2>Create Attribute</h2>

    <form>
      <?php get_template_part( 'parts/forms/create-attribute' ); ?>
      <input name="AttributeModelID"
        type="hidden"
        value="<?php the_ID(); ?>">
    </form>

    <?php
    $model_id = get_the_ID();
    $attributes = DataStudioQuery::getAttributesByModel( $model_id );
    $days = array();
    ?>

    <h2>Attributes</h2>

    <?php if ($attributes->have_posts()) : ?>
    <div class="content-cards">
      <ul class="cards">
      <?php while ($attributes->have_posts()) : ?>
        <?php $attributes->the_post(); ?>
          <?php if ( !in_array( get_the_time('M Y'), $days ) ) : ?>
          <?php $days[count($days)] = get_the_time('M Y'); ?>
          <li class="card-group-heading">
            <h3>
              <span><?php the_time('M Y'); ?></span>
            </h3>
          </li>
          <?php endif; ?>
          <?php get_template_part( 'parts/lists/attribute-list-item'); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </ul>
      <div class="models-loading"
        style="display: flex;flex-direction: row;height:120px;align-items:center;">
        <span class="spacer"></span>
        <div class="progress-view-wrapper">
          <div class="progress-indicator"></div>
        </div>
        <span class="spacer"></span>
      </div>
    </div>
    </div>
    <?php else : ?>
    <p>You haven't added any attributes to this model.</p>
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

  <script>
  (function ($) {"use strict";

    var busy = false;
    var finished = false;

    var offset = 0;
    var lastScrollMax = 0;

    $(document).ready(function () {
      initFeed();
    });

    function isBusy () {
      return true === busy;
    }

    function setBusy ( newValue ) {
      busy = true === newValue ? true : false;
    }

    function isFinished () {
      $("div.content-cards div.models-loading").hide();
      return true === finished;
    }

    function setFinished ( newValue ) {
      finished = true === newValue ? true : false;
    }

    function initFeed () {
      $(window).scroll(function () {
        if (isBusy() || isFinished()) {
          return;
        }

        setBusy(true);

        var a = $(window)[0].scrollY;
        var b = $(window)[0].innerHeight;
        var c = a+b;
        var x = $("div.content-cards ul.cards").height();

        var needsMore = c > lastScrollMax && c > x;
        if (needsMore) {
          feed();
          console.log($(window), a, b, c, x);
        }

        lastScrollMax = c;
      });
    }

    function feed () {
      refreshOffset();

      var req = $.get(
        '/wp-admin/admin-ajax.php?action=eviratec_money'
        + '&type=getAttributesByModel'
        + '&model_id=' + <?php the_ID(); ?>
        + '&offset=' + offset
      );

      req.success(function (res) {
        console.log(arguments);
        var $newEls = $(res);
        if (0 === $newEls.length || '' === res.trim()) {
          isFinished();
          return;
        }
        $newEls.appendTo($("div.content-cards ul.cards"));
      });

      req.error(function () {
        console.log(arguments);
      });

      req.always(function () {
        setBusy(false);
      });
    }

    function refreshOffset () {
      offset = $("div.content-cards ul.cards li.card").length;
    }

  })(jQuery);
  </script>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
