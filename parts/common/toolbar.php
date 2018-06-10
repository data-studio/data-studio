
    <!-- logo -->
    <div class="logo">
      <a href="<?php echo home_url() . ( is_user_logged_in() ? "\/dashboard\/" : '' ); ?>">
        <!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"
          alt="Logo"
          class="logo-img">
        Data-Studio
      </a>
    </div>
    <!-- /logo -->

    <div class="spacer"></div>

    <?php if ( is_user_logged_in() ) : ?>
      <div>
        <a href="<?php echo wp_logout_url( '/' ); ?>"
          class="logout">
          <span class="label">
            Logout
          </span>
        </a>
      </div>
    <?php endif; ?>

    <div>
      <button id="ToggleSidebar_Button">
        <span class="material-icons">
          menu
        </span>
      </button>
      <div id="Sidebar"
        style="display: none;">
        <div class="overlay"></div>
        <div class="sidebar-container">
          <header style="height: 200px;">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"
              alt="Logo"
              class="sidebar-logo-img"
              style="position: relative;top: -160px;max-width:256px;max-height:256px;">
          </header>
          <!-- nav -->
          <nav class="nav" role="navigation">
            <?php html5blank_nav(); ?>
          </nav>
          <!-- /nav -->
        </div>
      </div>
    </div>

    <script>
    (function ($) {"use strict";

      $(document).ready(function () {

        var sidebarVisible = false;

        var $sidebarEl = $("#Sidebar");
        var $sidebarToggleEl = $("#ToggleSidebar_Button");
        var $sidebarOverlayEl = $("#Sidebar div.overlay");
        var $sidebarContainerEl = $("#Sidebar div.sidebar-container");

        hideSidebar();

        $sidebarToggleEl.click(function (event) {
          toggleSidebar();
        });

        $sidebarOverlayEl.click(function (event) {
          hideSidebar();
        });

        $sidebarContainerEl.click(function (event) {
          event.stopPropagation();
        });

        function toggleSidebar () {
          if (true === sidebarVisible) {
            return hideSidebar();
          }
          return showSidebar();
        }

        function hideSidebar () {
          $sidebarEl.hide();
          sidebarVisible = false;
        }

        function showSidebar () {
          $sidebarEl.show();
          sidebarVisible = true;
        }

      });

    })(jQuery);
    </script>
