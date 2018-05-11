<li class="card transaction-list-item">
  <a class="card-content"
    href="/event/<?php the_ID(); ?>/"
    title="<?php the_title(); ?>">
    <!-- <div class="icon-container">
      <span class="material-icons">
        info_outline
      </span>
    </div> -->
    <div class="transaction-date">
      <div class="day">
        <?php the_time('D j'); ?>
      </div>
      <div class="time">
        <?php the_time('g:ia'); ?>
      </div>
    </div>
    <div class="card-text">
      <h3>
        <span><?php echo get_the_title(); ?></span>
      </h3>
      <p>
        <?php if ( 'DR' === get_field( 'transaction_type', get_the_ID() ) ) : ?>
          DEBIT
        <?php elseif ( 'CR' === get_field( 'transaction_type', get_the_ID() ) ) : ?>
          CREDIT
        <?php endif; ?>
      </p>
    </div>
    <span class="spacer"></span>
    <span class="transaction-type">
      <?php if ( 'DR' === get_field( 'transaction_type', get_the_ID() ) ) : ?>
        &#8722;
      <?php elseif ( 'CR' === get_field( 'transaction_type', get_the_ID() ) ) : ?>
        &#43;
      <?php endif; ?>
    </span>
    <div class="transaction-amt">
      <?php echo number_format( get_field( 'transaction_amt', get_the_ID() ), 2 ); ?>
    </div>
    <span class="material-icons">
      chevron_right
    </span>
  </a>
</li>
