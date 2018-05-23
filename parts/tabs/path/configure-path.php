<form>
  <h2>General</h2>
  <div id="ConfigurePathForm"
    class="datastudio datastudio-options">
    <div class="form-field">
      <label for="PathAuthor">
        Author
      </label>

      <span class="spacer"></span>

      <span>
        <?php echo get_the_author_meta( 'user_nicename' ); ?>
        &lt;<?php echo get_the_author_meta( 'user_email' ); ?>&gt;
      </span>
    </div>
    <!-- <div class="form-field">
      <label for="PathID">
        Path ID
      </label>

      <span class="spacer"></span>

      <span>
        <?php the_ID(); ?>
      </span>
    </div> -->
    <div class="form-field">
      <label for="PathUri">
        Path URI
      </label>

      <span class="spacer"></span>

      <span>
        <?php echo get_field( 'path_uri', get_the_ID() ); ?>
      </span>
    </div>
  </div>

  <h2>Sharing</h2>
  <div id="ConfigurePathSharingForm"
    class="datastudio datastudio-options">
    <div class="form-field">
      <label for="AppPermalink">
        Permalink
      </label>

      <span class="spacer"></span>

      <a href="<?php the_permalink(); ?>"
        title="<?php echo get_field( 'web_service_name', get_the_ID() ); ?>">
        /path/<?php echo substr( get_the_title(), 0, 9 ); ?>...<!-- <?php echo substr( get_the_title(), -3, 3 ); ?> -->
      </a>
    </div>
    <div class="form-field">
      <label for="PathVisibility">
        Visibility
      </label>

      <span class="spacer"></span>

      <select id="PathVisibility"
        name="PathVisibility">
        <option value="public">Public</option>
        <option value="private">Private (hidden)</option>
      </select>
    </div>
    <div class="form-field">
      <label for="PathComments">
        Discussion
      </label>

      <span class="spacer"></span>

      <select id="PathComments"
        name="PathComments">
        <option value="open">Open</option>
        <option value="closed">Closed</option>
      </select>
    </div>
  </div>
</form>
