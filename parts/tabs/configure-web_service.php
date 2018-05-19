<form>
  <h2>General</h2>
  <div id="ConfigureWebServiceForm"
    class="datastudio datastudio-options">
    <div class="form-field">
      <label for="WebServiceAuthor">
        Author
      </label>

      <span class="spacer"></span>

      <span>
        <?php echo get_the_author_meta( 'user_nicename' ); ?>
        &lt;<?php echo get_the_author_meta( 'user_email' ); ?>&gt;
      </span>
    </div>
    <!-- <div class="form-field">
      <label for="WebServiceID">
        Web Service ID
      </label>

      <span class="spacer"></span>

      <span>
        <?php the_ID(); ?>
      </span>
    </div> -->
    <div class="form-field">
      <label for="WebServiceName">
        Web Service Name
      </label>

      <span class="spacer"></span>

      <span>
        <?php echo get_field( 'web_service_name', get_the_ID() ); ?>
      </span>
    </div>
  </div>

  <h2>Sharing</h2>
  <div id="ConfigureWebServiceSharingForm"
    class="datastudio datastudio-options">
    <div class="form-field">
      <label for="AppPermalink">
        Permalink
      </label>

      <span class="spacer"></span>

      <a href="<?php the_permalink(); ?>"
        title="<?php echo get_field( 'web_service_name', get_the_ID() ); ?>">
        /web-service/<?php echo substr( get_the_title(), 0, 9 ); ?>...<!-- <?php echo substr( get_the_title(), -3, 3 ); ?> -->
      </a>
    </div>
    <div class="form-field">
      <label for="WebServiceVisibility">
        Visibility
      </label>

      <span class="spacer"></span>

      <select id="WebServiceVisibility"
        name="WebServiceVisibility">
        <option value="public">Public</option>
        <option value="private">Private (hidden)</option>
      </select>
    </div>
    <div class="form-field">
      <label for="WebServiceComments">
        Discussion
      </label>

      <span class="spacer"></span>

      <select id="WebServiceComments"
        name="WebServiceComments">
        <option value="open">Open</option>
        <option value="closed">Closed</option>
      </select>
    </div>
  </div>
</form>
