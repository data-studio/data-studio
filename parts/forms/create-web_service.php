<?php

  if ('create-web_service' === $_REQUEST['form-id']) {
    DataStudioCmd::createWebService(
      $_REQUEST['WebServiceAppID'],
      $_REQUEST['WebServiceName']
    );
  }

?>
<div id="CreateWebServiceForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="WebServiceName">
      Name
    </label>

    <span class="spacer"></span>

    <input id="WebServiceName"
      name="WebServiceName"
      placeholder="E.g. REST API"
      value=""
      required>
  </div>

  <button id="CreateWebService">
    Create Web Service
  </button>
  <input name="form-id"
    type="hidden"
    value="create-web_service">
</div>
