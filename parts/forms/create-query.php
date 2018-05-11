<?php

  if ('create-query' === $_REQUEST['form-id']) {
    DataStudioCmd::createQuery(
      $_REQUEST['QueryLogicGroupID'],
      $_REQUEST['QueryName']
    );
  }

?>
<div id="CreateQueryForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="QueryName">
      Name
    </label>

    <span class="spacer"></span>

    <input id="QueryName"
      name="QueryName"
      placeholder="E.g. getListItemsByList"
      value=""
      required>
  </div>

  <button id="CreateQuery">
    Create Query
  </button>
  <input name="form-id"
    type="hidden"
    value="create-query">
</div>
