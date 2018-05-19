<form>
  <h2>Build Command</h2>
  <div id="BuildCommandForm"
    class="eviratec-web eviratec-form">
    <div class="form-field">
      <label for="BuildCommandAs">
        Build as ...
      </label>

      <span class="spacer"></span>

      <select name="BuildCommandAs">
        <?php $options = getBuildOptions( 'command' ); ?>
        <?php foreach ( $options as $opt => $label ) : ?>
          <option value="<?php echo $opt; ?>"><?php echo $label; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <button id="BuildCommand">
      Build Command
    </button>
    <input name="form-id"
      type="hidden"
      value="build-command">
  </div>
</form>
