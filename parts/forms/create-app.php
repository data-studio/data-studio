<?php

  if ('create-app' === $_REQUEST['form-id']) {
    DataStudioCmd::createApp(
      $_REQUEST['AppName']
    );
  }

?>
<div id="CreateAppForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="AppName">
      Name
    </label>

    <span class="spacer"></span>

    <input id="AppName"
      name="AppName"
      placeholder="E.g. To-Do App (v1)"
      value=""
      required>
  </div>

  <button id="CreateApp">
    Create App
  </button>
  <input name="form-id"
    type="hidden"
    value="create-app">
</div>
