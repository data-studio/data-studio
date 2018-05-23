<?php

  if ('create-path' === $_REQUEST['form-id']) {
    DataStudioCmd::createPath(
      $_REQUEST['PathWebServiceID'],
      $_REQUEST['PathUri']
    );
  }

?>
<div id="CreatePathForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="PathUri">
      URI
    </label>

    <span class="spacer"></span>

    <input id="PathUri"
      name="PathUri"
      placeholder="E.g. /object/{object_id}"
      value=""
      required>
  </div>

  <button id="CreatePath">
    Create Path
  </button>
  <input name="form-id"
    type="hidden"
    value="create-path">
</div>
