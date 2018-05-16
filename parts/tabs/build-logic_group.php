<form>
  <h2>Build Logic Group</h2>
  <div id="BuildLogicGroupForm"
    class="eviratec-web eviratec-form">
    <div class="form-field">
      <label for="BuildLogicGroupAs">
        Build as ...
      </label>

      <span class="spacer"></span>

      <select name="BuildLogicGroupAs">
        <?php $options = getBuildOptions( 'logic_group' ); ?>
        <?php foreach ( $options as $opt => $label ) : ?>
          <option value="<?php echo $opt; ?>"><?php echo $label; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <button id="BuildLogicGroup">
      Build Logic Group
    </button>
    <input name="form-id"
      type="hidden"
      value="build-logic_group">
  </div>
</form>
