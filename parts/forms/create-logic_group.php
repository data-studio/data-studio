<?php

  if ('create-logic_group' === $_REQUEST['form-id']) {
    DataStudioCmd::createLogicGroup(
      $_REQUEST['LogicGroupAppID'],
      $_REQUEST['LogicGroupName']
    );
  }

?>
<div id="CreateLogicGroupForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="LogicGroupName">
      Name
    </label>

    <span class="spacer"></span>

    <input id="LogicGroupName"
      name="LogicGroupName"
      placeholder="E.g. Todo"
      value=""
      required>
  </div>

  <button id="CreateLogicGroup">
    Create Logic Group
  </button>
  <input name="form-id"
    type="hidden"
    value="create-logic_group">
</div>
