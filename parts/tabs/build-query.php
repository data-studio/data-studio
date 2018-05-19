<form>
  <h2>Build Query</h2>
  <div id="BuildQueryForm"
    class="eviratec-web eviratec-form">
    <div class="form-field">
      <label for="BuildQueryAs">
        Build as ...
      </label>

      <span class="spacer"></span>

      <select name="BuildQueryAs">
        <?php $options = getBuildOptions( 'query' ); ?>
        <?php foreach ( $options as $opt => $label ) : ?>
          <option value="<?php echo $opt; ?>"><?php echo $label; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <button id="BuildQuery">
      Build Query
    </button>
    <input name="form-id"
      type="hidden"
      value="build-query">
  </div>
</form>
