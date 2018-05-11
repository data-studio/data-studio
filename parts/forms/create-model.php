<?php

  if ('create-model' === $_REQUEST['form-id']) {
    DataStudioCmd::createModel(
      $_REQUEST['ModelLogicGroupID'],
      $_REQUEST['ModelName']
    );
  }

?>
<div id="CreateModelForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="ModelName">
      Name
    </label>

    <span class="spacer"></span>

    <input id="ModelName"
      name="ModelName"
      placeholder="E.g. ListItem"
      value=""
      required>
  </div>

  <button id="CreateModel">
    Create Model
  </button>
  <input name="form-id"
    type="hidden"
    value="create-model">
</div>
