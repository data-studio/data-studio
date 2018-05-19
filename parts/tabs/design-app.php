<?php
$app_id = get_the_ID();
$logic_groups = DataStudioQuery::getLogicGroupsByApp( $app_id );
?>

<section class="submodel">
  <header>
    <h2>Logic Groups</h2>
    <span class="spacer"></span>
    <button id="Toggle_CreateLogicGroupForm">
      <span class="material-icons">
        add
      </span>
      <span>
        Create Logic Group
      </span>
    </button>
  </header>
  <main>
    <div class="create-form create-logic_group-form">
      <div class="create-form-wrapper">
        <h3>Create Logic Group</h3>

        <form>
          <?php get_template_part( 'parts/forms/create-logic_group' ); ?>
          <input name="LogicGroupAppID"
            type="hidden"
            value="<?php the_ID(); ?>">
        </form>
      </div>
    </div>
    <?php if ($logic_groups->have_posts()) : ?>
    <div class="content-cards">
      <ul class="cards">
      <?php while ($logic_groups->have_posts()) : ?>
        <?php $logic_groups->the_post(); ?>
        <?php get_template_part( 'parts/lists/logic_group-list-item'); ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      </ul>
      <div class="logic-groups-loading"
        style="display: flex;flex-direction: row;height:120px;align-items:center;">
        <span class="spacer"></span>
        <div class="progress-view-wrapper">
          <div class="progress-indicator"></div>
        </div>
        <span class="spacer"></span>
      </div>
    </div>
    <?php else : ?>
    <div class="no-results">
      <p>You haven't added any logic groups to this app.</p>
    </div>
    <?php endif; ?>
  </main>
</section>

<script>
  (function ($) {"use strict";
    $(document).ready(function () {
      $.dsFormToggle({
        $formEl: $( 'div.create-form.create-logic_group-form' ),
        $toggleBtnEl: $( '#Toggle_CreateLogicGroupForm' ),
      });
    });
  })(jQuery);
</script>

<script>
(function ($) {"use strict";
  $.dsScrollFeed({
    type: 'getLogicGroupsByApp',
    args: {
      app_id: <?php the_ID(); ?>
    },
    feedItemSelector: 'li.card',
    $feedEl: $("div.content-cards ul.cards"),
    $loadingEl: $("div.content-cards div.logic-groups-loading"),
  });
})(jQuery);
</script>

<script>
(function ($) {"use strict";
  $.dsAjaxForm({
    type: 'createLogicGroup',
    $formEl: $('div.create-form.create-logic_group-form form'),
    onSuccess: function (res) {
      window.location.reload();
    },
  });
})(jQuery);
</script>

<?php
$app_id = get_the_ID();
$web_services = DataStudioQuery::getWebServicesByApp( $app_id );
?>

<section class="submodel">
  <header>
    <h2>Web Services</h2>
    <span class="spacer"></span>
    <button id="Toggle_CreateWebServiceForm">
      <span class="material-icons">
        add
      </span>
      <span>
        Create Web Service
      </span>
    </button>
  </header>
  <main>
    <div class="create-form create-web_service-form">
      <div class="create-form-wrapper">
        <h3>Create Web Service</h3>

        <form>
          <?php get_template_part( 'parts/forms/create-web_service' ); ?>
          <input name="WebServiceAppID"
            type="hidden"
            value="<?php the_ID(); ?>">
        </form>
      </div>
    </div>
    <?php if ($web_services->have_posts()) : ?>
    <div class="content-cards">
      <ul class="cards">
      <?php while ($web_services->have_posts()) : ?>
        <?php $web_services->the_post(); ?>
        <?php get_template_part( 'parts/lists/web_service-list-item'); ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      </ul>
      <div class="web_services-loading"
        style="display: flex;flex-direction: row;height:120px;align-items:center;">
        <span class="spacer"></span>
        <div class="progress-view-wrapper">
          <div class="progress-indicator"></div>
        </div>
        <span class="spacer"></span>
      </div>
    </div>
    <?php else : ?>
    <div class="no-results">
      <p>You haven't added any web services to this app.</p>
    </div>
    <?php endif; ?>
  </main>
</section>

<script>
  (function ($) {"use strict";
    $(document).ready(function () {
      $.dsFormToggle({
        $formEl: $( 'div.create-form.create-web_service-form' ),
        $toggleBtnEl: $( '#Toggle_CreateWebServiceForm' ),
      });
    });
  })(jQuery);
</script>

<script>
(function ($) {"use strict";
  $.dsScrollFeed({
    type: 'getWebServicesByApp',
    args: {
      app_id: <?php the_ID(); ?>
    },
    feedItemSelector: 'li.card',
    $feedEl: $("div.content-cards ul.cards"),
    $loadingEl: $("div.content-cards div.web_services-loading"),
  });
})(jQuery);
</script>

<script>
(function ($) {"use strict";
  $.dsAjaxForm({
    type: 'createWebService',
    $formEl: $('div.create-form.create-web_service-form form'),
    onSuccess: function (res) {
      window.location.reload();
    },
  });
})(jQuery);
</script>

<!-- clients per: app, or web service? -->
<!-- <section class="submodel">
  <header>
    <h2>Clients</h2>
    <span class="spacer"></span>
    <button id="Toggle_CreateClientForm">
      <span class="material-icons">
        add
      </span>
      <span>
        Create Client
      </span>
    </button>
  </header>
  <main>

  </main>
</section> -->
