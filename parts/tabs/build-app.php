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

    <button id="BuildApp">
      Build App
    </button>
    <input name="form-id"
      type="hidden"
      value="build-app">
  </div>
</form>
