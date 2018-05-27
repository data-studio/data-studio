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

define(
  'DS_APP_BUILD_OPTIONS',
  'datastudio_app_build_options'
);
define(
  'DS_WEB_SERVICE_BUILD_OPTIONS',
  'datastudio_web_service_build_options'
);

define(
  'DS_APP_BUILD_OPTION_PREFERENCES',
  'datastudio_app_build_preferences'
);
define(
  'DS_WEB_SERVICE_BUILD_OPTION_PREFERENCES',
  'datastudio_web_service_build_preferences'
);

interface DataStudioBuildPreferences {
  public function html ();
}

function getBuildOptions ( $type = 'app' ) {
  $options = array();
  $options = apply_filters(
    sprintf( 'datastudio_%s_build_options', $type ),
    $options
  );
  return $options;
}

function getBuildOutput ( $type, $as, $post_id ) {
  if ( ! $type ) {
    return '';
  }
  $output = '';
  $output = apply_filters(
    sprintf( 'datastudio_build_%s_as_%s_output', $type, $as ),
    $output,
    $post_id
  );
  return $output;
}

function getBuildOutputContentType ( $type, $as, $post_id ) {
  if ( ! $type ) {
    return '';
  }
  $output = '';
  $output = apply_filters(
    sprintf( 'datastudio_build_%s_as_%s_output_content_type', $type, $as ),
    $output,
    $post_id
  );
  return $output;
}

function getBuildPreferences ( $type = 'app' ) {
  $preferences = array();
  $preferences = apply_filters(
    sprintf( 'datastudio_%s_build_preferences', $type ),
    $preferences
  );
  return $preferences;
}
