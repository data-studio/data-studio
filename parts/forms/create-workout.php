<?php

  if ('create-workout' === $_REQUEST['form-id']) {
    FitnessCmd::createWorkout(
      $_REQUEST['WorkoutSummary']
    );
  }

?>
<div id="CreateWorkoutForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="WorkoutSummary">
      Summary
    </label>

    <span class="spacer"></span>

    <input id="WorkoutSummary"
      name="WorkoutSummary"
      placeholder="E.g. Leg Day (wk 11)"
      value=""
      required>
  </div>

  <button id="CreateWorkout">
    Create Workout
  </button>
  <input name="form-id"
    type="hidden"
    value="create-workout">
</div>
