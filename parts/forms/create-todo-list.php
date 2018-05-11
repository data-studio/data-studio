<?php

  if ('create-todo-list' === $_REQUEST['form-id']) {
    TodoCmd::createList(
      $_REQUEST['ListName'],
      $_REQUEST['ListParentID']
    );
  }

?>
<div id="CreateTodoListForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="ListName">
      Name
    </label>

    <span class="spacer"></span>

    <input id="ListName"
      name="ListName"
      placeholder="E.g. Chores"
      value=""
      required>
  </div>

  <button id="CreateTodoList">
    Create To-Do List
  </button>
  <input name="form-id"
    type="hidden"
    value="create-todo-list">
  <input id="ListParentID"
    name="ListParentID"
    type="hidden"
    value="0">
</div>
