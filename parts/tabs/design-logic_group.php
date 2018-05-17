<?php
$logic_group_id = get_the_ID();
$models = DataStudioQuery::getModelsByLogicGroup( $logic_group_id );
?>

<section class="submodel">
  <header>
    <h2>Models</h2>
    <span class="spacer"></span>
    <button id="Toggle_CreateModelForm">
      <span class="material-icons">
        add
      </span>
      <span>
        Create Model
      </span>
    </button>
  </header>
  <main>
    <div class="create-form create-model-form">
      <div class="create-form-wrapper">
        <h3>Create Model</h3>

        <form>
          <?php get_template_part( 'parts/forms/create-model' ); ?>
          <input name="ModelLogicGroupID"
            type="hidden"
            value="<?php the_ID(); ?>">
        </form>
      </div>
    </div>
    <?php if ($models->have_posts()) : ?>
    <div class="content-cards">
      <ul class="cards">
      <?php while ($models->have_posts()) : ?>
        <?php $models->the_post(); ?>
        <?php get_template_part( 'parts/lists/model-list-item'); ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      </ul>
    </div>
    <?php else : ?>
    <div class="no-results">
      <p>You haven't added any models to this logic group.</p>
    </div>
    <?php endif; ?>
  </main>
</section>

<script>
  (function ($) {"use strict";
    $(document).ready(function () {
      $.dsFormToggle({
        $formEl: $( 'div.create-form.create-model-form' ),
        $toggleBtnEl: $( '#Toggle_CreateModelForm' ),
      });
    });
  })(jQuery);
</script>

<script>
(function ($) {"use strict";
  $.dsAjaxForm({
    type: 'createModel',
    $formEl: $('div.create-form.create-model-form form'),
    onSuccess: function (res) {
      window.location.reload();
    },
  });
})(jQuery);
</script>


<?php
$logic_group_id = get_the_ID();
$queries = DataStudioQuery::getQueriesByLogicGroup( $logic_group_id );
?>

<section class="submodel">
  <header>
    <h2>Queries</h2>
    <span class="spacer"></span>
    <button id="Toggle_CreateQueryForm">
      <span class="material-icons">
        add
      </span>
      <span>
        Create Query
      </span>
    </button>
  </header>
  <main>
    <div class="create-form create-query-form">
      <div class="create-form-wrapper">
        <h3>Create Query</h3>

        <form>
          <?php get_template_part( 'parts/forms/create-query' ); ?>
          <input name="QueryLogicGroupID"
            type="hidden"
            value="<?php the_ID(); ?>">
        </form>
      </div>
    </div>
    <?php if ($queries->have_posts()) : ?>
    <div class="content-cards">
      <ul class="cards">
      <?php while ($queries->have_posts()) : ?>
        <?php $queries->the_post(); ?>
        <?php get_template_part( 'parts/lists/query-list-item'); ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      </ul>
    </div>
    <?php else : ?>
    <div class="no-results">
      <p>You haven't added any queries to this logic group.</p>
    </div>
    <?php endif; ?>
  </main>
</section>

<script>
  (function ($) {"use strict";
    $(document).ready(function () {
      $.dsFormToggle({
        $formEl: $( 'div.create-form.create-query-form' ),
        $toggleBtnEl: $( '#Toggle_CreateQueryForm' ),
      });
    });
  })(jQuery);
</script>

<script>
(function ($) {"use strict";
  $.dsAjaxForm({
    type: 'createQuery',
    $formEl: $('div.create-form.create-query-form form'),
    onSuccess: function (res) {
      window.location.reload();
    },
  });
})(jQuery);
</script>

<?php
$logic_group_id = get_the_ID();
$commands = DataStudioQuery::getCommandsByLogicGroup( $logic_group_id );
?>

<section class="submodel">
  <header>
    <h2>Commands</h2>
    <span class="spacer"></span>
    <button id="Toggle_CreateCommandForm">
      <span class="material-icons">
        add
      </span>
      <span>
        Create Command
      </span>
    </button>
  </header>
  <main>
    <div class="create-form create-command-form">
      <div class="create-form-wrapper">
        <h3>Create Command</h3>

        <form>
          <?php get_template_part( 'parts/forms/create-command' ); ?>
          <input name="CommandLogicGroupID"
            type="hidden"
            value="<?php the_ID(); ?>">
        </form>
      </div>
    </div>
    <?php if ($commands->have_posts()) : ?>
    <div class="content-cards">
      <ul class="cards">
      <?php while ($commands->have_posts()) : ?>
        <?php $commands->the_post(); ?>
        <?php get_template_part( 'parts/lists/command-list-item'); ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      </ul>
    </div>
    <?php else : ?>
    <div class="no-results">
      <p>You haven't added any commands to this logic group.</p>
    </div>
    <?php endif; ?>
  </main>
</section>

<script>
  (function ($) {"use strict";
    $(document).ready(function () {
      $.dsFormToggle({
        $formEl: $( 'div.create-form.create-command-form' ),
        $toggleBtnEl: $( '#Toggle_CreateCommandForm' ),
      });
    });
  })(jQuery);
</script>

<script>
(function ($) {"use strict";
  $.dsAjaxForm({
    type: 'createCommand',
    $formEl: $('div.create-form.create-command-form form'),
    onSuccess: function (res) {
      window.location.reload();
    },
  });
})(jQuery);
</script>
