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
  'datastudio_build_web_service_as_spec_openapi_v3_output',
  'datastudio_build_web_service_as_spec_openapi_v3_output',
  10,
  3
);

add_filter(
  'datastudio_build_web_service_as_spec_openapi_v3_output_content_type',
  'datastudio_build_web_service_as_spec_openapi_v3_output_content_type',
  10,
  3
);

add_filter(
  'datastudio_build_web_service_as_plaintext_output',
  'datastudio_build_web_service_as_plaintext_output',
  10,
  3
);

add_filter(
  'datastudio_build_web_service_as_plaintext_output_content_type',
  'datastudio_build_web_service_as_plaintext_output_content_type',
  10,
  3
);

function datastudio_build_web_service_as_spec_openapi_v3_output ( $output, $web_service_id ) {
  $output = array(
    'paths' => [],
    'definitions' => [],
  );
  $paths = DataStudioQuery::getPathsByWebService( $web_service_id );
  if ( $paths->have_posts() ) {
    while ( $paths->have_posts() ) {
      $paths->the_post();
      $path_id = get_the_ID();
      $path_uri = get_field( 'path_uri', $path_id );
      $output['paths'][$path_uri] = [];
      $operations = DataStudioQuery::getOperationsByPath( $path_id );
      if ( $operations->have_posts() ) {
        while ( $operations->have_posts() ) {
          $operations->the_post();
          $operation_id = get_the_ID();
          $operation_type = get_field( 'operation_type', $operation_id );
          $operation_name = get_field( 'operation_name', $operation_id );
          $output['paths'][$path_uri][] = [
            'method' => $operation_type,
            'operationId' => $operation_name,
          ];
        }
      }
    }
  }
  return json_encode( $output );
}

function datastudio_build_web_service_as_spec_openapi_v3_output_content_type ( $output, $web_service_id ) {
  return 'application/json';
}

function datastudio_build_web_service_as_plaintext_output ( $output, $web_service_id ) {
  return sprintf( 'webservice<%s> as plaintext', $web_service_id );
}

function datastudio_build_web_service_as_plaintext_output_content_type ( $output, $web_service_id ) {
  return 'text/plain';
}