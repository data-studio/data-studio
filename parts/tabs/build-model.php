<form>
  <h2>Build Model</h2>
  <div id="BuildModelForm"
    class="eviratec-web eviratec-form">
    <div class="form-field">
      <label for="BuildModelAs">
        Build as ...
      </label>

      <span class="spacer"></span>

      <select name="BuildModelAs">
        <?php $options = getBuildOptions( 'model' ); ?>
        <?php foreach ( $options as $opt => $label ) : ?>
          <option value="<?php echo $opt; ?>"><?php echo $label; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <button id="BuildModel">
      Build Model
    </button>
    <input name="form-id"
      type="hidden"
      value="build-model">
  </div>
</form>
