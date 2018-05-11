<?php

  if ('create-todo-entry' === $_REQUEST['form-id']) {
    TodoCmd::createEntry(
      $_REQUEST['EntryListID'],
      $_REQUEST['EntrySummary']
    );
  }

?>
<div id="CreateTodoEntryForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="EntrySummary">
      Summary
    </label>

    <span class="spacer"></span>

    <input id="EntrySummary"
      name="EntrySummary"
      placeholder="E.g. Clean Kitchen"
      value=""
      required>
  </div>

  <button id="CreateTodoEntry">
    Create Task
  </button>
  <input name="form-id"
    type="hidden"
    value="create-todo-entry">
</div>
