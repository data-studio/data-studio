<?php

  if ('create-attribute' === $_REQUEST['form-id']) {
    DataStudioCmd::createAttribute(
      $_REQUEST['AttributeModelID'],
      $_REQUEST['AttributeName']
    );
  }

?>
<div id="CreateAttributeForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="AttributeName">
      Name
    </label>

    <span class="spacer"></span>

    <input id="AttributeName"
      name="AttributeName"
      placeholder="E.g. Summary"
      value=""
      required>
  </div>

  <button id="CreateAttribute">
    Create Attribute
  </button>
  <input name="form-id"
    type="hidden"
    value="create-attribute">
</div>
