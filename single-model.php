<?php get_header(); ?>

  <main role="main">
    <!-- section -->
    <section>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <?php $back_id = (int) get_field( 'model_logic_group_id', get_the_ID() )->ID; ?>
    <div class="back-button-container">
      <a id="BackButton"
        href="<?php the_permalink( $back_id ); ?>"
        title="<?php echo get_field( 'logic_group_name', $back_id ); ?>">
        <span class="material-icons">
          chevron_left
        </span>
        <span>
          <?php echo get_field( 'logic_group_name', $back_id ); ?>
          Logic
        </span>
      </a>
    </div>

    <h1><?php echo get_field( 'model_name', get_the_ID() ); ?> Model</h1>

    <?php
    $model_id = get_the_ID();
    $attributes = DataStudioQuery::getAttributesByModel( $model_id );
    ?>
    <section class="submodel">
      <header>
        <h2>Attributes</h2>
        <span class="spacer"></span>
        <button id="Toggle_CreateAttributeForm">
          <span class="material-icons">
            add
          </span>
          <span>
            Create Attribute
          </span>
        </button>
      </header>
      <main>
        <div class="create-form create-attribute-form">
          <div class="create-form-wrapper">
            <h3>Create Attribute</h3>

            <form>
              <?php get_template_part( 'parts/forms/create-attribute' ); ?>
              <input name="AttributeModelID"
                type="hidden"
                value="<?php the_ID(); ?>">
            </form>
          </div>
        </div>
        <?php if ($attributes->have_posts()) : ?>
        <div class="content-cards">
          <ul class="cards">
          <?php while ($attributes->have_posts()) : ?>
            <?php $attributes->the_post(); ?>
            <?php get_template_part( 'parts/lists/attribute-list-item'); ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          </ul>
          <div class="attributes-loading"
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
      </main>
    </section>

    <script>
      (function ($) {"use strict";
        $(document).ready(function () {
          $.dsFormToggle({
            $formEl: $( 'div.create-form.create-attribute-form' ),
            $toggleBtnEl: $( '#Toggle_CreateAttributeForm' ),
          });
        });
      })(jQuery);
    </script>

    <script>
    (function ($) {"use strict";
      $.dsScrollFeed({
        type: 'getAttributesByModel',
        args: {
          model_id: <?php the_ID(); ?>
        },
        feedItemSelector: 'li.card',
        $feedEl: $("div.content-cards ul.cards"),
        $loadingEl: $("div.content-cards div.attributes-loading"),
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
