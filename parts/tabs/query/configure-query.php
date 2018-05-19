<form>
  <h2>General</h2>
  <div id="ConfigureQueryForm"
    class="datastudio datastudio-options">
    <div class="form-field">
      <label for="QueryAuthor">
        Author
      </label>

      <span class="spacer"></span>

      <span>
        <?php echo get_the_author_meta( 'user_nicename' ); ?>
        &lt;<?php echo get_the_author_meta( 'user_email' ); ?>&gt;
      </span>
    </div>
    <div class="form-field">
      <label for="QueryName">
        Query Name
      </label>

      <span class="spacer"></span>

      <span>
        <?php echo get_field( 'query_name', get_the_ID() ); ?>
      </span>
    </div>
  </div>

  <h2>Sharing</h2>
  <div id="ConfigureQuerySharingForm"
    class="datastudio datastudio-options">
    <div class="form-field">
      <label for="AppPermalink">
        Permalink
      </label>

      <span class="spacer"></span>

      <a href="<?php the_permalink(); ?>"
        title="<?php echo get_field( 'query_name', get_the_ID() ); ?>">
        /query/<?php echo substr( get_the_title(), 0, 9 ); ?>...<!-- <?php echo substr( get_the_title(), -3, 3 ); ?> -->
      </a>
    </div>
    <div class="form-field">
      <label for="QueryVisibility">
        Visibility
      </label>

      <span class="spacer"></span>

      <select id="QueryVisibility"
        name="QueryVisibility">
        <option value="public">Public</option>
        <option value="private">Private (hidden)</option>
      </select>
    </div>
    <div class="form-field">
      <label for="QueryComments">
        Discussion
      </label>

      <span class="spacer"></span>

      <select id="QueryComments"
        name="QueryComments">
        <option value="open">Open</option>
        <option value="closed">Closed</option>
      </select>
    </div>
  </div>
</form>
