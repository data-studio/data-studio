<?php
$path_id = get_the_ID();
$operations = DataStudioQuery::getOperationsByPath( $path_id );
?>

<section class="submodel">
  <header>
    <h2>Operations</h2>
    <span class="spacer"></span>
    <button id="Toggle_CreateOperationForm">
      <span class="material-icons">
        add
      </span>
      <span>
        Create Operation
      </span>
    </button>
  </header>
  <main>
    <div class="create-form create-operation-form">
      <div class="create-form-wrapper">
        <h3>Create Operation</h3>

        <form>
          <?php get_template_part( 'parts/forms/create-operation' ); ?>
          <input name="OperationPathID"
            type="hidden"
            value="<?php the_ID(); ?>">
        </form>
      </div>
    </div>
    <?php if ($operations->have_posts()) : ?>
    <div class="content-cards">
      <ul class="cards">
      <?php while ($operations->have_posts()) : ?>
        <?php $operations->the_post(); ?>
        <?php get_template_part( 'parts/lists/operation-list-item'); ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      </ul>
    </div>
    <?php else : ?>
    <div class="no-results">
      <p>You haven't added any operations to this path.</p>
    </div>
    <?php endif; ?>
  </main>
</section>

<script>
  (function ($) {"use strict";
    $(document).ready(function () {
      $.dsFormToggle({
        $formEl: $( 'div.create-form.create-operation-form' ),
        $toggleBtnEl: $( '#Toggle_CreateOperationForm' ),
      });
    });
  })(jQuery);
</script>

<script>
(function ($) {"use strict";
  $.dsAjaxForm({
    type: 'createOperation',
    $formEl: $('div.create-form.create-operation-form form'),
    onSuccess: function (res) {
      window.location.reload();
    },
  });
})(jQuery);
</script>
