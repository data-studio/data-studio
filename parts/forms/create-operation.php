<?php

  if ('create-operation' === $_REQUEST['form-id']) {
    DataStudioCmd::createOperation(
      $_REQUEST['OperationPathID'],
      $_REQUEST['OperationName'],
      $_REQUEST['OperationType']
    );
  }

?>
<div id="CreateOperationForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="OperationName">
      Name
    </label>

    <span class="spacer"></span>

    <input id="OperationName"
      name="OperationName"
      placeholder="E.g. createObject"
      value=""
      required>
  </div>

  <div class="form-field">
    <label for="OperationType">
      Type
    </label>

    <span class="spacer"></span>

    <select id="OperationType"
      name="OperationType">
      <optgroup>HTTP/1.1</optgroup>
      <option value="GET" selected>GET</option>
      <option value="POST">POST</option>
      <option value="PUT">PUT</option>
      <option value="PATCH">PATCH</option>
      <option value="DELETE">DELETE</option>
    </select>

  </div>

  <button id="CreateOperation">
    Create Operation
  </button>
  <input name="form-id"
    type="hidden"
    value="create-operation">
</div>
