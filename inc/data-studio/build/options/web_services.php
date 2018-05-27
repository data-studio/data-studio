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
  DS_WEB_SERVICE_BUILD_OPTIONS,
  'datastudio_build_web_service_as_openapi_opts',
  10,
  3
);

add_filter(
  DS_WEB_SERVICE_BUILD_OPTIONS,
  'datastudio_build_web_service_as_plaintext_opts',
  10,
  3
);

function datastudio_build_web_service_as_openapi_opts ( $options ) {
  $options['spec_openapi_v3'] = 'OAS: OpenAPI v3.0.1 spec';
  return $options;
}

function datastudio_build_web_service_as_plaintext_opts ( $options ) {
  $options['plaintext'] = 'Plain-text';
  return $options;
}
