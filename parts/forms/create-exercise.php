<?php

  if ('create-exercise' === $_REQUEST['form-id']) {
    $exercise_type_id = null;
    if (!$_REQUEST['ExerciseType']) {
      $exercise_type_id = FitnessCmd::createExerciseType(
        $_REQUEST['OtherExerciseType']
      );
    } else {
      $exercise_type_id = $_REQUEST['ExerciseType'];
    }
    FitnessCmd::createExercise(
      $_REQUEST['ExerciseWorkoutID'],
      $exercise_type_id
    );
  }

?>
<div id="CreateExerciseForm"
  class="eviratec-web eviratec-form">
  <div class="form-field">
    <label for="ExerciseType">
      Exercise Type
    </label>

    <span class="spacer"></span>
    <?php $exercise_types = FitnessQuery::getExerciseTypes(); ?>

    <select id="ExerciseType"
      name="ExerciseType">
      <option value="">Other</option>
      <?php if ($exercise_types->have_posts()) : ?>
        <?php while ($exercise_types->have_posts()) : ?>
          <?php $exercise_types->the_post(); ?>
          <option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </select>
  </div>

  <div class="form-field">
    <label for="OtherExerciseType">
      Exercise Type (other)
    </label>

    <span class="spacer"></span>

    <input id="OtherExerciseType"
      name="OtherExerciseType"
      placeholder="E.g. Deadlifts"
      value="">
  </div>

  <button id="CreateExercise">
    Create Exercise
  </button>
  <input name="form-id"
    type="hidden"
    value="create-exercise">
</div>
