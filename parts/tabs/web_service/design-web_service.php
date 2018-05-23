<?php
$web_service_id = get_the_ID();
$paths = DataStudioQuery::getPathsByWebService( $web_service_id );
?>

<section class="submodel">
  <header>
    <h2>Paths</h2>
    <span class="spacer"></span>
    <button id="Toggle_CreatePathForm">
      <span class="material-icons">
        add
      </span>
      <span>
        Create Path
      </span>
    </button>
  </header>
  <main>
    <div class="create-form create-path-form">
      <div class="create-form-wrapper">
        <h3>Create Path</h3>

        <form>
          <?php get_template_part( 'parts/forms/create-path' ); ?>
          <input name="PathWebServiceID"
            type="hidden"
            value="<?php the_ID(); ?>">
        </form>
      </div>
    </div>
    <?php if ($paths->have_posts()) : ?>
    <div class="content-cards">
      <ul class="cards">
      <?php while ($paths->have_posts()) : ?>
        <?php $paths->the_post(); ?>
        <?php get_template_part( 'parts/lists/path-list-item'); ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      </ul>
    </div>
    <?php else : ?>
    <div class="no-results">
      <p>You haven't added any paths to this web service.</p>
    </div>
    <?php endif; ?>
  </main>
</section>

<script>
  (function ($) {"use strict";
    $(document).ready(function () {
      $.dsFormToggle({
        $formEl: $( 'div.create-form.create-path-form' ),
        $toggleBtnEl: $( '#Toggle_CreatePathForm' ),
      });
    });
  })(jQuery);
</script>

<script>
(function ($) {"use strict";
  $.dsAjaxForm({
    type: 'createPath',
    $formEl: $('div.create-form.create-path-form form'),
    onSuccess: function (res) {
      window.location.reload();
    },
  });
})(jQuery);
</script>

<section class="submodel">
  <header>
    <h2>Schema Definitions</h2>
    <span class="spacer"></span>
    <button id="Toggle_CreateSchemaDefinitionForm">
      <span class="material-icons">
        add
      </span>
      <span>
        Create Schema Definition
      </span>
    </button>
  </header>
  <main>
    <div class="no-results">
      <p>You haven't added any schema definitions to this web service.</p>
    </div>
  </main>
</section>
