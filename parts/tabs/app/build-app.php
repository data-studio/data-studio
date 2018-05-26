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

    <?php $build_preferences = getBuildPreferences( 'app' ); ?>
    <?php foreach ( $build_preferences as $opt => $prefs ) : ?>
      <?php echo $opt; ?>
      <?php $prefs->html(); ?>
    <?php endforeach; ?>

    <button id="BuildApp">
      Build App
    </button>
    <input name="form-id"
      type="hidden"
      value="build-app">
  </div>
</form>
