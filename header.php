<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

    <link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>
    <script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

  </head>
  <body <?php body_class(); ?>>

    <!-- wrapper -->
    <div class="wrapper">

      <!-- header -->
      <header class="header clear" role="banner">

        <!-- logo -->
        <div class="logo">
          <a href="<?php echo home_url() . ( is_user_logged_in() ? "\/dashboard\/" : '' ); ?>">
            <!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"
              alt="Logo"
              class="logo-img">
            WEB
          </a>
        </div>
        <!-- /logo -->

        <div class="spacer"></div>

        <div>
          <button id="ToggleSidebar_Button">
            <span class="material-icons">
              menu
            </span>
          </button>
        </div>

      </header>
      <!-- /header -->

      <div id="Sidebar">
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
