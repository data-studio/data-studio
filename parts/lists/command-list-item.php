<li class="card command-list-item">
  <a class="card-content"
    href="<?php the_permalink( get_the_ID() ); ?>"
    title="<?php echo get_field( 'command_name', get_the_ID() ); ?>">
    <div class="icon-container">
      <span class="material-icons">
        code
      </span>
    </div>
    <div class="card-text">
      <h3>
        <span><?php echo get_field( 'command_name', get_the_ID() ); ?></span>
      </h3>
      <!-- <p>
        Command
      </p> -->
    </div>
    <span class="spacer"></span>
    <span class="material-icons">
      chevron_right
    </span>
  </a>
</li>
