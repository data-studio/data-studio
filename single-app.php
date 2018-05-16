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

    <?php
    $app_id = get_the_ID();
    $logic_groups = DataStudioQuery::getLogicGroupsByApp( $app_id );
    ?>

    <div id="AppNavigation"
      class="navigation-tabs-wrapper">
      <ul class="navigation-tabs">
        <li class="navigation-tab">
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
        <li class="navigation-tab">
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
        <li class="navigation-tab">
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
        <li class="navigation-tab">
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

    <section class="submodel">
      <header>
        <h2>Logic Groups</h2>
        <span class="spacer"></span>
        <button id="Toggle_CreateLogicGroupForm">
          <span class="material-icons">
            add
          </span>
          <span>
            Create Logic Group
          </span>
        </button>
      </header>
      <main>
        <div class="create-form create-logic_group-form">
          <div class="create-form-wrapper">
            <h3>Create Logic Group</h3>

            <form>
              <?php get_template_part( 'parts/forms/create-logic_group' ); ?>
              <input name="LogicGroupAppID"
                type="hidden"
                value="<?php the_ID(); ?>">
            </form>
          </div>
        </div>
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
      </main>
    </section>

    <script>
      (function ($) {"use strict";
        $(document).ready(function () {
          $.dsFormToggle({
            $formEl: $( 'div.create-form.create-logic_group-form' ),
            $toggleBtnEl: $( '#Toggle_CreateLogicGroupForm' ),
          });
        });
      })(jQuery);
    </script>

    <script>
    (function ($) {"use strict";
      $.dsScrollFeed({
        type: 'getLogicGroupsByApp',
        args: {
          app_id: <?php the_ID(); ?>
        },
        feedItemSelector: 'li.card',
        $feedEl: $("div.content-cards ul.cards"),
        $loadingEl: $("div.content-cards div.logic-groups-loading"),
      });
    })(jQuery);
    </script>

    <script>
    (function ($) {"use strict";
      $.dsAjaxForm({
        type: 'createLogicGroup',
        $formEl: $('div.create-form.create-logic_group-form form'),
        onSuccess: function (res) {
          window.location.reload();
        },
      });
    })(jQuery);
    </script>


    <!-- <section class="submodel">
      <header>
        <h2>Clients</h2>
        <span class="spacer"></span>
        <button id="Toggle_CreateClientForm">
          <span class="material-icons">
            add
          </span>
          <span>
            Create Client
          </span>
        </button>
      </header>
      <main>

      </main>
    </section>


    <section class="submodel">
      <header>
        <h2>APIs</h2>
        <span class="spacer"></span>
        <button id="Toggle_CreateAPIForm">
          <span class="material-icons">
            add
          </span>
          <span>
            Create API
          </span>
        </button>
      </header>
      <main>

      </main>
    </section> -->

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
