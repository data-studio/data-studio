<?php

if ( !is_user_logged_in() ) {
  wp_redirect( "/login" );
  exit;
}

get_header();

?>

  <main role="main">
    <!-- section -->
    <section>

      <h1>Dashboard</h1>

      <div class="dashboard-menu-wrapper">
        <ul id="DashboardMenu">
          <li class="dashboard-menu-item">
            <a href="/apps/"
              title="">
              <div class="icon-container">
                <span class="spacer"></span>
                <span class="menu-item-icon material-icons">
                  list_alt
                </span>
                <span class="spacer"></span>
              </div>
              <div class="label-container">
                <span class="spacer"></span>
                <span class="menu-item-label">
                  Apps
                </span>
                <span class="spacer"></span>
              </div>
            </a>
          </li>
        </ul>
      </div>

    </section>
    <!-- /section -->
  </main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
