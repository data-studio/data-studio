<li class="card path-list-item">
  <a class="card-content"
    href="<?php the_permalink( get_the_ID() ); ?>"
    title="<?php echo get_field( 'path_uri', get_the_ID() ); ?>">
    <!-- <div class="icon-container">
      <span class="material-icons">
        info_outline
      </span>
    </div> -->
    <div class="card-text">
      <h3>
        <span><?php echo get_field( 'path_uri', get_the_ID() ); ?></span>
      </h3>
    </div>
    <span class="spacer"></span>
    <span class="material-icons">
      chevron_right
    </span>
  </a>
</li>
