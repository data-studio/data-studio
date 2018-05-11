<?php

  if ('create-event' === $_REQUEST['form-id']) {
    EventLogCmd::createEvent(
      $_REQUEST['EventSummary'],
      json_decode( $_REQUEST['EventTags'] )
    );
  }

?>
<div id="CreateEventForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="EventSummary">
      Summary
    </label>

    <span class="spacer"></span>

    <input id="EventSummary"
      name="EventSummary"
      placeholder="E.g. Went to Walmart"
      value=""
      required>
  </div>

  <div class="form-field">
    <label for="EventTags">
      Tags (optional)
    </label>

    <span class="spacer"></span>

    <input id="EventTags"
      name="EventTags"
      placeholder="E.g. shopping, walmart"
      value="">
  </div>

  <button id="CreateEvent">
    Create Event
  </button>
  <input name="form-id"
    type="hidden"
    value="create-event">
</div>
