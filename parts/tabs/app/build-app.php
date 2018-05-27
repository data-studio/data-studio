<form>
  <h2>Build App</h2>
  <div id="BuildAppForm"
    class="eviratec-web eviratec-form">
    <div class="form-field">
      <label for="BuildAppAs">
        Build as ...
      </label>

      <span class="spacer"></span>

      <select id="BuildAs" name="BuildAppAs">
        <?php $options = getBuildOptions( 'app' ); ?>
        <?php foreach ( $options as $opt => $label ) : ?>
          <option value="<?php echo $opt; ?>"><?php echo $label; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <?php $build_preferences = getBuildPreferences( 'app' ); ?>
    <?php foreach ( $build_preferences as $opt => $prefs ) : ?>
      <div class="build-preferences"
        x-build-type="<?php echo $opt; ?>">
        <?php $prefs->html(); ?>
      </div>
    <?php endforeach; ?>

    <button id="BuildApp">
      Build App
    </button>
    <input name="form-id"
      type="hidden"
      value="build-app">
  </div>
</form>

<script>
(function ($) {"use strict";
  $.dsBuildPreferences({
    $selectEl: $('select#BuildAs'),
    $prefsEls: $('div.build-preferences'),
  });
})(jQuery);
</script>
