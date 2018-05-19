<form>
  <h2>General</h2>
  <div id="ConfigureLogicGroupForm"
    class="datastudio datastudio-options">
    <div class="form-field">
      <label for="LogicGroupAuthor">
        Author
      </label>

      <span class="spacer"></span>

      <span>
        <?php echo get_the_author_meta( 'user_nicename' ); ?>
        &lt;<?php echo get_the_author_meta( 'user_email' ); ?>&gt;
      </span>
    </div>
    <!-- <div class="form-field">
      <label for="LogicGroupID">
        Logic Group ID
      </label>

      <span class="spacer"></span>

      <span>
        <?php the_ID(); ?>
      </span>
    </div> -->
    <div class="form-field">
      <label for="LogicGroupName">
        Logic Group Name
      </label>

      <span class="spacer"></span>

      <span>
        <?php echo get_field( 'logic_group_name', get_the_ID() ); ?>
      </span>
    </div>
  </div>

  <h2>Sharing</h2>
  <div id="ConfigureLogicGroupSharingForm"
    class="datastudio datastudio-options">
    <div class="form-field">
      <label for="AppPermalink">
        Permalink
      </label>

      <span class="spacer"></span>

      <a href="<?php the_permalink(); ?>"
        title="<?php echo get_field( 'logic_group_name', get_the_ID() ); ?>">
        /logic-group/<?php echo substr( get_the_title(), 0, 9 ); ?>...<!-- <?php echo substr( get_the_title(), -3, 3 ); ?> -->
      </a>
    </div>
    <div class="form-field">
      <label for="LogicGroupVisibility">
        Visibility
      </label>

      <span class="spacer"></span>

      <select id="LogicGroupVisibility"
        name="LogicGroupVisibility">
        <option value="public">Public</option>
        <option value="private">Private (hidden)</option>
      </select>
    </div>
    <div class="form-field">
      <label for="LogicGroupComments">
        Discussion
      </label>

      <span class="spacer"></span>

      <select id="LogicGroupComments"
        name="LogicGroupComments">
        <option value="open">Open</option>
        <option value="closed">Closed</option>
      </select>
    </div>
  </div>
</form>
