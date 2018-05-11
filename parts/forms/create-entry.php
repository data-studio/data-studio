<?php

  if ('create-entry' === $_REQUEST['form-id']) {
    FitnessCmd::createEntry(
      $_REQUEST['EntryExerciseID'],
      $_REQUEST['EntrySets'],
      $_REQUEST['EntryReps'],
      json_encode( array(
        'Units' => $_REQUEST['EntryWeightUnits'],
        'Measurement' => $_REQUEST['EntryWeightMeasurement'],
      ) )
    );
  }

?>
<div id="CreateEntryForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="EntrySets">
      Sets
    </label>

    <span class="spacer"></span>

    <input id="EntrySets"
      name="EntrySets"
      type="number"
      placeholder="1"
      value=""
      required>
  </div>

  <div class="form-field">
    <label for="EntryReps">
      Reps
    </label>

    <span class="spacer"></span>

    <input id="EntryReps"
      name="EntryReps"
      type="number"
      placeholder="10"
      value=""
      required>
  </div>

  <div class="form-field">
    <label for="EntryWeightUnits">
      Weight (Units)
    </label>

    <span class="spacer"></span>

    <input id="EntryWeightUnits"
      name="EntryWeightUnits"
      type="number"
      placeholder="10"
      value=""
      required>
  </div>

  <div class="form-field">
    <label for="EntryWeightMeasurement">
      Weight (Measurement)
    </label>

    <span class="spacer"></span>

    <select id="EntryWeightMeasurement"
      name="EntryWeightMeasurement">
      <option value="kg">kg</option>
      <option value="lbs">lbs</option>
    </select>
  </div>

  <button id="CreateEntry">
    Create Entry
  </button>
  <input name="form-id"
    type="hidden"
    value="create-entry">
</div>
