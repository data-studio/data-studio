<li class="card model-list-item">
  <a class="card-content"
    href="/model/<?php the_ID(); ?>/"
    title="<?php the_title(); ?>">
    <!-- <div class="icon-container">
      <span class="material-icons">
        info_outline
      </span>
    </div> -->
    <div class="model-date">
      <div class="day">
        <?php the_time('D j'); ?>
      </div>
      <div class="time">
        <?php the_time('g:ia'); ?>
      </div>
    </div>
    <div class="card-text">
      <h3>
        <span><?php echo get_field( 'model_name', get_the_ID() ); ?></span>
      </h3>
      <p>
        Model
      </p>
    </div>
    <span class="spacer"></span>
    <span class="model-type">
      Type
    </span>
    <div class="model-amt">
      <?php echo get_field( 'model_count_attributes', get_the_ID() ); ?>
    </div>
    <span class="material-icons">
      chevron_right
    </span>
  </a>
</li>
