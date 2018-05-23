<form>
  <h2>Build Path</h2>
  <div id="BuildPathForm"
    class="eviratec-web eviratec-form">
    <div class="form-field">
      <label for="BuildPathAs">
        Build as ...
      </label>

      <span class="spacer"></span>

      <select name="BuildPathAs">
        <?php $options = getBuildOptions( 'path' ); ?>
        <?php foreach ( $options as $opt => $label ) : ?>
          <option value="<?php echo $opt; ?>"><?php echo $label; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <button id="BuildPath">
      Build Web Service
    </button>
    <input name="form-id"
      type="hidden"
      value="build-path">
  </div>
</form>
