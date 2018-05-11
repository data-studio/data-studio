<?php get_header(); ?>

  <main role="main">
    <!-- section -->
    <section>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <h1>App &gt; <?php echo get_field( 'app_name', get_the_ID() ); ?></h1>

    <h2>Create Logic Group</h2>

    <form>
      <?php get_template_part( 'parts/forms/create-logic_group' ); ?>
      <input name="LogicGroupAppID"
        type="hidden"
        value="<?php the_ID(); ?>">
    </form>

    <?php
    $app_id = get_the_ID();
    $logic_groups = DataStudioQuery::getLogicGroupsByApp( $app_id );
    ?>

    <h2>Logic Groups</h2>

    <?php if ($logic_groups->have_posts()) : ?>
    <div class="content-cards">
      <ul class="cards">
      <?php while ($logic_groups->have_posts()) : ?>
        <?php $logic_groups->the_post(); ?>
        <?php get_template_part( 'parts/lists/logic_group-list-item'); ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      </ul>
      <div class="logic-groups-loading"
        style="display: flex;flex-direction: row;height:120px;align-items:center;">
        <span class="spacer"></span>
        <div class="progress-view-wrapper">
          <div class="progress-indicator"></div>
        </div>
        <span class="spacer"></span>
      </div>
    </div>
    <?php else : ?>
    <p>You haven't added any logic groups to this app.</p>
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
      $("div.content-cards div.logic-groups-loading").hide();
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
        '/wp-admin/admin-ajax.php?action=data_studio'
        + '&type=getLogicGroupsByApp'
        + '&app_id=' + <?php the_ID(); ?>
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
