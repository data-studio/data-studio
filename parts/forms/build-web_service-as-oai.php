<div id="WebService_Build_Output_Preferences">
  <h3>Output</h3>

  <div id="WebService_Build_Output_FormFields">
    <div class="form-field">
      <label for="OutputFormat">
        Format
      </label>

      <span class="spacer"></span>

      <select id="OutputFormat"
        name="OutputFormat">
        <option value="application/json" selected>JSON</option>
        <option value="application/x-yaml">YAML</option>
      </select>
    </div>
  </div>

  <h3>Include</h3>

  <?php
  $web_service_id = get_the_ID();
  ?>

  <script>
  (function ($) {"use strict";
    $(document).ready(function () {
      $('li.build-list-item').each(function (i, el) {
        $(el).children('div.list-item-content').children('div.toggle-list-sub-items').click(function ($ev) {
          $(el).children( 'ul' ).toggle();
        });
        $(el).children('div.list-item-content').find('input[type=checkbox]').click(function () {
          if ($(el).children('div.list-item-content').find('input[type=checkbox]').attr('checked')) {
            $(el).children('ul').find('input[type=checkbox]').attr('checked', '');
            return;
          }
          $(el).children('ul').find('input[type=checkbox]').removeAttr('checked');
        });
      });
    });
  })(jQuery);
  </script>

  <div class="content-cards">
    <ul class="cards">
      <li class="build-list-item">
        <div class="list-item-content">
          <div class="toggle-list-sub-items">
            <span class="material-icons">
              expand_more
            </span>
          </div>
          <div>
            <input type="checkbox">
          </div>
          <div>
            Paths
          </div>
        </div>
      </li>
      <li class="build-list-item">
        <div class="list-item-content">
          <div class="toggle-list-sub-items">
            <span class="material-icons">
              expand_more
            </span>
          </div>
          <div>
            <input type="checkbox">
          </div>
          <div>
            Schemas
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>
