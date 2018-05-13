<?php get_header(); ?>

  <main role="main">
    <!-- section -->
    <section>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <?php $back_id = (int) get_field( 'logic_group_app_id', get_the_ID() )->ID; ?>
    <div class="back-button-container">
      <a id="BackButton"
        href="<?php the_permalink( $back_id ); ?>"
        title="<?php echo get_field( 'app_name', $back_id ); ?>">
        <span class="material-icons">
          chevron_left
        </span>
        <span>
          <?php echo get_field( 'app_name', $back_id ); ?>
          App
        </span>
      </a>
    </div>

    <h1><?php echo get_field( 'logic_group_name', get_the_ID() ); ?> Logic</h1>

    <?php
    $logic_group_id = get_the_ID();
    $models = DataStudioQuery::getModelsByLogicGroup( $logic_group_id );
    ?>

    <section class="submodel">
      <header>
        <h2>Models</h2>
        <span class="spacer"></span>
        <button id="Toggle_CreateModelForm">
          <span class="material-icons">
            add
          </span>
          <span>
            Create Model
          </span>
        </button>
      </header>
      <main>
        <div class="create-form create-model-form">
          <div class="create-form-wrapper">
            <h3>Create Model</h3>

            <form>
              <?php get_template_part( 'parts/forms/create-model' ); ?>
              <input name="ModelLogicGroupID"
                type="hidden"
                value="<?php the_ID(); ?>">
            </form>
          </div>
        </div>
        <?php if ($models->have_posts()) : ?>
        <div class="content-cards">
          <ul class="cards">
          <?php while ($models->have_posts()) : ?>
            <?php $models->the_post(); ?>
            <?php get_template_part( 'parts/lists/model-list-item'); ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          </ul>
        </div>
        <?php else : ?>
        <p>You haven't added any models to this logic group.</p>
        <?php endif; ?>
      </main>
    </section>

    <script>
      (function ($) {"use strict";
        $(document).ready(function () {
          $.dsFormToggle({
            $formEl: $( 'div.create-form.create-model-form' ),
            $toggleBtnEl: $( '#Toggle_CreateModelForm' ),
          });
        });
      })(jQuery);
    </script>

    <script>
    (function ($) {"use strict";
      $.dsAjaxForm({
        type: 'createModel',
        $formEl: $('div.create-form.create-model-form form'),
        onSuccess: function (res) {
          window.location.reload();
        },
      });
    })(jQuery);
    </script>


    <?php
    $logic_group_id = get_the_ID();
    $queries = DataStudioQuery::getQueriesByLogicGroup( $logic_group_id );
    ?>

    <section class="submodel">
      <header>
        <h2>Queries</h2>
        <span class="spacer"></span>
        <button id="Toggle_CreateQueryForm">
          <span class="material-icons">
            add
          </span>
          <span>
            Create Query
          </span>
        </button>
      </header>
      <main>
        <div class="create-form create-query-form">
          <div class="create-form-wrapper">
            <h3>Create Query</h3>

            <form>
              <?php get_template_part( 'parts/forms/create-query' ); ?>
              <input name="QueryLogicGroupID"
                type="hidden"
                value="<?php the_ID(); ?>">
            </form>
          </div>
        </div>
        <?php if ($queries->have_posts()) : ?>
        <div class="content-cards">
          <ul class="cards">
          <?php while ($queries->have_posts()) : ?>
            <?php $queries->the_post(); ?>
            <?php get_template_part( 'parts/lists/query-list-item'); ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          </ul>
        </div>
        <?php else : ?>
        <p>You haven't added any queries to this logic group.</p>
        <?php endif; ?>
      </main>
    </section>

    <script>
      (function ($) {"use strict";
        $(document).ready(function () {
          $.dsFormToggle({
            $formEl: $( 'div.create-form.create-query-form' ),
            $toggleBtnEl: $( '#Toggle_CreateQueryForm' ),
          });
        });
      })(jQuery);
    </script>

    <script>
    (function ($) {"use strict";
      $.dsAjaxForm({
        type: 'createQuery',
        $formEl: $('div.create-form.create-query-form form'),
        onSuccess: function (res) {
          window.location.reload();
        },
      });
    })(jQuery);
    </script>

    <?php
    $logic_group_id = get_the_ID();
    $commands = DataStudioQuery::getCommandsByLogicGroup( $logic_group_id );
    ?>

    <section class="submodel">
      <header>
        <h2>Commands</h2>
        <span class="spacer"></span>
        <button id="Toggle_CreateCommandForm">
          <span class="material-icons">
            add
          </span>
          <span>
            Create Command
          </span>
        </button>
      </header>
      <main>
        <div class="create-form create-command-form">
          <div class="create-form-wrapper">
            <h3>Create Command</h3>

            <form>
              <?php get_template_part( 'parts/forms/create-command' ); ?>
              <input name="CommandLogicGroupID"
                type="hidden"
                value="<?php the_ID(); ?>">
            </form>
          </div>
        </div>
        <?php if ($commands->have_posts()) : ?>
        <div class="content-cards">
          <ul class="cards">
          <?php while ($commands->have_posts()) : ?>
            <?php $commands->the_post(); ?>
            <?php get_template_part( 'parts/lists/command-list-item'); ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          </ul>
        </div>
        <?php else : ?>
        <p>You haven't added any commands to this logic group.</p>
        <?php endif; ?>
      </main>
    </section>

    <script>
      (function ($) {"use strict";
        $(document).ready(function () {
          $.dsFormToggle({
            $formEl: $( 'div.create-form.create-command-form' ),
            $toggleBtnEl: $( '#Toggle_CreateCommandForm' ),
          });
        });
      })(jQuery);
    </script>

    <script>
    (function ($) {"use strict";
      $.dsAjaxForm({
        type: 'createCommand',
        $formEl: $('div.create-form.create-command-form form'),
        onSuccess: function (res) {
          window.location.reload();
        },
      });
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
