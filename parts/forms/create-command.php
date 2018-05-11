<?php

  if ('create-command' === $_REQUEST['form-id']) {
    DataStudioCmd::createCommand(
      $_REQUEST['CommandLogicGroupID'],
      $_REQUEST['CommandName']
    );
  }

?>
<div id="CreateCommandForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="CommandName">
      Name
    </label>

    <span class="spacer"></span>

    <input id="CommandName"
      name="CommandName"
      placeholder="E.g. createListItem"
      value=""
      required>
  </div>

  <button id="CreateCommand">
    Create Command
  </button>
  <input name="form-id"
    type="hidden"
    value="create-command">
</div>
