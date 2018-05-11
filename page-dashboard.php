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
            <a href="/events/"
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
                  Event Log
                </span>
                <span class="spacer"></span>
              </div>
            </a>
          </li>
          <li class="dashboard-menu-item">
            <a href="/workouts/"
              title="">
              <div class="icon-container">
                <span class="spacer"></span>
                <span class="menu-item-icon material-icons">
                  fitness_center
                </span>
                <span class="spacer"></span>
              </div>
              <div class="label-container">
                <span class="spacer"></span>
                <span class="menu-item-label">
                  Fitness
                </span>
                <span class="spacer"></span>
              </div>
            </a>
          </li>
          <li class="dashboard-menu-item">
            <a href="/wallets/"
              title="">
              <div class="icon-container">
                <span class="spacer"></span>
                <span class="menu-item-icon material-icons">
                  attach_money
                </span>
                <span class="spacer"></span>
              </div>
              <div class="label-container">
                <span class="spacer"></span>
                <span class="menu-item-label">
                  Money
                </span>
                <span class="spacer"></span>
              </div>
            </a>
          </li>
          <li class="dashboard-menu-item">
            <a href="/todo-lists/"
              title="">
              <div class="icon-container">
                <span class="spacer"></span>
                <span class="menu-item-icon material-icons">
                  check
                </span>
                <span class="spacer"></span>
              </div>
              <div class="label-container">
                <span class="spacer"></span>
                <span class="menu-item-label">
                  To-Do
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
