<li class="card operation-list-item">
  <a class="card-content"
    href="<?php the_permalink( get_the_ID() ); ?>"
    title="<?php echo get_field( 'operation_name', get_the_ID() ); ?>">
    <div class="icon-container">
      <?php echo get_field( 'operation_type', get_the_ID() ); ?>
    </div>
    <div class="card-text">
      <h3>
        <span><?php echo get_field( 'operation_name', get_the_ID() ); ?></span>
      </h3>
    </div>
    <span class="spacer"></span>
    <span class="material-icons">
      chevron_right
    </span>
  </a>
</li>
