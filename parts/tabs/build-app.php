<form>
  <h2>Build App</h2>
  <div id="BuildAppForm"
    class="eviratec-web eviratec-form">
    <div class="form-field">
      <label for="BuildAppAs">
        Build as ...
      </label>

      <span class="spacer"></span>

      <select name="BuildAppAs">
        <?php $options = getBuildOptions( 'app' ); ?>
        <?php foreach ( $options as $opt => $label ) : ?>
          <option value="<?php echo $opt; ?>"><?php echo $label; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <h3>Include</h3>

    <?php
    $app_id = get_the_ID();
    $logic_groups = DataStudioQuery::getLogicGroupsByApp( $app_id );
    ?>

    <script>
    (function ($) {"use strict";
      $(document).ready(function () {
        $('li.build-list-item').each(function (i, el) {
          $(el).children('div.list-item-content').children('div.toggle-list-sub-items').click(function ($ev) {
            $(el).children( 'ul' ).toggle();
          });
          $(el).children('div.list-item-content').find('input[type=checkbox]').click(function () {
            if ($(el).children('div.list-item-content').find('input[type=checkbox]').attr('checked')) {
              $(el).children('ul').find('input[type=checkbox]').attr('checked', '');
              return;
            }
            $(el).children('ul').find('input[type=checkbox]').removeAttr('checked');
          });
        });
      });
    })(jQuery);
    </script>

    <div class="content-cards">
      <ul class="cards">
        <li class="build-list-item">
          <div class="list-item-content">
            <div class="toggle-list-sub-items">
              <span class="material-icons">
                expand_more
              </span>
            </div>
            <div>
              <input type="checkbox">
            </div>
            <div>
              Logic Groups
            </div>
          </div>
          <ul>
          <?php if ($logic_groups->have_posts()) : ?>
          <?php while ($logic_groups->have_posts()) : ?>
            <?php $logic_groups->the_post(); ?>
            <li class="build-list-item">
              <div class="list-item-content">
                <div class="toggle-list-sub-items">
                  <span class="material-icons">
                    expand_more
                  </span>
                </div>
                <div>
                  <input type="checkbox">
                </div>
                <div>
                  <?php echo get_field( 'logic_group_name', get_the_ID() ); ?>
                </div>
              </div>
              <ul>
                <li class="build-list-item">
                  <div class="list-item-content">
                    <div class="toggle-list-sub-items">
                      <span class="material-icons">
                        expand_more
                      </span>
                    </div>
                    <div>
                      <input type="checkbox">
                    </div>
                    <div>
                      Models
                    </div>
                  </div>
                  <?php
                  $logic_group_id = get_the_ID();
                  $models = DataStudioQuery::getModelsByLogicGroup( $logic_group_id );
                  ?>
                  <?php if ($models->have_posts()) : ?>
                  <ul>
                    <?php while ($models->have_posts()) : ?>
                    <?php $models->the_post(); ?>
                    <li class="build-list-item">
                      <div class="list-item-content">
                        <div class="toggle-list-sub-items">
                          <span class="material-icons">
                            expand_more
                          </span>
                        </div>
                        <div>
                          <input type="checkbox">
                        </div>
                        <div>
                          <?php echo get_field( 'model_name', get_the_ID() ); ?>
                        </div>
                      </div>
                      <?php
                      $model_id = get_the_ID();
                      $attributes = DataStudioQuery::getAttributesByModel( $model_id );
                      ?>
                      <?php if ($attributes->have_posts()) : ?>
                      <ul>
                        <?php while ($attributes->have_posts()) : ?>
                        <?php $attributes->the_post(); ?>
                        <li class="build-list-item">
                          <div class="list-item-content">
                            <div class="toggle-list-sub-items">
                              <span class="material-icons">
                                expand_more
                              </span>
                            </div>
                            <div>
                              <input type="checkbox">
                            </div>
                            <div>
                              <?php echo get_field( 'attribute_name', get_the_ID() ); ?>
                            </div>
                          </div>
                        </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                      </ul>
                      <?php endif; ?>
                    </li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
              </ul>
              <?php endif; ?>
            </ul>
          </li>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>
          </ul>
        </li>
      </ul>
    </div>

    <button id="BuildApp">
      Build App
    </button>
    <input name="form-id"
      type="hidden"
      value="build-app">
  </div>
</form>
