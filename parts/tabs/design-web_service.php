<?php
$logic_group_id = get_the_ID();
$models = DataStudioQuery::getModelsByLogicGroup( $logic_group_id );
?>

<section class="submodel">
  <header>
    <h2>Routes</h2>
    <span class="spacer"></span>
    <button id="Toggle_CreateRouteForm">
      <span class="material-icons">
        add
      </span>
      <span>
        Create Route
      </span>
    </button>
  </header>
  <main>

  </main>
</section>
