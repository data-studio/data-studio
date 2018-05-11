<li class="card command-list-item">
  <a class="card-content"
    href="/command/<?php the_ID(); ?>/"
    title="<?php the_title(); ?>">
    <!-- <div class="icon-container">
      <span class="material-icons">
        info_outline
      </span>
    </div> -->
    <div class="command-date">
      <div class="day">
        <?php the_time('D j'); ?>
      </div>
      <div class="time">
        <?php the_time('g:ia'); ?>
      </div>
    </div>
    <div class="card-text">
      <h3>
        <span><?php echo get_field( 'command_name', get_the_ID() ); ?></span>
      </h3>
      <p>
        Command
      </p>
    </div>
    <span class="spacer"></span>
    <span class="command-type">
      Type
    </span>
    <span class="material-icons">
      chevron_right
    </span>
  </a>
</li>
