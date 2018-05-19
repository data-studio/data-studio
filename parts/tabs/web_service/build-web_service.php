<form>
  <h2>Build Web Service</h2>
  <div id="BuildWebServiceForm"
    class="eviratec-web eviratec-form">
    <div class="form-field">
      <label for="BuildWebServiceAs">
        Build as ...
      </label>

      <span class="spacer"></span>

      <select name="BuildModelAs">
        <?php $options = getBuildOptions( 'web_service' ); ?>
        <?php foreach ( $options as $opt => $label ) : ?>
          <option value="<?php echo $opt; ?>"><?php echo $label; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <button id="BuildWebService">
      Build Web Service
    </button>
    <input name="form-id"
      type="hidden"
      value="build-web_service">
  </div>
</form>
