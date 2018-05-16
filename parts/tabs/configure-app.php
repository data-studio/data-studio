<form>
  <h2>General</h2>
  <div id="ConfigureAppForm"
    class="datastudio datastudio-options">
    <div class="form-field">
      <label for="AppID">
        App ID
      </label>

      <span class="spacer"></span>

      <span>
        <?php the_ID(); ?>
      </span>
    </div>
    <div class="form-field">
      <label for="AppName">
        App Name
      </label>

      <span class="spacer"></span>

      <span>
        <?php echo get_field( 'app_name', get_the_ID() ); ?>
      </span>
    </div>
  </div>

  <h2>Sharing</h2>
  <div id="ConfigureAppSharingForm"
    class="datastudio datastudio-options">
    <div class="form-field">
      <label for="AppPermalink">
        Permalink
      </label>

      <span class="spacer"></span>

      <a href="<?php the_permalink(); ?>"
        title="<?php echo get_field( 'app_name', get_the_ID() ); ?>">
        /app/<?php echo substr( get_the_title(), 0, 9 ); ?>...<!-- <?php echo substr( get_the_title(), -3, 3 ); ?> -->
      </a>
    </div>
    <div class="form-field">
      <label for="AppVisibility">
        Visibility
      </label>

      <span class="spacer"></span>

      <select id="AppVisibility"
        name="AppVisibility">
        <option value="public">Public</option>
        <option value="private">Private (hidden)</option>
      </select>
    </div>
    <div class="form-field">
      <label for="AppComments">
        Discussion
      </label>

      <span class="spacer"></span>

      <select id="AppComments"
        name="AppComments">
        <option value="open">Open</option>
        <option value="closed">Closed</option>
      </select>
    </div>
  </div>
</form>
