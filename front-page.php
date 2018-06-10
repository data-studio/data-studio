<?php get_header( 'front-page' ); ?>

  <div id="WelcomeHero">
    <div class="spacer"></div>
    <div class="hero-content">
      <div class="spacer"></div>
      <div class="hero-text">
        <div class="spacer"></div>
        <h1>
          Design,
          <br />Discuss,
          <br />Configure,
          <br />Build.</h1>
        <p>
          Open-source software development tool.
        </p>
      </div>
      <div class="hero-actions">
        <div class="spacer"></div>
        <div class="try-now-actions">
          <h2>Try it now</h2>
          <div class="actions">
            <a href="#existing-users" class="call-to-action">
              <span class="spacer"></span>
              <span>Log-in</span>
              <span class="spacer"></span>
            </a>
            <a href="/create-account/" class="call-to-action">
              <span class="spacer"></span>
              <span>Sign-up</span>
              <span class="spacer"></span>
            </a>
          </div>
        </div>
        <div class="download-actions">
          <h2>Get the source code</h2>
          <div class="actions">
            <a href="https://s3-ap-southeast-2.amazonaws.com/data-studio/pub/dist/0.3.0-beta/data-studio-master.zip"
              class="call-to-action primary-action">
              <span class="spacer"></span>
              <span class="icon material-icons">
                cloud_download
              </span>
              <span>Download now (1.1MB)</span>
              <span class="spacer"></span>
            </a>
          </div>
        </div>
      </div>
      <div class="spacer"></div>
    </div>
  </div>

  <main role="main">
    <!-- section -->
    <section class="front-page">

      <div class="login">
        <h2 id="existing-users">Existing users</h2>

        <div class="page-section-wrapper">
          <?php echo do_shortcode( '[wppb-login]' ); ?>
        </div>
      </div>

    </section>
    <!-- /section -->
  </main>

<?php get_footer(); ?>
