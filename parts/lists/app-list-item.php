<li class="card app-list-item">
  <a class="card-content"
    href="/app/<?php the_ID(); ?>/"
    title="<?php the_title(); ?>">
    <!-- <div class="icon-container">
      <span class="material-icons">
        info_outline
      </span>
    </div> -->
    <div class="app-date">
      <div class="day">
        <?php the_time('D j'); ?>
      </div>
      <div class="time">
        <?php the_time('g:ia'); ?>
      </div>
    </div>
    <div class="card-text">
      <h3>
        <span><?php echo get_field( 'app_name', get_the_ID() ); ?></span>
      </h3>
      <p>
        App
      </p>
    </div>
    <span class="spacer"></span>
    <span class="app-type">
      Type
    </span>
    <div class="app-amt">
      <?php echo get_field( 'app_count_logic_groups', get_the_ID() ); ?>
    </div>
    <span class="material-icons">
      chevron_right
    </span>
  </a>
</li>
