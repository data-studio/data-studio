<?php
/**
 * Copyright (c) 2018 Callan Peter Milne
 *
 * Permission to use, copy, modify, and/or distribute this software for any
 * purpose with or without fee is hereby granted, provided that the above
 * copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
 * REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
 * INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
 * LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
 * OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
 * PERFORMANCE OF THIS SOFTWARE.
 */

add_filter(
  DS_APP_BUILD_OPTION_PREFERENCES,
  'datastudio_build_app_as_php_prefs',
  10,
  3
);

add_filter(
  DS_APP_BUILD_OPTION_PREFERENCES,
  'datastudio_build_app_as_wordpress_prefs',
  10,
  3
);

class DataStudioPhpBuildPreferences implements DataStudioBuildPreferences {
  public function __construct () {

  }
  public function html () {
    get_template_part( 'parts/forms/build-app-as-php' );
  }
}

class DataStudioWordPressBuildPreferences implements DataStudioBuildPreferences {
  public function __construct () {

  }
  public function html () {
    // no preferences
  }
}

function datastudio_build_app_as_php_prefs ( $preferences ) {
  $preferences['php_classes'] = new DataStudioPhpBuildPreferences();
  return $preferences;
}

function datastudio_build_app_as_wordpress_prefs ( $preferences ) {
  $preferences['wordpress'] = new DataStudioWordPressBuildPreferences();
  return $preferences;
}
