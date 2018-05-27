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
  'datastudio_build_app_as_php_classes_output',
  'datastudio_build_app_as_php_classes_output',
  10,
  3
);

add_filter(
  'datastudio_build_app_as_php_classes_output_content_type',
  'datastudio_build_app_as_php_classes_output_content_type',
  10,
  3
);

add_filter(
  'datastudio_build_app_as_wordpress_output',
  'datastudio_build_app_as_wordpress_output',
  10,
  3
);

add_filter(
  'datastudio_build_app_as_wordpress_output_content_type',
  'datastudio_build_app_as_wordpress_output_content_type',
  10,
  3
);

function datastudio_build_app_as_php_classes_output ( $output, $app_id ) {
  return sprintf( 'app<%s> as php', $app_id );
}

function datastudio_build_app_as_php_classes_output_content_type ( $output, $app_id ) {
  return 'text/plain';
}

function datastudio_build_app_as_wordpress_output ( $output, $app_id ) {
  return sprintf( 'app<%s> as wordpress', $app_id );
}

function datastudio_build_app_as_wordpress_output_content_type ( $output, $app_id ) {
  return 'text/plain';
}
