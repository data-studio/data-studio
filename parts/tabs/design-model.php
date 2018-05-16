<?php
$model_id = get_the_ID();
$attributes = DataStudioQuery::getAttributesByModel( $model_id );
?>

<section class="submodel">
  <header>
    <h2>Attributes</h2>
    <span class="spacer"></span>
    <button id="Toggle_CreateAttributeForm">
      <span class="material-icons">
        add
      </span>
      <span>
        Create Attribute
      </span>
    </button>
  </header>
  <main>
    <div class="create-form create-attribute-form">
      <div class="create-form-wrapper">
        <h3>Create Attribute</h3>

        <form>
          <?php get_template_part( 'parts/forms/create-attribute' ); ?>
          <input name="AttributeModelID"
            type="hidden"
            value="<?php the_ID(); ?>">
        </form>
      </div>
    </div>
    <?php if ($attributes->have_posts()) : ?>
    <div class="content-cards">
      <ul class="cards">
      <?php while ($attributes->have_posts()) : ?>
        <?php $attributes->the_post(); ?>
        <?php get_template_part( 'parts/lists/attribute-list-item'); ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      </ul>
      <div class="attributes-loading"
        style="display: flex;flex-direction: row;height:120px;align-items:center;">
        <span class="spacer"></span>
        <div class="progress-view-wrapper">
          <div class="progress-indicator"></div>
        </div>
        <span class="spacer"></span>
      </div>
    </div>
    <?php else : ?>
    <div class="content-cards">
      <ul class="cards"></ul>
    </div>
    <p>You haven't added any attributes to this model.</p>
    <?php endif; ?>
  </main>
</section>

<script>
  (function ($) {"use strict";
    $(document).ready(function () {
      $.dsFormToggle({
        $formEl: $( 'div.create-form.create-attribute-form' ),
        $toggleBtnEl: $( '#Toggle_CreateAttributeForm' ),
      });
    });
  })(jQuery);
</script>

<script>
(function ($) {"use strict";
  $.dsScrollFeed({
    type: 'getAttributesByModel',
    args: {
      model_id: <?php the_ID(); ?>
    },
    feedItemSelector: 'li.card',
    $feedEl: $('div.content-cards ul.cards'),
    $loadingEl: $('div.content-cards div.attributes-loading'),
  });
})(jQuery);
</script>

<script>
(function ($) {"use strict";
  $.dsAjaxForm({
    type: 'createAttribute',
    $formEl: $('div.create-form.create-attribute-form form'),
    onSuccess: function (res) {
      window.location.reload();
    },
  });
})(jQuery);
</script>
