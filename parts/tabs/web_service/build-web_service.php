<form id="BuildWebService">
  <h2>Build Web Service</h2>
  <div id="BuildWebServiceForm"
    class="eviratec-web eviratec-form">
    <div class="form-field">
      <label for="BuildWebServiceAs">
        Build as ...
      </label>

      <span class="spacer"></span>

      <select id="BuildAs" name="BuildWebServiceAs">
        <?php $options = getBuildOptions( 'web_service' ); ?>
        <?php foreach ( $options as $opt => $label ) : ?>
          <option value="<?php echo $opt; ?>"><?php echo $label; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <?php $build_preferences = getBuildPreferences( 'web_service' ); ?>
    <?php foreach ( $build_preferences as $opt => $prefs ) : ?>
      <div class="build-preferences"
        x-build-type="<?php echo $opt; ?>">
        <?php $prefs->html(); ?>
      </div>
    <?php endforeach; ?>

    <button id="BuildWebService">
      Build Web Service
    </button>
    <input name="WebServiceID"
      type="hidden"
      value="<?php the_ID(); ?>">
    <input name="form-id"
      type="hidden"
      value="build-web_service">
  </div>
</form>

<pre id="SourceCode"></pre>

<script>
(function ($) {"use strict";
  $.dsBuildPreferences({
    $selectEl: $('select#BuildAs'),
    $prefsEls: $('div.build-preferences'),
  });
})(jQuery);
</script>

<script>
(function ($) {"use strict";
  $.dsBuildForm({
    type: 'WebService',
    $formEl: $('form#BuildWebService'),
    onSuccess: function ( res ) {
      $( '#BuildWebServiceForm' ).hide();
      $( 'pre#SourceCode' ).text( JSON.stringify( res, undefined, '  ' ) );
    },
  });
})(jQuery);
</script>
