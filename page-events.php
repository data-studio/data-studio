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

      <h1>Event Log &gt; <?php the_title(); ?></h1>

      <!-- <button id="LogEvent">
        New Event
      </button> -->

      <h2>Create Event</h2>

      <form>
        <?php get_template_part( 'parts/forms/create-event' ); ?>
      </form>

      <h2>Events</h2>

      <?php
      $events = EventLogQuery::getEvents();
      $days = array();
      ?>

      <?php if ($events->have_posts()) : ?>
      <div class="content-cards">
        <ul class="cards">
        <?php while ($events->have_posts()) : ?>
          <?php $events->the_post(); ?>
            <?php if ( !in_array( get_the_time('l, M j'), $days ) ) : ?>
            <?php $days[count($days)] = get_the_time('l, M j'); ?>
            <li class="card-group-heading">
              <h3>
                <span><?php the_time('l, M j'); ?></span>
              </h3>
            </li>
            <?php endif; ?>
            <?php get_template_part( 'parts/lists/event-list-item'); ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
        <div class="events-loading"
          style="display: flex;flex-direction: row;height:120px;align-items:center;">
          <span class="spacer"></span>
          <div class="progress-view-wrapper">
            <div class="progress-indicator"></div>
          </div>
          <span class="spacer"></span>
        </div>
      </div>
      <?php else : ?>
      <p>You haven't logged any events, yet.</p>
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

  <script>
  (function ($) {"use strict";

    var busy = false;
    var finished = false;

    var offset = 0;

    var documentHeight = 0;

    refreshDocumentHeight();
    initFeed();

    $(document).ready(function () {

    });

    $(document).load(function () {
      refreshDocumentHeight();
    });

    function isBusy () {
      return true === busy;
    }

    function setBusy ( newValue ) {
      busy = true === newValue ? true : false;
    }

    function isFinished () {
      return true === finished;
    }

    function setFinished ( newValue ) {
      finished = true === newValue ? true : false;
      if (false === finished) {
        return;
      }
      $("div.content-cards div.events-loading").hide();
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
        var x = getDocumentHeight() - 200;

        var needsMore = c > x;
        if (!needsMore) {
          setBusy(false);
          return;
        }

        feed();
      });
    }

    function feed () {
      refreshOffset();

      var req = $.get(
        '/wp-admin/admin-ajax.php?action=eviratec_eventlog'
        + '&type=getEvents'
        + '&offset=' + offset
      );

      req.success(function (res) {
        var $newEls = $(res);
        if (0 === $newEls.length || '' === res.trim()) {
          setFinished( true );
          return;
        }
        $newEls.appendTo($("div.content-cards ul.cards"));
        refreshDocumentHeight();
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

    function refreshDocumentHeight () {
      documentHeight = $(document).height();
      console.log(documentHeight);
    }

    function getDocumentHeight () {
      return documentHeight;
    }

  })(jQuery);
  </script>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
