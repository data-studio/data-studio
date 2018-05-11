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

      <h1>Money &gt; <?php the_title(); ?></h1>

      <!-- <button id="LogEvent">
        New Event
      </button> -->

      <h2>Create Wallet</h2>

      <form>
        <?php get_template_part( 'parts/forms/create-wallet' ); ?>
      </form>

      <h2>Wallets</h2>

      <?php
      $wallets = MoneyQuery::getWallets();
      ?>

      <?php if ($wallets->have_posts()) : ?>
      <div class="content-cards">
        <ul class="cards">
        <?php while ($wallets->have_posts()) : ?>
          <?php $wallets->the_post(); ?>
            <li class="card wallet-list-item">
              <a class="card-content"
                href="/wallet/<?php the_ID(); ?>/"
                title="<?php the_title(); ?>">
                <div class="icon-container">
                  <span class="material-icons">
                    attach_money
                  </span>
                </div>
                <h3>
                  <span><?php echo get_the_title(); ?></span>
                </h3>
                <span class="spacer"></span>
                <span class="wallet-balance">
                  <?php echo str_replace( '-', '', number_format( get_field( 'wallet_balance', get_the_ID()), 2 ) ); ?>
                </span>
                <span class="wallet-balance-type">
                  <?php if ( get_field( 'wallet_balance', get_the_ID()) + 0 < 0 ) : ?>
                    DR
                  <?php else : ?>
                    CR
                  <?php endif; ?>
                </span>
                <span class="material-icons">
                  chevron_right
                </span>
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      <?php else : ?>
      <p>You haven't created any wallets, yet.</p>
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

<?php get_sidebar(); ?>

<?php get_footer(); ?>
