<form>
  <h2>General</h2>
  <div id="ConfigureModelForm"
    class="datastudio datastudio-options">
    <div class="form-field">
      <label for="ModelID">
        Model ID
      </label>

      <span class="spacer"></span>

      <span>
        <?php the_ID(); ?>
      </span>
    </div>
    <div class="form-field">
      <label for="ModelName">
        Model Name
      </label>

      <span class="spacer"></span>

      <span>
        <?php echo get_field( 'model_name', get_the_ID() ); ?>
      </span>
    </div>
  </div>

  <h2>Sharing</h2>
  <div id="ConfigureModelSharingForm"
    class="datastudio datastudio-options">
    <div class="form-field">
      <label for="AppPermalink">
        Permalink
      </label>

      <span class="spacer"></span>

      <a href="<?php the_permalink(); ?>"
        title="<?php echo get_field( 'model_name', get_the_ID() ); ?>">
        /model/<?php echo substr( get_the_title(), 0, 9 ); ?>...<!-- <?php echo substr( get_the_title(), -3, 3 ); ?> -->
      </a>
    </div>
    <div class="form-field">
      <label for="ModelVisibility">
        Visibility
      </label>

      <span class="spacer"></span>

      <select id="ModelVisibility"
        name="ModelVisibility">
        <option value="public">Public</option>
        <option value="private">Private (hidden)</option>
      </select>
    </div>
    <div class="form-field">
      <label for="ModelComments">
        Discussion
      </label>

      <span class="spacer"></span>

      <select id="ModelComments"
        name="ModelComments">
        <option value="open">Open</option>
        <option value="closed">Closed</option>
      </select>
    </div>
  </div>
</form>
