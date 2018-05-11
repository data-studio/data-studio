<li class="card attribute-list-item">
  <a class="card-content"
    href="/attribute/<?php the_ID(); ?>/"
    title="<?php the_title(); ?>">
    <!-- <div class="icon-container">
      <span class="material-icons">
        info_outline
      </span>
    </div> -->
    <div class="attribute-date">
      <div class="day">
        <?php the_time('D j'); ?>
      </div>
      <div class="time">
        <?php the_time('g:ia'); ?>
      </div>
    </div>
    <div class="card-text">
      <h3>
        <span><?php echo get_field( 'attribute_name', get_the_ID() ); ?></span>
      </h3>
      <p>
        Attribute
      </p>
    </div>
    <span class="spacer"></span>
    <span class="attribute-type">
      Type
    </span>
    <span class="material-icons">
      chevron_right
    </span>
  </a>
</li>
